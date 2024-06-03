@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
    <h2></h2>
@stop

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        Olá candidato!<br><br>
                        Bem vindo a fase de testes do processo seletivo.<br><br>
                        Antes de começarmos, algumas considerações sobre essa fase:<br><br>
                        1. O Objetivo do teste é entender a sua maneira de pensar e resolver problemas,
                        bem como as suas habilidades específicas de escrita de código, organização e
                        lógica.<br><br>
                        2. Seu teste jamais será compartilhado ou utilizado em ambiente de produção. Será
                        apenas para avaliação do seu perfil profissional;<br><br>
                        3. A aplicação final do teste deve ser funcional, porém o Design, a interface e o
                        código do frontend não serão levados em consideração na análise.<br><br>
                        4. O teste deverá ser feito em PHP e MySql, temos uma preferência por Laravel,
                        mas você é livre para utilizar ou não qualquer framework ou biblioteca PHP.<br><br>
                        5. Você deve incluir no readme do projeto, instruções passo a passo para rodar o
                        projeto em um ambiente local.<br><br>
                        6. Ao final do teste, você deve colocá-lo em um repositório público e enviar o link
                        para o email.<br><br>
                        <strong>Objetivo:</strong><br><br>
                        Desenvolva um sistema simples para gerenciamento de uma biblioteca.<br><br>
                        O sistema deve ter:<br><br>

                        CRUD de usuários da biblioteca
                        <li>Campos Obrigatórios: nome, email, Número de Cadastro</li>
                        <br>
                        CRUD de Livros
                        <li>Campos Obrigatórios: Nome, Autor, número de registro,</li>
                        <li>Situação(Emprestado ou Disponível )</li>
                        <li>Classificação dos livros por Gênero: Ficção, Romance, Fantasia, Aventura,Etc.</li>
                        <br>Funcionalidade de empréstimo dos livros :
                        <li>Cadastrar novo empréstimo para um usuário com data de devolução</li>
                        <li>Opção de marcar o empréstimo como Atrasado ou devolvido</li>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
