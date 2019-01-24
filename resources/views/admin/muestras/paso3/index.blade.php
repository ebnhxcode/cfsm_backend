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
        <li class="breadcrumb-item active">Defectos</li>
    </ol>
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
                    <table class="table table-striped  table-hover">
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
    </div>
    
    <div class="row">
        <div class="col">
                {{link_to_route('muestras.edit', 'Editar muestra ', $parameters = $muestra->muestra_id , $attributes = ['class'=>'btn btn-warning btn-success btn-block '])}} 
        </div>
        <div class="col">
                <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#exampleModal">
                        Agregar defecto <i class="far fa-plus-square"></i>
                </button>
        </div>
        <div class="col">
            <a href="{!!URL::to('/muestra-4/'.$muestra->muestra_id.'')!!}" class="btn btn-primary  btn-success btn-block">Siguiente y Guardar <i class="far fa-caret-square-right"></i></a>
        </div>
        
        <br>
        <br>
    </div>
    <div class="row">
        <div class="col">

                
            @if (count($muestras_defecto) > 0)
            <table class="table table-striped  table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>Defecto </th>
                            <th>Concepto </th>
                            <th>Valor </th>
                            <th>Suma </th>
                            <th>-</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($muestras_defecto as $md)
                            <tr>
                                <td> {{ $md->defecto->defecto_nombre }} </td>
                                <td> {{ $md->defecto->concepto->concepto_nombre }} </td>
                                <td> {{ $md->muestra_defecto_valor }}  </td>
                                <td> {{ $md->muestra_defecto_calculo }}  </td>
                                <td>
                                    {!! Form::model($md, array('route' => array('muestras_defectos.destroy', $md->muestra_defecto_id), 'method'=>'DELETE', 'class' => 'form-horizontal editar', 'role'=>'form')) !!}
                                        <button type="submit" class="btn">
                                                <i class="far fa-trash-alt"></i>
                                                
                                        </button>
                                    {!! Form::close() !!}

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
            </table>
            @endif
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Defecto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                        <form method="POST" action="{!!URL::to('/paso3')!!}"  accept-charset="UTF-8" role="form" name="modalform" id="modalform" >
                        {!! Form::hidden('muestra_id',isset($muestra->muestra_id) ? $muestra->muestra_id : '', ['class' => 'form-control','type'=>'hidden']) !!}

                        {!! Form::token() !!}
                        
                        <div class="form-group">
                                {!! Form::label('grupo_id', 'Grupo', array('class' => '')) !!}
                                <select  class="form-control" name="grupo_id" id="grupo_id">
                                        <option value="" > -- </option>
                                        @foreach ($grupos as $g)
                                            <option value="{{$g->grupo_id}}"   > {{$g->grupo_nombre}}</option>
                                        @endforeach
                                </select>
                        </div>
                        <div class="form-group">
                                {!! Form::label('defecto_id', 'Defecto', array('class' => '')) !!}
                                <select  class="form-control" name="defecto_id" id="defecto_id">
                                        <option value="" > -- </option>
                                </select>

                        </div>
                        <div class="form-group" id="defectos">
                                {!! Form::label('muestra_defecto_valor', 'Valor Defecto', array('class' => '')) !!}
                                {!! Form::text('muestra_defecto_valor','', ['class' => 'form-control','id'=>'muestra_defecto_valor']) !!}
                        </div>
                        <div class="alert alert-warning" role="alert" id="showresult">
                                &nbsp;
                         </div>

                        <button type="button" class="btn btn-primary btn-block" id="register"> Registrar <i class="far fa-save"></i></button>
                    </form>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <!--<button type="button" class="btn btn-primary">Registrar</button> -->
                </div>
            </div>
            </div>
        </div>
    @endsection
    @section('js')
    <script type="text/javascript">
        $(document).ready(function () {


        $( "#register" ).click(function() {
                event.preventDefault();
                var values = $('#modalform').serialize();
                $.ajax({
                    url: "{!!URL::to('/paso3')!!}",
                    type: "post",
                    data: values ,
                    success: function (response) {
                    // you will get response from your php page (what you echo or print)
                            //LLEGA AL 3 PASO DONDE SE GUARDAN LOS DEFECTOS 1 A 1 alert("ok");
                           $("#showresult").html(response);
                           location.reload();
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                        alert(errorThrown);
                    }
                });


            });


            $( "#muestra_defecto_valor" ).keyup(function() {
                event.preventDefault();
                var values = $('#modalform').serialize();
                $.ajax({
                    url: "{!!URL::to('/getDefectoNota')!!}",
                    type: "post",
                    data: values ,
                    success: function (response) {
                    // you will get response from your php page (what you echo or print)
                            //LLEGA AL 3 PASO DONDE SE GUARDAN LOS DEFECTOS 1 A 1 alert("ok");
                            //$("#shownota").html(response);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                        alert(textStatus);
                    }
                });


            });


            /*alert("aca estas");*/
            $( "#grupo_id" ).change(function() {
                var route = "{!!URL::to('/getDefectosByGrupo')!!}";
                var grupo_id = $("#grupo_id" ).val();
                var select = $("#defecto_id");
                var token = $("input[name=_token]").val();
                $("#defecto_id option").remove();
                $.post( route, { grupo_id: grupo_id , _token : token })
                .done(function( data ) {
                    $(data).each(function( index, value ) {
                            select.append("<option value='"+value.id+"'> "+value.nombre+"</option>");
                            /*console.log( value.id + value.nombre );*/
                    });
                });
            });
        });
    </script>
    @endsection
