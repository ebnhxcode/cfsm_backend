@extends('layouts.web')
@section('title', 'Muestra')
@section('content')

@include('layouts.error')
{!! Form::open(['route' => 'muestras.store', 'method' => 'POST', 'class' => 'col-lg-6','role'=>'form']) !!}
    <h2 class="" id="">Muestra</h2>
    @include('admin.muestras.form.muestra')
    <button type="submit" class="btn btn-primary btn_ok">Enviar</button>
{!! Form::close() !!}

@endsection
@section('js')
<script type="text/javascript">
    $(document).ready(function () {
        alert("a");
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4',
            locale: 'es-es',
        });
        alert("b");
    });
</script>
@endsection
