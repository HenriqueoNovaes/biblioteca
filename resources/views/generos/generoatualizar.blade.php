@extends('adminlte::page')
@section('title', 'Atualizar Gênero')

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
                    <h3 class="card-title">Atualizar Gênero</h3>
                </div>
                <!-- /.card-header -->
                <form action="{{ route('generoatualizarok', ['id' => $genero->id]) }}" method="post" role="form">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <div class="form-group">
                                <label>Gênero:</label>
                                <input type="text" name="name" class="form-control" id="name"
                                    placeholder="Nome do Gênero" value="{{$genero->name}}" required>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Atualizar</button>
                        <!-- /.card-body -->
                    </div>
            </div>
            <!-- /.card-body -->
            </form>
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
