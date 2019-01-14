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
                      <h5 class="card-title">A</h5>
                    </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4">
            <div class="card text-black bg-light mb-3" style="max-width: 18rem;">
                    <div class="card-header">Condición</div>
                    <div class="card-body">
                      <h5 class="card-title">A</h5>
                    </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Agregar Defecto
                </button>
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
                            {!! Form::token() !!}
                            <div class="form-group">
                                    {!! Form::label('muestra_defecto_valor', 'Valor Defecto', array('class' => '')) !!}
                                    {!! Form::text('muestra_defecto_valor','', ['class' => 'form-control','id'=>'muestra_defecto_valor']) !!}
                            </div>
                            <div class="form-group">
                                    {!! Form::label('concepto_id', 'Concepto', array('class' => '')) !!}
                                    <select  class="form-control" name="concepto_id" id="concepto_id">
                                            <option value="" > -- </option>
                                            @foreach ($conceptos as $c)
                                                <option value="{{$c->concepto_id}}"   > {{$c->concepto_nombre}}</option>
                                            @endforeach
                                    </select>

                            </div>
                            <div class="form-group">
                                    {!! Form::label('defecto_id', 'Defecto', array('class' => '')) !!}
                                    <select  class="form-control" name="defecto_id" id="defecto_id">
                                            <option value="" > -- </option>
                                    </select>

                            </div>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary">Registrar</button>
                    </div>
                </div>
                </div>
            </div>
        </div>
    @endsection
    @section('js')
    <script type="text/javascript">
        $(document).ready(function () {
            /*alert("aca estas");*/
            $( "#concepto_id" ).change(function() {
                var route = "{!!URL::to('/getDefectosByConcepto')!!}";
                var concepto_id = $("#concepto_id" ).val();
                var select = $("#defecto_id");
                var token = $("input[name=_token]").val();
                $("#defecto_id option").remove();
                $.post( route, { concepto_id: concepto_id , _token : token })
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
