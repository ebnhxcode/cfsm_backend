@extends('layouts.web')
@section('title', 'Muestras')
@section('content')

    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">Home</a>
        </li>
        <li class="breadcrumb-item active">Muestras</li>
    </ol>

    {{link_to_route('muestras.create', 'Agregar', $parameters = null , $attributes = ['class'=>'btn btn-success'])}}
    <table class="table" id="pd">
        <thead>
            <tr >
                <th>id</th>
                <th>QR</th>
                <th>Región</td>
                <th>Productor</td>
                <th>Especie</td>
                <th>Variedad</td>
                <th>Categoría</td>
                <th>Nota</td>                    
                <th>-</th>
            </tr>
        </thead>

    </table>
    @endsection
    @section('js')
    <script type="text/javascript">
        $(document).ready(function () {
            var dtable = $('#pd').DataTable({
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
                responsive: true,
                ajax: '{{ url('muestrasDatetables')}}',
                columns: [
                            { data: 'muestra_id', name: 'muestra_id' },
                            { data: 'muestra_qr', name: 'muestra_id' },
                            { data: 'region.region_nombre', name: 'region.region_nombre' },
                            { data: 'productor.productor_nombre', name: 'productor.productor_nombre' },
                            { data: 'especie.especie_nombre', name: 'especie.especie_nombre' },
                            { data: 'variedad.variedad_nombre', name: 'variedad.variedad_nombre' },
                            { data: 'categoria.categoria_nombre', name: 'categoria.categoria_nombre' },
                            { data: 'nota.nota_nombre', name: 'nota.nota_nombre' },
                            { data: 'action',searchable:false}
                            /*,
                            {render: function () {
                                return '<button type="button" id="ButtonEditar" class="editar edit-modal btn btn-warning botonEditar"><span class="fa fa-edit"></span><span class="hidden-xs"> Editar</span></button>';
                            }},*/
                         ],
            });

            dtable.columns().every( function () {
                var that = this;
                $( 'input', this.footer() ).on( 'keyup change', function () {
                    if ( that.search() !== this.value ) {
                        that
                            .search( this.value )
                            .draw();
                    }
                } );
            } );

            /*var n = document.createElement('script');
            n.setAttribute('language', 'JavaScript');
            n.setAttribute('src', 'https://debug.datatables.net/debug.js');
            document.body.appendChild(n);*/

        });
    </script>
    @endsection
