@extends('adminlte::page')
@section('title', 'Atualizar Livro')

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
            <h3 class="card-title">Atualizar Livro</h3>
        </div>
        <!-- /.card-header -->
        <form action="{{ route('acervoatualizarok', ['id'=>$livro->id]) }}" method="post" role="form">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                        <div class="form-group">
                            <label>Título:</label>
                            <input type="text" name="title" class="form-control" id="title"
                                placeholder="Título do livro" value="{{$livro->title}}" required>
                        </div>

                        <div class="form-group">
                            <label>Autor:</label>
                            <input type="text" name="author" class="form-control" id="author"
                                placeholder="Autor do livro" value="{{$livro->author}}" required>
                        </div>

                        <div class="form-group">
                            <label>Número de Registro:</label>
                            <input type="number" name="registration_number_book" class="form-control"
                                id="registration_number_book" placeholder="xxxxxxxxxx" value="{{$livro->registration_number_book}}" required>
                        </div>

                        <div class="form-group">
                            <label for="genre_id">Gênero</label>
                            <select class="form-control select2" style="width: 100%;" name="genre_id" id="genre_id">
                                @foreach($generos as $g)
                                    <option value="{{ $g->id }}" {{ $livro->genre_id == $g->id ? 'selected' : '' }}>
                                        {{ $g->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                 </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Atualizar</button>
                <!-- /.card-body -->
            </div>
    </div>
    <!-- /.card-body -->

@endsection

@section('js')

 <script>
    $(function () {
      //Initialize Select2 Elements
      $('.select2').select2()

      //Initialize Select2 Elements
      $('.select2bs4').select2({
        theme: 'bootstrap4'
      })
    });


    </script>

@endsection
