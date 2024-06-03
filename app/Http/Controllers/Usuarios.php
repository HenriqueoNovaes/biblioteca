<?php

namespace App\Http\Controllers;

use App\Models\UsuariosBiblioteca;
use App\Models\Emprestimos;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Usuarios extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function usuarioslista()
    {
        // OBTEM USUARIOS PARA UMA VARIAVEL
        $usuarios = UsuariosBiblioteca::paginate(100);

        return view('usuarios.usuarioslista', compact('usuarios'));
    }

    public function usuariocriar()
    {
        return view('usuarios.usuarioscriar');
    }

    public function usuarioscriarok(Request $request)
    {
        // VALIDANDO DADOS
        $dadosvalidados = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users_biblioteca',
            'registration_number' => 'required|string|max:255|unique:users_biblioteca',
        ]);

        // PEGA O RESULTADO POSITIVO DO VALIDATE E SALVA
        UsuariosBiblioteca::create($dadosvalidados);

        // RETORNA COM MENSAGEM DE SUCESSO
        return redirect()->back()->with('success', 'Usuário criado com sucesso!');
    }

    public function usuariosdeletar($id)
    {
        $emprestimosativos = Emprestimos::where('user_id', $id)->count();

        if ($emprestimosativos >= 1) { // Código de erro para violação de chave estrangeira
            return redirect()->back()->with('warning', 'Não é possível deletar este usuário porque existem empréstimos associados a ele.');
        } else {

            //BUSCA USUARIO PELO ID
            $usuario = UsuariosBiblioteca::findOrFail($id);

            // VERIFICA SE O USUARIO EXISTE
            if (!$usuario) {
                return redirect()->back()->with('warning', 'Usuário não encontrado!');
            }

            //EXCLUI O USUÁRIO
            $usuario->delete();

            return redirect()->back()->with('success', 'Usuário Deletado com Sucesso');
        }
    }


    public function usuarioatualizar($id)
    {
        // OBTEM USUARIOS PARA UMA VARIAVEL
        $usuario = UsuariosBiblioteca::findOrFail($id);

        return view('usuarios.usuariosatualizar', compact('usuario'));
    }

    public function usuarioatualizarok(Request $request, $id)
    {
        // VALIDANDO DADOS
        $dadosvalidados = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users_biblioteca,email,' . $id,
            'registration_number' => 'required|string|max:255|unique:users_biblioteca,registration_number,' . $id,
        ]);

        // ENCONTRA O USUÁRIO EXISTENTE
        $user = UsuariosBiblioteca::findOrFail($id);

        // PEGA O RESULTADO POSITIVO DO VALIDATE E SALVA
        $user->update($dadosvalidados);

        // RETORNA COM MENSAGEM DE SUCESSO
        return redirect()->back()->with('success', 'Usuário atualizado com sucesso!');
    }
}
