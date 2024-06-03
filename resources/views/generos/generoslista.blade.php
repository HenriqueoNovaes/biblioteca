@extends('adminlte::page')
@section('title', 'Gêneros de Livros')

@section('content_header')
    <h2>
    </h2>
@stop

@section('content')

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (session('warning'))
        <div class="alert alert-danger">
            {{ session('warning') }}
        </div>
    @endif

    <div class="row">
        <!-- left column -->
        <div class="col-12">
            <!-- jquery validation -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Gêneros de Livros</h3>
                </div>
                <!-- /.card-header -->
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Opções</th>
                                <th>Gênero</th>
                                <th>Livros Cadastrados</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($generos as $ge)
                                <tr>
                                    <td>
                                        <div class="btn-group">
                                            <div style="display: inline-block; margin-right: 2px;">
                                                <form action="{{ route('generoatualizar', $ge->id) }}" method="GET">
                                                    @csrf
                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="fas fa-fw fa-edit" title="Editar"></i>
                                                    </button>
                                                </form>
                                            </div>

                                            <div style="display: inline-block; margin-right: 2px;">
                                                <form action="{{ route('generodeletar', $ge->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"
                                                        onclick="return confirm('Tem certeza que deseja deletar este usuário?')">
                                                        <i class="fas fa-fw fa-trash" title="Excluir"></i>
                                                    </button>
                                                </form>
                                            </div>

                                            <div style="display: inline-block; margin-right: 2px;">
                                                <form action="{{ route('acervofiltro', $ge->id) }}" method="POST">
                                                    @csrf
                                                    @method('GET')
                                                    <button type="submit" class="btn btn-success">
                                                        <i class="fas fa-fw fa-eye" title="Visualizar Livros"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $ge->name }}</td>
                                    <td>{{ $ge->livros_count }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Opções</th>
                                <th>Gênero</th>
                                <th>Livros Cadastrados</th>
                            </tr>
                        </tfoot>
                    </table>
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
                "paging": false,
                "buttons": ["copy", "csv", "excel"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": false,
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
