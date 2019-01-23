@extends('layouts.web')
@section('title', 'Reportes')
@section('content')
<ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">Home</a>
        </li>
        <li class="breadcrumb-item active">Graficos</li>
    </ol>

    
@include('layouts.error')
<div class="row">
    <div class="col">
            {!! Form::open(['route' => 'vergraficos', 'method' => 'POST', 'class' => 'col-lg-6','role'=>'form', 'name' =>'form']) !!}
            <div class="form-group">
                    <label class="control-label">Fecha (Desde)</label>
                    <div class="input-group date" id="dt1">
                        <input id="fecha" name="fecha" class="form-control datepicker" type="text" readonly>
                    </div>
            </div>
            <div class="form-group">
                    <label class="control-label">Productores</label>
                    
            @foreach($productores as $p)
                <p class="alert-warning border border-secondary">
                    <input name="productor[]" type='checkbox' checked value="{{$p->productor_id}}" class="case" /> <label>{{$p->productor_id}} - {{$p->productor_nombre}}</label>
                </p>
            @endforeach
            </div>
            <button type="submit" class="btn btn-primary btn_ok btn-block">Ver Gráficos <i class="far fa-caret-square-right"></i> </button>
            {!! Form::close() !!} 
    </div>
</div>
@endsection


@section('js')
<script src="{{ url('vendor/datatables/dataTables.buttons.min.js') }}"></script>
<link rel="stylesheet" href="{{ url('vendor/datatables/buttons.bootstrap4.min.css') }}">
<link href="https://unpkg.com/gijgo@1.9.11/css/gijgo.min.css" rel="stylesheet" type="text/css" />
<script src="https://unpkg.com/gijgo@1.9.11/js/gijgo.min.js" type="text/javascript"></script>
<script src="{{ url('js/messages/messages.es-es.min.js') }}"></script>

<script type="text/javascript">
$(function(){


    var muestra_fecha = $('#fecha').datepicker({
        uiLibrary: 'bootstrap4',
        locale: 'es-es',
        format: 'dd-mm-yyyy',
        change: function (e) {
            $(this).focus();
        }
    });


})
</script>

@endsection