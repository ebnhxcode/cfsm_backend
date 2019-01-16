@extends('layouts.web')
@section('title', 'Calibre')
@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="#">Home</a>
    </li>
    <li class="breadcrumb-item active">Embalaje</li>
</ol>
@include('layouts.error')
{!! Form::open(['route' => 'embalajes.store', 'method' => 'POST', 'class' => 'col-lg-6','role'=>'form']) !!}
    <h2 class="" id="">Embalaje</h2>
    @include('admin.embalajes.form.embalaje')
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
