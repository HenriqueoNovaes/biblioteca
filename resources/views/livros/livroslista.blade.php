@extends('adminlte::page')
@section('title', 'Livros da Biblioteca')

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
        {{ $livros->links() }}
    </div>
</div>

<div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Livros da Biblioteca</h3>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Opções</th>
                                <th>Nome</th>
                                <th>Autor</th>
                                <th>Classificação/Gênero</th>
                                <th>Número de Registro</th>
                                <th>Situação</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($livros as $li)
                                <tr>
                                    <td>
                                        <div class="btn-group">
                                            <div style="display: inline-block; margin-right: 2px;">
                                                <form action="{{ route('acervoatualizar', $li->id) }}" method="GET">
                                                    @csrf
                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="fas fa-fw fa-edit" title="Editar"></i>
                                                    </button>
                                                </form>
                                            </div>

                                            <div style="display: inline-block; margin-right: 2px;">
                                                <form action="{{ route('emprestimoinserir') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="livro_id" value="{{$li->id}}">
                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="fas fa-fw fa-exchange-alt" title="Emprestar Livro"></i>
                                                    </button>
                                                </form>
                                            </div>

                                            <div style="display: inline-block; margin-right: 2px;">
                                                <form action="{{ route('acervodeletar', $li->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"
                                                        onclick="return confirm('Tem certeza que deseja deletar este livro?')">
                                                        <i class="fas fa-fw fa-trash" title="Excluir"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                    <td><strong>{{ $li->title }}</strong></td>
                                    <td>{{ $li->author }}</td>
                                    <td>{{ $li->genero->name }}</td>
                                    <td>{{ $li->registration_number_book }}</td>
                                    <td>
                                        @if ($li->status == 'Disponível')
                                            <span class="badge badge-success">{{ $li->status }}</span>
                                        @else
                                            <span class="badge badge-warning">{{ $li->status }}</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Opções</th>
                                <th>Nome</th>
                                <th>Autor</th>
                                <th>Classificação/Gênero</th>
                                <th>Número de Registro</th>
                                <th>Situação</th>
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
            {{ $livros->links() }}
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
                "searching": false,
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
