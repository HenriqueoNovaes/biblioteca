<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Generos;
use App\Models\Livros;

class GenerosAcervo extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function generoslista()
    {
        //OBTEM OS GENEROS E CONTA OS LIVROS QUE UTILIZAM, EAGER LOAD
        $generos = Generos::withCount('livros')->paginate(100);

        return view('generos.generoslista', compact('generos'));
    }

    public function generoinserir()
    {
        return view('generos.generosinserir');
    }

    public function generoinserirok(Request $request)
    {
        // VALIDANDO DADOS
        $dadosvalidados = $request->validate([
            'name' => 'required|string|max:255|unique:generos',
        ]);

        // PEGA O RESULTADO POSITIVO DO VALIDATE E SALVA
        Generos::create($dadosvalidados);

        // RETORNA COM MENSAGEM DE SUCESSO
        return redirect()->back()->with('success', 'Gênero inserido com sucesso!');
    }

    public function generodeletar($id)
    {
        $livrosemuso = Livros::where('genre_id', $id)->count();

        //VERIFICA USO DO GENERO EM LIVROS
        if ($livrosemuso >= 1) {
            return redirect()->back()->with('warning', 'Não é possível deletar este GÊNERO porque existem livros associados a ele.');
        } else {

        //LOCALIZA O GENERO
        $genero = Generos::findOrFail($id);

        //COFIRMA A EXISTENCIA DO GENERO
        if (!$genero) {
            return redirect()->back()->with('warning', 'Gênero não encontrado!');
        }

        // EXCLUI O GENERO
        $genero->delete();

        return redirect()->back()->with('success', 'Gênero deletado com Sucesso!');
        }
    }


    public function generoatualizar($id)
    {
        // OBTEM USUARIOS PARA UMA VARIAVEL
        $genero = Generos::findOrFail($id);

        return view('generos.generoatualizar', compact('genero'));
    }

    public function generoatualizarok(Request $request, $id)
    {
        // VALIDANDO DADOS
        $dadosvalidados = $request->validate([
            'name' => 'required|string|max:255|unique:generos,name,' . $id,
        ]);

        // ENCONTRA O USUÁRIO EXISTENTE
        $genero = Generos::findOrFail($id);

        // PEGA O RESULTADO POSITIVO DO VALIDATE E SALVA
        $genero->update($dadosvalidados);

        // RETORNA COM MENSAGEM DE SUCESSO
        return redirect()->back()->with('success', 'Gênero atualizado com sucesso!');

    }
}
