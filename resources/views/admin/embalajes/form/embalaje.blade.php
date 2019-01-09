
    {!! Form::hidden('embalaje_id',isset($embalaje->embalaje_id) ? $embalaje->embalaje_id : '', ['class' => 'form-control','type'=>'hidden']) !!}
    <div class="form-group">
            {!! Form::label('embalaje_nombre', 'Embalaje', array('class' => '')) !!}
            {!! Form::text('embalaje_nombre',isset($embalaje->embalaje_nombre) ? $embalaje->embalaje_nombre : '', ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
         {!! Form::label('categoria_id', 'Categoria', array('class' => '')) !!}
         {!! Form::select('categoria_id', $categorias, isset($embalaje->categria_id) ? $embalaje->categria_id : '' , array('class' => 'form-control' , 'id'=>'especie_id')) !!}
    </div>


