@extends('layouts.web')
@section('title', 'Productrores')
@section('content')

    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">Home</a>
        </li>
        <li class="breadcrumb-item active">Productores</li>
    </ol>

    {{link_to_route('productores.create', 'Agregar', $parameters = null , $attributes = ['class'=>'btn btn-success'])}}

    <table class="table" id="pd">
        <thead>
            <tr >
                <th>id</th>
                <th>Productor</th>
                <th>Region</th>
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
            ajax: '{{ url('productoresDatetables')}}',
            columns: [
                        { data: 'productor_id', name: 'productor_id' },
                        { data: 'productor_nombre', name: 'productor_nombre' },
                        { data: 'region.region_nombre', name: 'region.region_nombre' },
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