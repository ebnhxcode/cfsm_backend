@extends('layouts.web')
@section('title', 'Productor')
@section('content')

<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="#">Home</a>
    </li>
    <li class="breadcrumb-item active">Productores</li>
</ol>

@include('layouts.error')



{!! Form::open(['route' => 'productores.store', 'method' => 'POST', 'class' => 'form-horizontal crear','role'=>'form']) !!}
<div class="modal-header">
    <h4 class="modal-title titulo_formulario" id="">Productor</h4>
</div>
<div class="modal-body">
    @include('admin.productores.form.productor')
</div>
<div class="modal-footer">

    <button type="submit" class="btn btn-primary btn_ok">Enviar</button>
</div>
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
