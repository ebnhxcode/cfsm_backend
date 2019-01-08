
    {!! Form::hidden('variedad_id',isset($variedad->variedad_id) ? $variedad->variedad_id : '', ['class' => 'form-control','type'=>'hidden']) !!}
    <div class="form-group">
            {!! Form::label('variedad_nombre', 'Variedad', array('class' => '')) !!}
            {!! Form::text('variedad_nombre',isset($variedad->variedad_nombre) ? $variedad->variedad_nombre : '', ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
         {!! Form::label('especie_id', 'Especie', array('class' => '')) !!}
         {!! Form::select('especie_id', $especies, isset($especie->especie_id) ? $especie->especie_id : '' , array('class' => 'form-control' , 'id'=>'especie_id')) !!}
    </div>
    

 