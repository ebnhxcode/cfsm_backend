@extends('layouts.web')
@section('title', 'Etiqueta')
@section('content')

@include('layouts.error')
{!! Form::open(['route' => 'etiquetas.store', 'method' => 'POST', 'class' => 'col-lg-6','role'=>'form']) !!}
    <h2 class="" id="">Etiqueta</h2>
    @include('admin.etiquetas.form.etiqueta')
    <button type="submit" class="btn btn-primary btn_ok">Enviar</button>
{!! Form::close() !!}

@endsection
@section('js')
<script type="text/javascript">
    $(document).ready(function () {
        $('.datepicker').datepicker({
            startDate: '-3d'
        });
    });
</script>
@endsection
