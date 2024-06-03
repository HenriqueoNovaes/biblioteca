@extends('adminlte::page')
@section('title', 'Registrar Empréstimo')

@section('content_header')
    <h2></h2>
@stop

@section('content')



    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
        <!-- left column -->
        <div class="col-12">
            <!-- jquery validation -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Registrar Empréstimo</h3>
                </div>
                <!-- /.card-header -->
                <form action="{{ route('emprestimoinserirok') }}" method="post" role="form">
                    @csrf
                    <div class="card-body">



                        <div class="form-group">
                            <label>Usuário da Biblioteca:</label>
                            <select class="form-control select2" style="width: 100%;" name="user_id" id="user_id">
                                @foreach ($usuarios as $u)
                                    <option value="{{ $u->id }}">Nome: {{ $u->name }} | Registro:
                                        {{ $u->registration_number }}
                                    </option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group">
                            <label>Livro:</label>
                            <select class="form-control select2" style="width: 100%;" name="book_id" id="book_id">
                                @foreach ($livros as $li)
                                    <option value="{{ $li->id }}">
                                        Titulo: {{ $li->title }} | Registro: {{ $li->registration_number_book }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Data do Empréstimo:</label>
                            <input type="date" class="form-control" name="start_date" id="start_date"
                                value="{{ $dataAtual }}">
                        </div>


                        <div class="form-group">
                            <label>Data de Devolução: (Padrão 7 Dias EXCETO SÁBADO OU DOMINGO)</label>
                            <input type="date" class="form-control" name="return_date" id="return_date"
                                value="{{ $dataDevolucao }}">
                        </div>

                        <input type="hidden" class="form-control" name="status" id="status" value="Em Andamento">
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Emprestar</button>
                        <!-- /.card-body -->
                    </div>
            </div>
            <!-- /.card-body -->

        @endsection

        @section('js')

            <script>
                $(function() {
                    //Initialize Select2 Elements
                    $('.select2').select2()

                    //Initialize Select2 Elements
                    $('.select2bs4').select2({
                        theme: 'bootstrap4'
                    })
                });
            </script>

        @endsection
