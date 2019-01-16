@extends('layouts.web')
@section('title', 'Tolerancia')
@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="#">Home</a>
    </li>
    <li class="breadcrumb-item active">Tolerancia</li>
</ol>
@include('layouts.error')

{!! Form::model($tolerancia, array('route' => array('tolerancias.update', $tolerancia->tolerancia_id), 'method'=>'PUT', 'class' => '', 'role'=>'form')) !!}
    <h2 class="" id="">Tolerancia</h2>
    @include('admin.tolerancias.form.tolerancia')
    <button type="submit" class="btn btn-primary btn_ok">Actualizar</button>
{!! Form::close() !!}

@endsection
@section('js')
<script type="text/javascript">Q
    $(document).ready(function () {

    });
</script>
@endsection
