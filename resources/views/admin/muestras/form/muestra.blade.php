
{!! Form::hidden('etiqueta_id',isset($muestra->muestra_id) ? $muestra->muestra_id : '', ['class' => 'form-control','type'=>'hidden']) !!}

<div class="form-group">
    {!! Form::label('region_id', 'Region', array('class' => '')) !!}
    {!! Form::select('region_id', $regiones, isset($muestra->region_id) ? $muestra->region_id : '' , array('class' => 'form-control' , 'id'=>'region_id')) !!}
</div>
<div class="form-group">
    {!! Form::label('productor_id', 'Productor', array('class' => '')) !!}
    <select class='form-control' id='productor_id' name='productor_id'>
        <option value=''> -- <option>
    </select>
</div>
<div class="form-group">
    {!! Form::label('especie_id', 'Especie', array('class' => '')) !!}
    {!! Form::select('especie_id', $especies, isset($muestra->especie_id) ? $muestra->especie_id : '' , array('class' => 'form-control' , 'id'=>'especie_id')) !!}
</div>

<div class="form-group">
    {!! Form::label('variedad_id', 'Variedad', array('class' => '')) !!}
    {!! Form::select('variedad_id', $variedades, isset($muestra->variedad_id) ? $muestra->variedad_id : '' , array('class' => 'form-control' , 'id'=>'variedad_id')) !!}
</div>

<div class="form-group">
        {!! Form::label('calibre_id', 'Calibre', array('class' => '')) !!}
        {!! Form::select('calibre_id', $calibres, isset($muestra->calibre_id) ? $muestra->calibre_id : '' , array('class' => 'form-control' , 'id'=>'calibre_id')) !!}
</div>

<div class="form-group">
        {!! Form::label('categoria_id', 'Categoria', array('class' => '')) !!}
        {!! Form::select('categoria_id', $categorias, isset($muestra->categoria_id) ? $muestra->categoria_id : '' , array('class' => 'form-control' , 'id'=>'categoria_id')) !!}
</div>
<div class="form-group">
        {!! Form::label('embalaje_id', 'Embalaje', array('class' => '')) !!}
        {!! Form::select('embalaje_id', $embalajes, isset($muestra->embalaje_id) ? $muestra->embalaje_id : '' , array('class' => 'form-control' , 'id'=>'embalaje_id')) !!}
</div>
<div class="form-group">
        {!! Form::label('etiqueta_id', 'Etiqueta', array('class' => '')) !!}
        {!! Form::select('etiqueta_id', $etiquetas, isset($muestra->etiqueta_id) ? $muestra->etiqueta_id : '' , array('class' => 'form-control' , 'id'=>'etiqueta_id')) !!}
</div>

<div class="form-group">
    {!! Form::label('muestra_peso', 'Peso Muestra', array('class' => '')) !!}
    {!! Form::text('muestra_peso',isset($muestra->muestra->peso) ? $muestra->muestra->peso : '', ['class' => 'form-control','id'=>'muestra_peso']) !!}
</div>



