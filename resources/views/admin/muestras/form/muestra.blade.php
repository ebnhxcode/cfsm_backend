<div class="row">
    <div class="col-lg-6" >
            {!! Form::hidden('muestra_id',isset($muestra->muestra_id) ? $muestra->muestra_id : '', ['class' => 'form-control','type'=>'hidden']) !!}

            <div class="form-group">
                    {!! Form::label('muestra_qr', 'QR', array('class' => '')) !!}
                    {!! Form::text('muestra_qr',isset($muestra->muestra_qr) ? $muestra->muestra_qr : '', ['class' => 'form-control','id'=>'muestra_qr']) !!}
            </div>
            <div class="form-group">
                    <label class="control-label">Fecha (Desde)</label>
                    <div class="input-group date" id="dt1">
                        <input id="muestra_fecha" value=@if(isset($muestra->muestra_fecha))  {{$muestra->muestra_fecha}} @else ""  @endif name="muestra_fecha" class="form-control datepicker" type="text" readonly>
                    </div>
            </div>
            <div class="form-group">
                {!! Form::label('region_id', 'Region', array('class' => '')) !!}
                <select class='form-control' id='region_id' name='region_id'>
                    <option value=""> Seleccione una región </option>
                    @foreach ($regiones as $r)
                        <option value="{{$r->region_id}}" @isset($muestra->region_id) {{ $muestra->region_id == $r->region_id ? 'selected' : '' }} @endisset > {{$r->region_nombre}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                {!! Form::label('productor_id', 'Productor', array('class' => '')) !!}
                <select class='form-control' id='productor_id' name='productor_id'>
                        @foreach ($productores as $p)
                            <option value="{{$p->productor_id}}" @isset($muestra->region_id)  {{ $muestra->productor_id == $p->productor_id ? 'selected' : '' }} @endisset > {{$p->productor_nombre}}  </option> 
                        @endforeach
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
                    {!! Form::label('muestra_brix', 'Brix Promedio', array('class' => '')) !!}
                    {!! Form::text('muestra_brix',isset($muestra->muestra_brix) ? $muestra->muestra_brix : '', ['class' => 'form-control','id'=>'muestra_brix']) !!}
            </div>
    </div>
    <div class="col-lg-6" >
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
            <div class="form-group alert alert-success">
                    {!! Form::label('muestra_peso', 'Peso', array('class' => '')) !!}
                    {!! Form::text('muestra_peso',isset($muestra->muestra_peso) ? $muestra->muestra_peso : '', ['class' => 'form-control','id'=>'muestra_peso']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('apariencia_id', 'Apariencia', array('class' => '')) !!}
                {!! Form::select('apariencia_id', $apariencias, isset($muestra->apariencia_id) ? $muestra->apariencia_id : '' , array('class' => 'form-control' , 'id'=>'apariencia_id')) !!}
            </div>
            <div class="form-group">
                {!! Form::label('muestra_bolsas', 'Número de Bolsas', array('class' => '')) !!}
                {!! Form::text('muestra_bolsas',isset($muestra->muestra_bolsas) ? $muestra->muestra_bolsas : '', ['class' => 'form-control','id'=>'muestra_bolsas']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('muestra_racimos', 'Número de Racimos', array('class' => '')) !!}
                {!! Form::text('muestra_racimos',isset($muestra->muestra_racimos) ? $muestra->muestra_racimos : '', ['class' => 'form-control','id'=>'muestra_racimos']) !!}
            </div>
            @if(!isset($muestra_desgrane))
            <div class="form-group">
                    {!! Form::label('muestra_desgrane', 'Desgrane', array('class' => '')) !!}
                    {!! Form::text('muestra_desgrane',isset($muestra_desgrane) ? $muestra_desgrane : '', ['class' => 'form-control','id'=>'muestra_desgrane']) !!}
            </div>
            @endif

    </div>
</div>


