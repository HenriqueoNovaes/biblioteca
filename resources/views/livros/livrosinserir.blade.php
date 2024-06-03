@extends('adminlte::page')
@section('title', 'Inserir Livro')

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
            <h3 class="card-title">Inserir Livros</h3>
        </div>
        <!-- /.card-header -->
        <form action="{{ route('acervoinserirok') }}" method="post" role="form">
            @csrf
            <div class="card-body">
                <div class="form-group">
                        <div class="form-group">
                            <label>Título:</label>
                            <input type="text" name="title" class="form-control" id="title"
                                placeholder="Título do livro" required>
                        </div>

                        <div class="form-group">
                            <label>Autor:</label>
                            <input type="text" name="author" class="form-control" id="author"
                                placeholder="Autor do livro" required>
                        </div>

                        <div class="form-group">
                            <label>Número de Registro:</label>
                            <input type="number" name="registration_number_book" class="form-control"
                                id="registration_number_book" placeholder="xxxxxxxxxx" required>
                        </div>

                        <div class="form-group">
                              <label>Gênero</label>
                              <select class="form-control select2" style="width: 100%;" name="genre_id" id="genre_id">
                                @foreach($generos as $g)
                                <option value="{{$g->id}}">{{$g->name}}</option>
                                @endforeach
                              </select>
                        </div>

                            <input type="hidden" name="status" class="form-control" id="status" value="Disponível">

                    </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Inserir</button>
                <!-- /.card-body -->
            </div>
    </div>
    <!-- /.card-body -->
</form>
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
