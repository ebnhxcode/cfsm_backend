@extends('layouts.web')
@section('title', 'Muestra')
@section('content')

@include('layouts.error')

<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="#">Home</a>
    </li>
    <li class="breadcrumb-item">
            <a href="#">Muestra</a>
    </li>
    <li class="breadcrumb-item active">Imágenes y Codigo de pallet</li>
</ol>


@if (session('message'))
    <div class="alert alert-success">
        <strong>{{ session('message') }} </strong>
    </div>
@endif

<div class="row ">
        <div class="col-lg-4 col-md-4 col-sm-4">
            <div class="card text-black bg-light mb-3" style="max-width: 18rem;">
                    <div class="card-header">Final</div>
                    <div class="card-body">
                    <h5 class="card-title">{{$nota->nota_nombre}}</h5>
                    </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4">
            <div class="card text-black bg-light mb-3" style="max-width: 18rem;">
                    <div class="card-header">Calidad</div>
                    <div class="card-body">
                      <h5 class="card-title">{{$nota_calidad_nombre}}</h5>
                    </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4">
            <div class="card text-black bg-light mb-3" style="max-width: 18rem;">
                    <div class="card-header">Condición</div>
                    <div class="card-body">
                      <h5 class="card-title">{{ $nota_condicion_nombre }}</h5>
                    </div>
            </div>
        </div>

    </div>
    <div class="row">
            <div class="col">

                    @if (count($grupos_totales) > 0)
                    <table class="table table-striped  table-hover ">
                        <thead class="thead-dark" >
                            <tr>
                                <th> Grupo</th>
                                <th> Concepto</th>
                                <th> Acumulado </th>
                            </tr>
                        </thead>
                        </tbody>
                            @foreach ($grupos_totales as $g)
                            <tr>
                                <td> {{$g->grupo_nombre}}</td>
                                <td>  {{$g->concepto_nombre}}</td>
                                <td> {{$g->total_grupo}}  @if ( $g->concepto_id == 1) % @endif  </td>
                            </tr>
                            @endforeach
                        <tbody>
                    </table>
                    @endif
            </div>
    </div>

    <div class="row">
            <div class="col">

                    @if (count($muestra_imagenes) > 0)
                    <table class="table table-striped  table-hover ">
                        <thead class="thead-dark" >
                            <tr>
                                <th> Id</th>
                                <th> Comentario </th>
                                <th> Ver </th>
                            </tr>
                        </thead>
                        </tbody>
                            @foreach ($muestra_imagenes as $g)
                            <tr>
                                <td> {{$g->muestra_imagen_id}}</td>
                                <td>  {{$g->muestra_imagen_texto}}</td>
                                <td> <a href="{!!URL::to("$g->muestra_imagen_ruta_corta")!!}" target="_blank" > Ver </a>  </td>
                            </tr>
                            @endforeach
                        <tbody>
                    </table>
                    @endif
            </div>
    </div>
    <div class="row">
            <div class="col">
                    <a href="{!!URL::to('/muestra-3/'.$muestra->muestra_id.'')!!}" class="btn btn btn-warning   btn-block"> <i class="far fa-caret-square-left"></i> Volver</a>
            </div>
            <div class="col">
                    <a href="{!!URL::to('/reportes')!!}" class="btn btn btn-success   btn-block"> Finalizar <i class="far fa-save"></i> </a>
            </div>

            <br>
            <br>
    </div>

    <div class="alert alert-warning border border-danger">
            <strong>Numero de pallet / serie!</strong>
            {!! Form::open(['route' => 'setMuestraSerie', 'method' => 'POST', 'class' => '','role'=>'form']) !!}
            {!! Form::hidden('muestra_id',isset($muestra->muestra_id) ? $muestra->muestra_id : '', ['class' => 'form-control','type'=>'hidden']) !!}
            <div class="form-group">
                    {!! Form::label('lote_codigo', 'Numero de pallet / serie', array('class' => '')) !!}
                    {!! Form::text('lote_codigo',isset($muestra->lote_codigo) ? $muestra->lote_codigo : '', ['class' => 'form-control','id'=>'lote_codigo']) !!}
            </div>
            <div class="form-group">
                    {!! Form::label('estado_muestra_id', 'Estado Muestra (Puede anular la medicion en caso de error)', array('class' => '')) !!}
                    {!! Form::select('estado_muestra_id', $estado_muestras, isset($muestra->estado_muestra_id) ? $muestra->estado_muestra_id : '' , array('class' => 'form-control' , 'id'=>'estado_muestra_id')) !!}
                </div>
            <button type="submit" class="btn btn-success btn-block">Guardar cambios <i class="far fa-save"></i></button>
            {!! Form::close() !!}
    </div>

    <div class="alert alert-warning border border-danger">
            <strong>Imágenes!</strong>

            {!! Form::open(['route' => 'uploadimagen', 'method' => 'POST', 'class' => '','role'=>'form','files' => true]) !!}

                    {!! Form::hidden('muestra_id',isset($muestra->muestra_id) ? $muestra->muestra_id : '', ['class' => 'form-control','type'=>'hidden']) !!}
                    <div class="form-group">
                        <textarea class="form-control" name="muestra_imagen_texto" placeholder="Ingrese sus comentarios"></textarea>
                    </div>
                    <div class="form-group">
                        <label>File input</label>
                       {{Form::file('file')}}
                    </div>
                    <button type="submit" class="btn btn-success btn-block">Subir imagen <i class="far fa-save"></i></button>


            {!! Form::close() !!}
    </div>

@endsection
@section('js')

<link rel="stylesheet" href="{{ url('vendor/datatables/buttons.bootstrap4.min.css') }}">
<link href="https://unpkg.com/gijgo@1.9.11/css/gijgo.min.css" rel="stylesheet" type="text/css" />
<script src="https://unpkg.com/gijgo@1.9.11/js/gijgo.min.js" type="text/javascript"></script>
<script src="{{ url('js/messages/messages.es-es.min.js') }}"></script>
<script src="{{ url('vendor/datatables/dataTables.buttons.min.js') }}"></script>






<script type="text/javascript">
    $(document).ready(function () {

    });
</script>
@endsection
