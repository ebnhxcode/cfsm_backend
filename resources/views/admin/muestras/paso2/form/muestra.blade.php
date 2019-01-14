{!! Form::hidden('muestra_id',isset($muestra->muestra_id) ? $muestra->muestra_id : '', ['class' => 'form-control','type'=>'hidden']) !!}
<div class="row">

        <div class="col-lg-6" >
                <div class="form-group">
                        {!! Form::label('muestra_peso', 'Peso Muestra (Gramos)', array('class' => '')) !!}
                        {!! Form::text('muestra_peso',isset($muestra->muestra_peso) ? $muestra->muestra_peso : '', ['class' => 'form-control','id'=>'muestra_peso']) !!}
                </div>
                <div class="form-group">
                        {!! Form::label('muestra_desgrane', 'Desgrane Muestra (Gramos)', array('class' => '')) !!}
                        {!! Form::text('muestra_desgrane',isset($muestra->muestra_desgrane) ? $muestra->muestra_desgrane : '', ['class' => 'form-control','id'=>'muestra_desgrane']) !!}
                </div>
                <div class="form-group">
                        {!! Form::label('apariencia_id', 'Apariencia Muestra', array('class' => '')) !!}
                        {!! Form::select('apariencia_id', $apariencias, isset($muestra->apariencia_id) ? $muestra->region_id : '' , array('class' => 'form-control' , 'id'=>'apariencia_id')) !!}
                </div>
                <div class="form-group">
                        {!! Form::label('muestra_bolsas', 'Bolsas Muestra', array('class' => '')) !!}
                        {!! Form::text('muestra_bolsas',isset($muestra->muestra_bolsas) ? $muestra->muestra_bolsas : '', ['class' => 'form-control','id'=>'muestra_bolsas']) !!}
                </div>
                <div class="form-group">
                        {!! Form::label('muestra_racimos', 'Racimos Muestra', array('class' => '')) !!}
                        {!! Form::text('muestra_racimos',isset($muestra->muestra_racimos) ? $muestra->muestra_racimos : '', ['class' => 'form-control','id'=>'muestra_racimos']) !!}
                </div>
                <div class="form-group">
                        {!! Form::label('muestra_brix', 'Brix Muestra', array('class' => '')) !!}
                        {!! Form::text('muestra_brix',isset($muestra->muestra_brix) ? $muestra->muestra_brix : '', ['class' => 'form-control','id'=>'muestra_racimos']) !!}
                </div>
                <div class="form-group">
                        {!! Form::label('muestra_cajas', 'Cajas Muestra', array('class' => '')) !!}
                        {!! Form::text('muestra_cajas',isset($muestra->muestra_cajas) ? $muestra->muestra_cajas : '', ['class' => 'form-control','id'=>'muestra_cajas']) !!}
                </div>
        </div>
        <div class="col-lg-6" >

        </div>
</div>

