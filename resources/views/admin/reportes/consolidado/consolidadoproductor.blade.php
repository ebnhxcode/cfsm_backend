@extends('layouts.web')
@section('title', 'Consolidado')
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">Home</a>
        </li>
        <li class="breadcrumb-item active">Consolidado Muestras - Productor</li>
    </ol>



<div class="row">
        <div  class="col-sm-12">
                {!! Form::open(['route' => 'reporteConsolidadoProductor', 'method' => 'POST', 'class' => '','role'=>'form']) !!}
                <div class="form-group">
                    {!! Form::label('region_id', 'Region', array('class' => '')) !!}
                    <select class='form-control' id='region_id' name='region_id'>
                        <option value=""> Seleccione una región </option>
                        @foreach ($regiones as $r)
                            <option value="{{$r->region_id}}" @isset($muestra->region_id) {{ $muestra->region_id == $r->region_id ? 'selected' : '' }} @endisset > {{$r->region_nombre}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    {!! Form::label('productor_id', 'Productor', array('class' => '')) !!}
                    <select class='form-control' id='productor_id' name='productor_id'>
                            @foreach ($productores as $p)
                                <option value="{{$p->productor_id}}" @isset($muestra->region_id)  {{ $muestra->productor_id == $p->productor_id ? 'selected' : '' }} @endisset > {{$p->productor_nombre}}  </option> 
                            @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary btn_ok btn-block">Generar reporte <i class="far fa-caret-square-right"></i> </button>
                {!! Form::close() !!}
        </div>
    
</div>



    @endsection
@section('js')
<script type="text/javascript">

    $(document).ready(function () {

        $( "#region_id" ).change(function() {
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

          //dalert(region_id);
         });
    });
    
</script>
@endsection