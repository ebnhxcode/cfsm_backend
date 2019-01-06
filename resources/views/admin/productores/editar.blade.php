@extends('layouts.web')
@section('title', 'Productor')
@section('content')

@include('layouts.error')

{!! Form::model($productor, array('route' => array('productores.update', $productor->productor_id), 'method'=>'PUT', 'class' => 'form-horizontal editar', 'role'=>'form')) !!}
<div class="modal-header">
    <h4 class="modal-title titulo_formulario" id="">Editar productor</h4>
</div>
<div class="modal-body">    
    @include('admin.productores.form.productor')
</div>
<div class="modal-footer">
    
    <button type="submit" class="btn btn-primary btn_ok">Actualizar</button>
    
    
    
</div>
{!! Form::close() !!}

@endsection
@section('js')
<script type="text/javascript">
    $(document).ready(function () {
        
    });
</script>
@endsection