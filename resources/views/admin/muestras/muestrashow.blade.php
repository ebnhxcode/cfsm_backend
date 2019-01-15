@extends('layouts.web')
@section('title', 'Reportes')
@section('content')
{!! Form::open(['route' => 'muestras.store', 'method' => 'POST', 'class' => '','role'=>'form']) !!}
<div class="row">
    
        <div class="" 
        <div class="col-lg-6" >
                <div class="form-group">
                    {!! Form::label('muestra_defecto_valor', 'Valor', array('class' => '')) !!}
                    {!! Form::text('muestra_defecto_valor','', ['class' => 'form-control','id'=>'muestra_qr']) !!}
                </div>
                <div class="form-group">
                        {!! Form::label('concepto', 'Concepto', array('class' => '')) !!}
                        <select name="concepto_id" id="concepto_id" class="form-control" >
                                <option value=""> -- </option>
                                @foreach ($conceptos as $c)
                                    <option value="{{$c->concepto_id}}"   > {{$c->concepto_nombre}}</option>
                                @endforeach
                        </select>
                    </div>
            </div>

        <div class="col-lg-6" >
            
        </div>
</div>
{!! Form::close() !!}
@endsection
@section('js')
@endsection