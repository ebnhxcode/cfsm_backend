@extends('layouts.web')
@section('title', 'Palet - Muestra')
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">Home</a>
        </li>
        <li class="breadcrumb-item">
            <a href="#">Palets</a>
        </li>
        <li class="breadcrumb-item active">Mustras</li>
    </ol>

        <table class="table">
            <thead>
                <tr>
                <th>Id</th>
                <th>Muestra QR</th>
                <th>Fecha</th>
                <th>Nota</th>
                <th>Ver</th>
                </tr>
            </thead>
            <tbody>
                @foreach($muestras as $m)
                <tr>
                    <td> {{$m->muestra_id}}</td>
                    <td> {{$m->muestra_qr}}</td>
                    <td> {{$m->muestra_fecha}}</td>
                    <td> {{$m->nota->nota_nombre}}</td>
                    <td> {{link_to_route('muestras.show', 'Ver', $parameters = $m->muestra_id , $attributes = ['class'=>'btn btn-xs btn-warning'])}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>        
        <a href="{!!URL::to('/palet')!!}" class="btn btn btn-success   btn-block">  <i class="far fa-caret-square-left"></i>  Ir a palets</a>


@endsection
@section('js')
<script type="text/javascript">
    $(document).ready(function () {
       
    });
</script>
@endsection
