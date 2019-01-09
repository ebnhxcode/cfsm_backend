@extends('layouts.web')
@section('title', 'Tolerancia')
@section('content')

@include('layouts.error')
{!! Form::open(['route' => 'tolerancias.store', 'method' => 'POST', 'class' => 'col-lg-6','role'=>'form']) !!}
    <h2 class="" id="">Tolerancia</h2>
    @include('admin.tolerancias.form.tolerancia')
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
