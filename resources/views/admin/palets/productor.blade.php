@extends('layouts.web')
@section('title', 'Consolidado')
@section('content')

<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="#">Home</a>
    </li>
    <li class="breadcrumb-item">
        <a href="#">Pallet</a>
    </li>
    <li class="breadcrumb-item active">Productor</li>
</ol>

@include('layouts.error')
<div class="col">
    {!! Form::open(['route' => 'generaExelPallet', 'method' => 'POST', 'class' => '','role'=>'form']) !!}

    <div class="form-group">
        {!! Form::label('region_id', 'Region', array('class' => '')) !!}
        <select class='form-control' id='region_id' name='region_id'>
            <option value=""> Seleccione una región </option>
            @foreach ($regiones as $r)
                <option value="{{$r->region_id}}" > {{$r->region_nombre}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        {!! Form::label('productor_id', 'Productor', array('class' => '')) !!}
        <select class='form-control' id='productor_id' name='productor_id'>

        </select>
    </div>
    <div class="form-group">
        <label class="control-label">Fecha (Solo se mostraran datos del día seleccionado)</label>
        <div class="input-group date" id="dt1">
            <input id="fecha" value=""  name="fecha" class="form-control datepicker" type="text" readonly>
        </div>
    </div>
    <button type="submit" class="btn btn-primary btn_ok btn-block">Ver reporte<i class="far fa-caret-square-right"></i> </button>
    {!! Form::close() !!}
</div>




@endsection
@section('js')
<link rel="stylesheet" href="{{ url('vendor/datatables/buttons.bootstrap4.min.css') }}">
<link href="https://unpkg.com/gijgo@1.9.11/css/gijgo.min.css" rel="stylesheet" type="text/css" />
<script src="https://unpkg.com/gijgo@1.9.11/js/gijgo.min.js" type="text/javascript"></script>
<script src="{{ url('js/messages/messages.es-es.min.js') }}"></script>
<script src="{{ url('vendor/datatables/dataTables.buttons.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function () {

        var muestra_fecha = $('#fecha').datepicker({
                uiLibrary: 'bootstrap4',
                locale: 'es-es',
                format: 'dd-mm-yyyy',
                change: function (e) {
                    $(this).focus();
                }
        });



        $("#region_id").change(function() {
        var route = "{!!URL::to('/getProductoresByRegionId')!!}";
        //alert(route);
        var region_id = $("#region_id" ).val();
        var select = $("#productor_id");
        var token = $("input[name=_token]").val();
            $("#productor_id option").remove();
            $.post( route, { region_id: region_id , _token : token })
            .done(function( data ) {
                $(data).each(function( index, value ) {
                        select.append("<option value='"+value.id+"'> "+value.nombre+"</option>");
                        console.log( value.id + value.nombre );
                });
            });
        });
    });
</script>
@endsection
