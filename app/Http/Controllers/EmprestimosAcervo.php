<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livros;
use App\Models\Emprestimos;
use App\Models\UsuariosBiblioteca;
use Carbon\Carbon;

class EmprestimosAcervo extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function emprestimoslista()
    {

        // OBTEM RELACIONAMENTO UTILIZANDO EAGER LOAD
        $emprestimos = Emprestimos::with('usersbiblioteca', 'livros')->paginate(100);

        return view('emprestimos.emprestimoslista', compact('emprestimos'));
    }

    public function emprestimoinserir(Request $request)
    {
        //dd($request);
        $dataAtual = date('Y-m-d');
        //  $dataDevolucao = date('Y-m-d', strtotime('+7 days'));

        // Calcular a data de devolução, pulando sábados e domingos
        $dataDevolucao = $this->calcularDataDevolucao($dataAtual, 7);

        $request->validate([
            'livro_id' => 'nullable|exists:livros,id',
            'user_id' => 'nullable|exists:users_biblioteca,id',
        ]);


        //USO DO TRY CATCH PARA VERIFICAÇÃO DE ERROS
        try {
            // OPERADOR TENÁRIO PARA BUSCAS CONFORME REQUEST
            $livros = $request->livro_id
                ? collect([Livros::findOrFail($request->livro_id)])
                : Livros::where('status', 'Disponível')->get();

            $usuarios = $request->usuario_id
                ? collect([UsuariosBiblioteca::findOrFail($request->usuario_id)])
                : UsuariosBiblioteca::all();
        } catch (ModelNotFoundException $e) {
            // Tratamento de exceção
            return redirect()->back()->withErrors('Item não encontrado.');
        }
        //dd($livros);

        return view('emprestimos.emprestimosinserir', compact('livros', 'usuarios', 'dataAtual', 'dataDevolucao'));
    }


    // Calcula a data de devolução pulando sábados e domingos.
    private function calcularDataDevolucao($data, $dias)
    {
        $data = Carbon::createFromFormat('Y-m-d', $data);
        $diasAdicionados = 0;

        while ($diasAdicionados < $dias) {
            $data->addDay();
            if ($data->dayOfWeek < Carbon::SATURDAY) {
                $diasAdicionados++;
            }
        }

        return $data->toDateString();
    }



    public function emprestimoinserirok(Request $request)
    {

        //dd($request);
        // VALIDANDO DADOS
        $dadosvalidados = $request->validate([
            'book_id' => 'nullable|exists:livros,id',
            'user_id' => 'nullable|exists:users_biblioteca,id',
            'start_date' => 'nullable|date', // Validar se é uma data válida
            'return_date' => 'nullable|date|after:start_date', // Validar se é uma data válida e após a data de início
            'status' => 'required|string|max:255',
        ]);

        // ENCONTRA O LIVRO EXISTENTE
        $livro = Livros::findOrFail($request->book_id);

        // Verificar se o livro existe e está disponível para empréstimo
        if (!$livro || $livro->status !== 'Disponível') {
            return redirect()->back()->withErrors('Livro não disponível para empréstimo.');
        }

        // PEGA O RESULTADO POSITIVO DO VALIDATE E SALVA
        Emprestimos::create($dadosvalidados);

        //ATUALIZA STATUS DO LIVRO
        $livro->update(['status' => 'Emprestado']);

        // RETORNA COM MENSAGEM DE SUCESSO
        return redirect()->back()->with('success', 'Empréstimo realizado com sucesso!');
    }


    public function emprestimoatualizar(Request $request, $id)
    {

        // VALIDANDO DADOS
        $dadosvalidados = $request->validate([
            'status' => 'required|string|max:255',

        ]);

        // ENCONTRA O USUÁRIO EXISTENTE
        $emprestimo = Emprestimos::findOrFail($id);

        // Encontra o livro relacionado ao empréstimo
        $livro = Livros::findOrFail($emprestimo->book_id);

        // Verifica o status do empréstimo antes da atualização
        $emprestimoStatusAtual = $emprestimo->status;

        // PEGA O RESULTADO POSITIVO DO VALIDATE E SALVA
        $emprestimo->update($dadosvalidados);

        // Atualiza o status do livro de acordo com o novo status do empréstimo
        if ($emprestimoStatusAtual != 'Devolvido' && $dadosvalidados['status'] == 'Devolvido') {
            // Se o empréstimo foi devolvido, atualiza o status do livro para 'Disponível'
            $livro->update(['status' => 'Disponível']);
        } elseif ($emprestimoStatusAtual == 'Devolvido' && $dadosvalidados['status'] != 'Devolvido') {
            // Se o empréstimo foi alterado de 'Devolvido' para qualquer outro status, atualiza o status do livro para 'Emprestado'
            $livro->update(['status' => 'Emprestado']);
        }
        // RETORNA COM MENSAGEM DE SUCESSO
        return redirect()->back()->with('success', 'Empréstimo atualizado com sucesso!');
    }


    public function emprestimosdeletar($id)
    {
        //BUSCA O emprestimo PELO ID
        $Emprestimo = Emprestimos::findOrFail($id);

        //VERIFICA SE TEM EMPRESTIMO ATIVO
        if ($Emprestimo['status'] == 'Em Andamento' || $Emprestimo['status'] == 'Atrasado') {
            return redirect()->back()->with('warning', 'Não é possível deletar este Empréstimo porque ele se encontra "Em Andamento"');
        } else {
            //EXCLUI O LIVRO
            $Emprestimo->delete();
           return redirect()->back()->with('success', 'Empréstimo deletado com Sucesso!');
        }
    }
}
