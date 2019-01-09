
    {!! Form::hidden('tolerancia_id',isset($tolerancia->tolerancia_id) ? $tolerancia->tolerancia_id : '', ['class' => 'form-control','type'=>'hidden']) !!}
    <div class="form-group">
            {!! Form::label('tolerancia_desde', 'Tolerancia Desde ', array('class' => '')) !!}
            {!! Form::text('tolerancia_desde',isset($tolerancia->tolerancia_desde) ? $tolerancia->tolerancia_desde : '', ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('tolerancia_hasta', 'Tolerancia Hasta ', array('class' => '')) !!}
        {!! Form::text('tolerancia_hasta',isset($tolerancia->tolerancia_hasta) ? $tolerancia->tolerancia_hasta : '', ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
         {!! Form::label('categoria_id', 'Categoría', array('class' => '')) !!}
         {!! Form::select('categoria_id', $categorias, isset($tolerancia->categoria_id) ? $tolerancia->categoria_id : '' , array('class' => 'form-control' , 'id'=>'especie_id')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('nota_id', 'Nota', array('class' => '')) !!}
        {!! Form::select('nota_id', $notas, isset($tolerancia->nota_id) ? $tolerancia->nota_id : '' , array('class' => 'form-control' , 'id'=>'especie_id')) !!}
   </div>

    <div class="form-group">
         {!! Form::label('defecto_id', 'Defecto', array('class' => '')) !!}
         {!! Form::select('defecto_id', $defectos, isset($tolerancia->defecto_id) ? $tolerancia->defecto_id: '' , array('class' => 'form-control' , 'id'=>'especie_id')) !!}
    </div>
