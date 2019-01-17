@extends('layouts.web')
@section('title', 'Reportes')
@section('content')

    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">Home</a>
        </li>
        <li class="breadcrumb-item active">Reportes</li>
    </ol>
    {{link_to_route('muestras.create', 'Agregar', $parameters = null , $attributes = ['class'=>'btn btn-success btn-lg btn-block'])}}
    {{-- link_to_route('productores.create', 'Agregar', $parameters = null , $attributes = ['class'=>'btn btn-success']) --}}

    <div class="row">
        <div class="form-group col-sm-6">
            <label class="control-label">Fecha (Desde)</label>
            <!--<div class="col-sm-4">-->
                <div class="input-group date" id="dt1">
                    <input id="desde" name="desde" class="form-control datepicker" type="text" readonly>
                </div>
            <!--</div>-->
        </div>
        <div class="form-group col-sm-6">
            <label class="control-label">Fecha (Hasta)</label>
            <!--<div class="col-sm-4">-->
                <div class="input-group date" id="dt2">
                    <input id="hasta" name="hasta" class="form-control datepicker" type="text" readonly>
                </div>
            <!--</div>-->
        </div>
    
        {{-- productor, especie, variedad, calibre, etiqueta, fecha --}}
    
        <div class="form-group col-sm-6">
            <label class="control-label">Productor</label>
            <!--<div class="col-sm-10">-->
                <select class="form-control" id="productor" name="productor">
                    <option value="" selected></option>
                    @foreach( App\Productor::all() as $p )
                        <option value="{{ $p->productor_id }}">{{ $p->productor_nombre }}</option>
                    @endforeach
                </select>
            <!--</div>-->
        </div>
    
        <div class="form-group col-sm-6">
            <label class="control-label">Especie</label>
            <!--<div class="col-sm-10">-->
                <select class="form-control" id="especie" name="especie">
                    <option value="" selected></option>
                    @foreach( App\Especie::all() as $e )
                        <option value="{{ $e->especie_id }}">{{ $e->especie_nombre }}</option>
                    @endforeach
                </select>
            <!--</div>-->
        </div>
    
        <div class="form-group col-sm-6">
            <label class="control-label">Variedad</label>
            <!--<div class="col-sm-10">-->
                <select class="form-control" id="variedad" name="variedad">
                    <option value="" selected></option>
                    @foreach( App\Variedad::all() as $v )
                        <option value="{{ $v->variedad_id }}">{{ $v->variedad_nombre }}</option>
                    @endforeach
                </select>
            <!--</div>-->
        </div>
    
        <div class="form-group col-sm-6">
            <label class="control-label">Calibre</label>
            <!--<div class="col-sm-10">-->
                <select class="form-control" id="calibre" name="calibre">
                    <option value="" selected></option>
                    @foreach( App\Calibre::all() as $c )
                        <option value="{{ $c->calibre_id }}">{{ $c->calibre_nombre }}</option>
                    @endforeach
                </select>
            <!--</div>-->
        </div>
    
        <div class="form-group col-sm-6">
            <label class="control-label">Etiqueta</label>
            <!--<div class="col-sm-10">-->
                <select class="form-control" id="etiqueta" name="etiqueta">
                    <option value="" selected></option>
                    @foreach( App\Etiqueta::all() as $e )
                        <option value="{{ $e->etiqueta_id }}">{{ $e->etiqueta_nombre }}</option>
                    @endforeach
                </select>
            <!--</div>-->
        </div>
        <div class="form-group col-sm-6">
            <label class="control-label">Muestra QR</label>
           
            <input type="text" name="muestra_qr" id="muestra_qr" value="" class="form-control" > 
            
        </div>
        <div class="col-sm-12">
            <button type="button" class="btn btn-primary col-sm-2 offset-sm-5" id="btnSearch">Filtrar</button>
        </div>
    </div>

    {!! $dataTable->table() !!}

@endsection
@section('js')
@endsection

@push('custom_js')

    <link rel="stylesheet" href="{{ url('vendor/datatables/buttons.bootstrap4.min.css') }}">
    <link href="https://unpkg.com/gijgo@1.9.11/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />


    <script src="https://unpkg.com/gijgo@1.9.11/js/gijgo.min.js" type="text/javascript"></script>

    <script src="{{ url('js/messages/messages.es-es.min.js') }}"></script>

    <script src="{{ url('vendor/datatables/dataTables.buttons.min.js') }}"></script>
    <script src="{{ url('vendor/datatables/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ url('vendor/datatables/buttons.server-side.js') }}"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js" type="text/javascript"></script>


    <script type="text/javascript">
        // Parametros por defecto de los DataTable
        $.extend(true, $.fn.dataTable.defaults, {
            "language": {
                "url": "{{ url('vendor/datatables/spanish.json') }}"
            },
            'autoWidth': false,
            'stateSave': true,
            'responsive': true,
            columnDefs: [ {
                className: 'control'
            } ],
            
        });
    </script>

    {!! $dataTable->scripts() !!}

    <script type="text/javascript">
        (function($, DataTable){
            $("#dataTableBuilder").on('preXhr.dt', function(e, settings, data) {
                data.desde      = $('#desde').val()
                data.hasta      = $('#hasta').val()
                data.productor  = $('#productor').val()
                data.especie    = $('#especie').val()
                data.variedad   = $('#variedad').val()
                data.calibre    = $('#calibre').val()
                data.etiqueta   = $('#etiqueta').val()
                data.muestra_qr = $('#muestra_qr').val()
            })

            $('#btnSearch').on('click', function(e){
                $("#dataTableBuilder").DataTable().search( $('input[type="search"]').val()).draw()
            })

            //Iniciar datepickers.
            var desde = $('#desde').datepicker({
                uiLibrary: 'bootstrap4',
                locale: 'es-es',
                format: 'dd-mm-yyyy',
                maxDate: function () {
                    return $('#hasta').val();
                },
                change: function (e) {
                    $(this).focus();
                }
            });

            var hasta = $('#hasta').datepicker({
                uiLibrary: 'bootstrap4',
                locale: 'es-es',
                format: 'dd-mm-yyyy',
                minDate: function () {
                    return $('#desde').val();
                },
                change: function (e) {
                    $(this).focus();
                }
            });

            DataTable.ext.buttons.reset = {
                className: 'buttons-reload',

                text: '<i class="fa fa-undo"></i> Reiniciar',

                action: function (e, dt, button, config) {
                    $('#desde').val(null)
                    $('#hasta').val(null)
                    $('#productor').val(null)
                    $('#especie').val(null)
                    $('#variedad').val(null)
                    $('#calibre').val(null)
                    $('#etiqueta').val(null)
                    $('#muestra_qr').val(null)
                    $('input[type="search"]').val(null)

                    dt.search('').draw();
                }
            };
        })(jQuery, jQuery.fn.dataTable)
    </script>
@endpush