
    {!! Form::hidden('etiqueta_id',isset($etiqueta->etiqueta_id) ? $etiqueta->etiqueta_id : '', ['class' => 'form-control','type'=>'hidden']) !!}
    <div class="form-group">
            {!! Form::label('etiqueta_nombre', 'Etiqueta', array('class' => '')) !!}
            {!! Form::text('etiqueta_nombre',isset($etiqueta->etiqueta_nombre) ? $etiqueta->etiqueta_nombre : '', ['class' => 'form-control']) !!}
    </div>



