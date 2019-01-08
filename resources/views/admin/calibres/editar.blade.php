@extends('layouts.web')
@section('title', 'Calibre')
@section('content')

@include('layouts.error')

{!! Form::model($calibre, array('route' => array('calibres.update', $variedad->variedad_id), 'method'=>'PUT', 'class' => '', 'role'=>'form')) !!}
    <h2 class="" id="">Calibre</h2>
    @include('admin.calibres.form.calibre')
    <button type="submit" class="btn btn-primary btn_ok">Actualizar</button>
{!! Form::close() !!}

@endsection
@section('js')
<script type="text/javascript">
    $(document).ready(function () {

    });
</script>
@endsection
