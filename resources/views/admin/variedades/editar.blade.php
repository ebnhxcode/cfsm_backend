@extends('layouts.web')
@section('title', 'Productor')
@section('content')

@include('layouts.error')

{!! Form::model($variedad, array('route' => array('variedades.update', $variedad->variedad_id), 'method'=>'PUT', 'class' => '', 'role'=>'form')) !!}
    <h2 class="" id="">Editar productor</h2>
    @include('admin.variedades.form.variedad')
    <button type="submit" class="btn btn-primary btn_ok">Actualizar</button>
{!! Form::close() !!}

@endsection
@section('js')
<script type="text/javascript">
    $(document).ready(function () {
        
    });
</script>
@endsection