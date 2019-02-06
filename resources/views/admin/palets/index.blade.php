@extends('layouts.web')
@section('title', 'Consolidado')
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">Home</a>
        </li>
        <li class="breadcrumb-item active">Pallets</li>
    </ol>

    <table class="table" id="palet">
        <thead>
            <tr >
                <th>N° de Pallet</th>
                <th>Categoría </th>
                <th>Muestras </th>
                <th>Fecha </th>
                <th>Nota Palet </th>
                <th>-</th>
            </tr>
        </thead>

    </table>



    @endsection
@section('js')
<script type="text/javascript">
    $(document).ready(function () {
        $('#palet').DataTable({
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
            ajax: '{{ url('paletsDatatables')}}',
            columns: [
                        { data: 'numero_pallet', name: 'numero_pallet' },
                        { data: 'categoria_nombre', name: 'categoria_nombre' },
                        { data: 'COUNT', name: 'COUNT' },
                        { data: 'muestra_fecha', name: 'muestra_fecha' },
                        { data: 'nota_nombre', name: 'nota_nombre' },
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
