@extends('layouts.web')
@section('title', 'Variedad')
@section('content')


@include('layouts.error')

{!! Form::open(['route' => 'variedades.store', 'method' => 'POST', 'class' => 'col-lg-6','role'=>'form']) !!}
    <h2 class="" id="">Variedad</h2>
    @include('admin.variedades.form.variedad')
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