@extends('layouts.web')
@section('title', 'Calibre')
@section('content')

@include('layouts.error')
{!! Form::open(['route' => 'calibres.store', 'method' => 'POST', 'class' => 'col-lg-6','role'=>'form']) !!}
    <h2 class="" id="">Calibre</h2>
    @include('admin.calibres.form.calibre')
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
