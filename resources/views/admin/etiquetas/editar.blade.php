@extends('layouts.web')
@section('title', 'Etiqueta')
@section('content')

@include('layouts.error')
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="#">Home</a>
    </li>
    <li class="breadcrumb-item active">Etiqueta</li>
</ol>
{!! Form::model($etiqueta, array('route' => array('etiquetas.update', $etiqueta->etiqueta_id), 'method'=>'PUT', 'class' => '', 'role'=>'form')) !!}
    <h2 class="" id="">Etiqueta</h2>
    @include('admin.etiquetas.form.etiqueta')
    <button type="submit" class="btn btn-primary btn_ok">Actualizar</button>
{!! Form::close() !!}

@endsection
@section('js')
<script type="text/javascript">
    $(document).ready(function () {

    });
</script>
@endsection
