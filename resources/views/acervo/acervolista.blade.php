@extends('adminlte::page')
@section('title', 'Acervo da Biblioteca')

@section('content_header')
<h2></h2>
@stop

@section('content')
<div class="row">
    <!-- left column -->
    <div class="col-12">
        <!-- jquery validation -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Acervo da Biblioteca</h3>
            </div>
            <!-- /.card-header -->
            <!-- /.card-header -->
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
