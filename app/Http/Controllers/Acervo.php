<?php

namespace App\Http\Controllers;


use App\Models\UsuariosBiblioteca;
use App\Models\Livros;
use App\Models\Generos;
use App\Models\Emprestimos;
use Illuminate\Http\Request;

class Acervo extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function acervolista()
    {
        // OBTEM RELACIONAMENTO UTILIZANDO EAGER LOAD
        $livros = Livros::with('genero')->paginate(100);

        return view('livros.livroslista', compact('livros'));
    }

    public function acervofiltro($id)
    {
        $livros = Livros::with('genero')
            ->whereHas('genero', function ($query) use ($id) {
                $query->where('id', $id);
            })
            ->paginate(100);

        return view('livros.livroslista', compact('livros'));
    }

    public function acervoinserir()
    {
        //OBTEM TODOS OS GENEROS
        $generos = Generos::all();

        return view('livros.livrosinserir', compact('generos'));
    }

    public function acervoinserirok(Request $request)
    {
        // VALIDANDO DADOS
        $dadosvalidados = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'registration_number_book' => 'required|string|max:255|unique:livros',
            'genre_id' => 'required|max:255',
            'status' => 'required|string|max:255',
        ]);

        // PEGA O RESULTADO POSITIVO DO VALIDATE E SALVA
        Livros::create($dadosvalidados);

        // RETORNA COM MENSAGEM DE SUCESSO
        return redirect()->back()->with('success', 'Livro inserido com sucesso!');
    }

    public function acervodeletar($id)
    {
        $emprestimosativos = Emprestimos::where('book_id', $id)->count();

        //VERIFICA SE TEM EMPRESTIMO ATIVO
        if ($emprestimosativos >= 1) {
            return redirect()->back()->with('warning', 'Não é possível deletar este LIVRO porque existem empréstimos associados a ele.');
        } else {
            //BUSCA O LIVRO PELO ID
            $livro = Livros::findOrFail($id);

            // VERIFICA SE O LIVRO EXITE
            if (!$livro) {
                return redirect()->back()->with('warning', 'Livro não encontrado!');
            }

            //EXCLUI O LIVRO
            $livro->delete();
            return redirect()->back()->with('success', 'Livro deletado com Sucesso!');
        }
    }

    public function acervoatualizar($id)
    {
        // OBTEM LIVROS PARA UMA VARIAVEL
        $livro = Livros::with('genero')->findOrFail($id);

        //PEGA TODOS OS GENEROS
        $generos = Generos::all();

        return view('livros.livrosatualizar', compact('livro', 'generos'));
    }

    public function acervoatualizarok(Request $request, $id)
    {
        // VALIDANDO DADOS
        $dadosvalidados = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'registration_number_book' => 'required|string|max:255|unique:livros,registration_number_book,' . $id,
            'genre_id' => 'required|max:255',
        ]);

        // ENCONTRA O LIVRO EXISTENTE
        $livro = Livros::findOrFail($id);

        // PEGA O RESULTADO POSITIVO DO VALIDATE E SALVA
        $livro->update($dadosvalidados);

        // RETORNA COM MENSAGEM DE SUCESSO
        return redirect()->back()->with('success', 'Livro atualizado com sucesso!');
    }
}
