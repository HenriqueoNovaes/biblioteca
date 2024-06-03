@extends('adminlte::page')
@section('title', 'Atualizar Usuário')

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
                    <h3 class="card-title">Atualizar Usuário</h3>
                </div>
                <!-- /.card-header -->
                <form action="{{ route('usuarioatualizarok', ['id'=>$usuario->id]) }}" method="post" role="form">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nome:</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Nome do usuário da biblioteca" value="{{$usuario->name}}"
                                required>
                        </div>
                        <div class="form-group">
                            <label>E-mail:</label>
                            <input type="email" name="email" class="form-control" id="email"
                                placeholder="exemplo@dominio.com" value="{{$usuario->email}}" required>
                        </div>
                        <div class="form-group">
                            <label>Número de Cadastro:</label>
                            <input type="number" name="registration_number" class="form-control" id="registration_number"
                                placeholder="xxxxxxxxxx" value="{{$usuario->registration_number}}" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Atualizar</button>

                    </div>
                    <!-- /.card-body -->
            </div>

            <!-- /.card-body -->
        </div>
    </div>
    </div>

    </div>
@endsection

@section('js')

    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>

@endsection
