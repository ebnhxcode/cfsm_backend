@extends('layouts.web')
@section('title', 'Muestras')
@section('content')

    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">Home</a>
        </li>
        <li class="breadcrumb-item">
                <a href="#">Muestra</a>
        </li>
        <li class="breadcrumb-item active">{{$muestra->muestra_id}}</li>
    </ol>

    <div class="row">
    <div class="col">
            <table class="table table-striped table-hover">
                <tbody>
                <tr> 
                        <td> QR:</td>
                        <td> {{$muestra->muestra_qr}}</td>
                </tr> 
                <tr> 
                        <td>Fecha:</td>
                        <td>{{  date('d-m-Y', strtotime($muestra->muestra_fecha))}} </td>
                </tr>  
                <tr> 
                        <td>Region:</td>
                        <td>{{  $muestra->region->region_nombre }} </td>
                </tr>  
                <tr class="table-success"> 
                        <td>Productor:</td>
                        <td>{{$muestra->productor->productor_nombre}} </td>
                </tr>  
                <tr> 
                        <td>Especie:</td>
                        <td>{{$muestra->especie->especie_nombre}} </td>
                </tr>
                <tr class="table-success"> 
                        <td>Variedad:</td>
                        <td>{{$muestra->variedad->variedad_nombre}} </td>
                </tr>  
                <tr> 
                        <td>Calibre: </td>
                        <td>{{$muestra->calibre->calibre_nombre}}</td>
                </tr>
                <tr> 
                        <td>Categoria:</td>
                        <td>{{$muestra->categoria->categoria_nombre}} </td>
                </tr>  
                <tr> 
                        <td>Embalaje:</td>
                        <td>{{$muestra->embalaje->embalaje_nombre}} </td>
                </tr> 
                <tr> 
                        <td>Etiqueta:</td>
                        <td>{{ $muestra->etiqueta->etiqueta_nombre}} </td>
                </tr> 
                <tr class="table-success"> 
                    <td>Apariencia:</td>
                    <td>{{$muestra->apariencia->apariencia_nombre}} </td>
                </tr> 
                <tr class="table-success"> 
                        <td>Peso:</td>
                        <td>{{$muestra->muestra_peso}} </td>
                </tr> 
                <tr class="table-success"> 
                    <td>Número de bolsas:</td>
                    <td>{{$muestra->muestra_bolsas}} </td>
                </tr> 
                <tr class="table-success"> 
                    <td>Número de racimos:</td>
                    <td>{{$muestra->muestra_racimos}} </td>
                 </tr> 
                </tbody>
            </table>
        </div>
    </div>
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
                    <table class="table table-striped  table-hover table-responsive ">
                        <thead class="thead-dark">
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
            <div class="col">
                @if (count($muestras_defecto) > 0)
                <table class="table table-striped  table-hover table-responsive col-sm-12">
                        <thead class="thead-dark">
                            <tr>
                                <th>Defecto </th>
                                <th>Concepto </th>
                                <th>Valor </th>
                                <th>Suma </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($muestras_defecto as $md)
                                <tr>
                                    <td> {{ $md->defecto->defecto_nombre }} </td>
                                    <td> {{ $md->defecto->concepto->concepto_nombre }} </td>
                                    <td> {{ $md->muestra_defecto_valor }}  </td>
                                    <td> {{ $md->muestra_defecto_calculo }}  </td>
                                </tr>
                            @endforeach
                        </tbody>
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
                        <a href="{!!URL::to('/reportes')!!}" class="btn btn btn-success   btn-block"> Volver <i class="far fa-save"></i> </a>
                </div>
        </div>
    @endsection
    @section('js')
    <script type="text/javascript">
        $(document).ready(function () {

        });
    </script>
    @endsection
