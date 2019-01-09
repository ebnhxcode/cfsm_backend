@extends('layouts.web')
@section('title', 'Etiqueta')
@section('content')

@include('layouts.error')

{!! Form::model($embalaje, array('route' => array('embalajes.update', $embalaje->embalaje_id), 'method'=>'PUT', 'class' => '', 'role'=>'form')) !!}
    <h2 class="" id="">Embalaje</h2>
    @include('admin.embalajes.form.embalaje')
    <button type="submit" class="btn btn-primary btn_ok">Actualizar</button>
{!! Form::close() !!}

@endsection
@section('js')
<script type="text/javascript">Q
    $(document).ready(function () {

    });
</script>
@endsection
