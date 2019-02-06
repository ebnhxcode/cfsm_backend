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

<div class="col">
    {!! Form::open(['route' => 'setMuestraSerie', 'method' => 'POST', 'class' => '','role'=>'form']) !!}

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
    {!! Form::close() !!}
</div>




@endsection
@section('js')
<script type="text/javascript">
    $(document).ready(function () {
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
