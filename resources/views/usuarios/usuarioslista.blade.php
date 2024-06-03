@extends('adminlte::page')
@section('title', 'Usuários da Biblioteca')

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
        <div class="col-md-12">
            {{ $usuarios->links() }}
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Usuários da Biblioteca</h3>
                </div>
                      <div class="card-body">
                    <table id="example1" class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Opções</th>
                                <th>Nome</th>
                                <th>E-mail</th>
                                <th>Número de Cadastro</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($usuarios as $us)
                                <tr>
                                    <td>
                                        <div class="btn-group">
                                            <div style="display: inline-block; margin-right: 2px;">
                                                <form action="{{ route('usuarioatualizar', $us->id) }}" method="GET">
                                                    @csrf
                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="fas fa-fw fa-edit" title="Editar"></i>
                                                    </button>
                                                </form>
                                            </div>

                                            <div style="display: inline-block; margin-right: 2px;">
                                                <form action="{{ route('emprestimoinserir') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="usuario_id" value="{{ $us->id }}">
                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="fas fa-fw fa-exchange-alt"
                                                            title="Emprestar ao usuário"></i>
                                                    </button>
                                                </form>
                                            </div>


                                            <div style="display: inline-block; margin-right: 2px;">
                                                <form action="{{ route('usuariosdeletar', $us->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"
                                                        onclick="return confirm('Tem certeza que deseja deletar este usuário?')">
                                                        <i class="fas fa-fw fa-trash" title="Excluir"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $us->name }}</td>
                                    <td>{{ $us->email }}</td>
                                    <td>{{ $us->registration_number }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Opções</th>
                                <th>Nome</th>
                                <th>E-mail</th>
                                <th>Número de Cadastro</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

    </div>


    <div class="row">
        <div class="col-md-12">
            {{ $usuarios->links() }}
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
