@extends('layouts.web')
@section('title', 'Tolerancias')
@section('content')

    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">Home</a>
        </li>
        <li class="breadcrumb-item active">Tolerancias</li>
    </ol>

    {{link_to_route('tolerancias.create', 'Agregar', $parameters = null , $attributes = ['class'=>'btn btn-success'])}}

    <table class="table" id="pd">
        <thead>
            <tr >
                <th>id</th>
                <th>Defecto</th>
                <th>Categoria</th>
                <th>Nota</th>
                <th>Desde</th>
                <th>Hasta</th>
                <th>-</th>
            </tr>
        </thead>

    </table>




@endsection
@section('js')
<script type="text/javascript">
    $(document).ready(function () {
        $('#pd').DataTable({
            language: {
                "decimal": "",
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Entradas",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },
            processing: true,
            serverSide: true,
            ajax: '{{ url('toleranciasDatetables')}}',
            columns: [
                        { data: 'tolerancia_id', name: 'tolerancia_id' },
                        { data: 'defecto.defecto_nombre', name: 'defecto.defecto_nombre' },
                        { data: 'categoria.categoria_nombre', name: 'categoria.categoria_nombre' },
                        { data: 'nota.nota_nombre', name: 'nota.nota_nombre' },
                        { data: 'tolerancia_desde', name: 'tolerancia_desde' },
                        { data: 'tolerancia_hasta', name: 'tolerancia_hasta' },
                        { data: 'action',searchable:false}
                        /*,
                        {render: function () {
                            return '<button type="button" id="ButtonEditar" class="editar edit-modal btn btn-warning botonEditar"><span class="fa fa-edit"></span><span class="hidden-xs"> Editar</span></button>';
                        }},*/
                     ],
        });
    });
</script>
@endsection
