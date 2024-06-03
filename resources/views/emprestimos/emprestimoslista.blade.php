@extends('adminlte::page')
@section('title', 'Empréstimos')

@section('content_header')
    <h2>
    </h2>
@stop

@php
    use Carbon\Carbon;
@endphp

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
            {{ $emprestimos->links() }}
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Empréstimos</h3>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Opções</th>
                                <th>Usuário</th>
                                <th>Livro</th>
                                <th>Data Inical</th>
                                <th>Data Final</th>
                                <th>Situação</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($emprestimos as $em)
                                <tr>
                                    <td>
                                        <div class="btn-group">
                                            <div style="display: inline-block; margin-right: 2px;">
                                                <form action="{{ route('emprestimoatualizar', ['id' => $em->id]) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" id="devolvido" name="status" value="Devolvido">
                                                    <button type="submit" class="btn btn-success"
                                                        onclick="return confirm('Tem certeza que deseja Concluir este empréstimo?')">
                                                        <i class="fas fa-fw fa-check" title="Concluir Empréstimo"></i>
                                                    </button>
                                                </form>
                                            </div>

                                            <div style="display: inline-block; margin-right: 2px;">
                                                <form action="{{ route('emprestimoatualizar', ['id' => $em->id]) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" id="atrasado" name="status" value="Atrasado">

                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja marcar como Atrasado este empréstimo?')">
                                                        <i class="fas fa-fw fa-exclamation"
                                                            title="Empréstimo em atraso"></i>
                                                    </button>
                                                </form>
                                            </div>

                                            <div style="display: inline-block; margin-right: 2px;">
                                                <form action="{{ route('emprestimosdeletar', ['id' => $em->id]) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="hidden" id="atrasado" name="status" value="Atrasado">

                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja marcar como Atrasado este empréstimo?')">
                                                        <i class="fas fa-fw fa-trash"
                                                            title="Empréstimo em atraso"></i>
                                                    </button>
                                                </form>
                                            </div>

                                        </div>
                                    </td>
                                    <td><strong>{{ $em->usersbiblioteca->name }}</strong></td>
                                    <td>{{ $em->livros->title }}</td>
                                    <td>{{ Carbon::parse($em->start_date)->format('d/m/Y') }}</td>
                                    <td>{{ Carbon::parse($em->return_date)->format('d/m/Y') }}</td>
                                    <td>
                                        @if ($em->status == 'Devolvido')
                                            <span class="badge badge-success">{{ $em->status }}</span>
                                        @elseif ($em->status == 'Atrasado')
                                            <span class="badge badge-danger">{{ $em->status }}</span>
                                        @else
                                            <span class="badge badge-warning">{{ $em->status }}</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Opções</th>
                                <th>Usuário</th>
                                <th>Livro</th>
                                <th>Data Inical</th>
                                <th>Data Final</th>
                                <th>Situação</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
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
