@extends('layouts.web')
@section('title', 'Reportes')
@section('content')
{!! Form::open(['route' => 'muestras.store', 'method' => 'POST', 'class' => '','role'=>'form']) !!}
<div class="row">
    
        <div class="col-lg-6" >
                <div class="form-group">
                        {!! Form::label('muestra_peso', 'Peso Muestra', array('class' => '')) !!}
                        {!! Form::text('muestra_peso','', ['class' => 'form-control','id'=>'muestra_peso']) !!}
                </div>
                <div class="form-group">
                        {!! Form::label('muestra_desgrane', 'Desgrane Muestra', array('class' => '')) !!}
                        {!! Form::text('muestra_desgrane','', ['class' => 'form-control','id'=>'muestra_peso']) !!}
                </div>
                <div class="form-group">
                        {!! Form::label('apariencia_id', 'Apariencia', array('class' => '')) !!}
                        
                </div>
        </div>

        <div class="col-lg-6" >
            
        </div>
</div>
{!! Form::close() !!}
@endsection
@section('js')
@endsection