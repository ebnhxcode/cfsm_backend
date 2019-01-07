@extends('layouts.master')
@section('title', 'Jugadores')
@section('content')

@include('layouts.flash')
<!-- <button type="button" class="btn btn-xs btn-success"><a href="{!!URL::to('/mazos/create')!!}" > AGREGAR </a> </button> -->
{{link_to_route('jugadores.create', 'Agregar', $parameters = null , $attributes = ['class'=>'btn btn-success'])}}
<div align="center">
        <table class="table">
            <tr >
                <th>ID</th>
                <th>NOMBRE</th>
                <th>DCI</th>
                <th colspan="2">OPCIONES</th>
            </tr>

            @foreach($jugadores as $j)
            <tr>
                <td> {{$j->JGD_ID}} </td>
                <td> {{$j->JGD_NOMBRE}}</td>
                <td> {{$j->JGD_DCI}}</td>
                <td> 
                    
                    {{link_to_route('jugadores.edit', 'editar', $parameters = $j->JGD_ID , $attributes = ['class'=>'btn btn-xs btn-warning'])}}
                
                
                </td>
                <td> 
                    {!! Form::model($j, array('route' => array('jugadores.destroy', $j->JGD_ID), 'method'=>'DELETE', 'class' => 'form-horizontal editar', 'role'=>'form')) !!}
                    <button type="submit" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-minus-sign"></span></button>
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach         
        </table>

        <nav class="paginacion">
            {!! $jugadores->render() !!}
        </nav>
</div>

@endsection
@section('js')
<script type="text/javascript">
    $(document).ready(function () {
        
        
    });
</script>
@endsection