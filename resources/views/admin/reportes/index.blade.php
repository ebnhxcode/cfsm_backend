@extends('layouts.web')
@section('title', 'Reportes')
@section('content')

    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">Home</a>
        </li>
        <li class="breadcrumb-item active">Reportes</li>
    </ol>

    {{-- link_to_route('productores.create', 'Agregar', $parameters = null , $attributes = ['class'=>'btn btn-success']) --}}

    <div class="form-group col-xs-6">
        <label class="control-label">Fecha (Desde)</label>
        <!--<div class="col-sm-4">-->
            <div class="input-group date" id="dt1">
                <input id="order_from" name="order_from" class="form-control" type="text" readonly>
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
        <!--</div>-->
    </div>
    <div class="form-group col-xs-6">
        <label class="control-label">Fecha (Hasta)</label>
        <!--<div class="col-sm-4">-->
            <div class="input-group date" id="dt2">
                <input id="order_to" name="order_to" class="form-control" type="text" readonly>
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
        <!--</div>-->
    </div>

    <div class="form-group col-xs-6">
        <label class="control-label">Proveedor</label>
        <!--<div class="col-sm-10">-->
            <select class="form-control" id="s_supplier" name="s_supplier">
                <option value="" selected></option>
            </select>
        <!--</div>-->
    </div>

    <div class="form-group col-xs-6">
        <label class="control-label">Estado</label>
        <!--<div class="col-sm-10">-->
            <select class="form-control" id="s_status" name="s_status">
                <option value="" selected></option>
            </select>
        <!--</div>-->
    </div>

    <div class="form-group col-xs-6">
        <label class="control-label">Fecha de entrega (Desde)</label>
        <!--<div class="col-sm-10">-->
            <div class="input-group date" id="dt4">
                <input id="delivery_from" name="delivery_from" class="form-control" type="text" readonly>
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
        <!--</div>-->
    </div>
    <div class="form-group col-xs-6">
        <label class="control-label">Fecha de entrega (Hasta)</label>
        <!--<div class="col-sm-10">-->
            <div class="input-group date" id="dt5">
                <input id="delivery_to" name="delivery_to" class="form-control" type="text" readonly>
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
        <!--</div>-->
    </div>

    <div class="form-group col-xs-6">
        <label class="control-label">Facturados</label>
        <!--<div class="col-sm-10">-->
            <select class="form-control" id="invoiced" name="invoiced">
                <option value="" selected></option>
                <option value="0">Sin facturar</option>
                <option value="1">Solo facturados</option>
            </select>
        <!--</div>-->
    </div>

    <div class="col-xs-12">
        <button type="button" class="btn btn-primary col-xs-2 col-xs-offset-5" id="btnSearch">Filtrar</button>
    </div>

    {!! $dataTable->table() !!}

@endsection
@section('js')
@endsection

@push('custom_js')
    <link rel="stylesheet" href="{{ url('vendor/datatables/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('css/bootstrap-datetimepicker.min.css') }}">
    <script src="{{ url('vendor/datatables/dataTables.buttons.min.js') }}"></script>
    <script src="{{ url('vendor/datatables/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ url('vendor/datatables/buttons.server-side.js') }}"></script>

    <script src="{{ url('js/moment-with-locale.js') }}"></script>
    
    <script src="{{ url('js/bootstrap-datetimepicker.min.js') }}"></script>

    <script type="text/javascript">
        // Parametros por defecto de los DataTable
        $.extend(true, $.fn.dataTable.defaults, {
            "language": {
                "url": "{{ url('vendor/datatables/spanish.json') }}"
            },
            'autoWidth': false,
            'stateSave': true
        });
    </script>
  
    {!! $dataTable->scripts() !!}

    <script type="text/javascript">
        (function($, DataTable){
            $("#dataTableBuilder").on('preXhr.dt', function(e, settings, data) {
                data.order_from     = $('#order_from').val()
                data.order_to       = $('#order_to').val()
                data.s_supplier     = $('#s_supplier').val()
                data.s_status       = $('#s_status').val()
                data.delivery_from  = $('#delivery_from').val()
                data.delivery_to    = $('#delivery_to').val()
                data.invoice        = $('#invoiced').val()
            })

            $('#btnSearch').on('click', function(e){
                $("#dataTableBuilder").DataTable().search( $('input[type="search"]').val()).draw()
            })

            $('#dt1,#dt2').datetimepicker({
                sideBySide: true,
                format: 'DD/MM/YYYY 00:00:00',
                ignoreReadonly: true,
                locale: 'es'
            });

            DataTable.ext.buttons.reset = {
                className: 'buttons-reload',

                text: '<i class="fa fa-undo"></i> Reiniciar',

                action: function (e, dt, button, config) {
                    $('#order_from').val(null)
                    $('#order_to').val(null)
                    $('#s_supplier').val(null)
                    $('#s_status').val(null)
                    $('#delivery_from').val(null)
                    $('#delivery_to').val(null)
                    $('input[type="search"]').val(null)

                    dt.search('').draw();
                }
            };
        })(jQuery, jQuery.fn.dataTable)
    </script>
@endpush