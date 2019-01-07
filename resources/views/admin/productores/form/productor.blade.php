<div class="row">
    
    {!! Form::hidden('productor_id',isset($productor->productor_id) ? $productor->productor_id : '', ['class' => 'form-control','type'=>'hidden']) !!}
    <div class="col-lg-6 ">
            {!! Form::label('productor_nombre', 'NOMBRE', array('class' => 'col-lg-3')) !!}
            <div class="col-lg-9">
               {!! Form::text('productor_nombre',isset($productor->productor_nombre) ? $productor->productor_nombre : '', ['class' => 'form-control']) !!}
            </div>
    </div>
    <div class="col-lg-6">
         {!! Form::label('region_id', 'Región', array('class' => 'col-lg-3')) !!}
         <div class="col-lg-9">
            {!! Form::select('region_id', $regiones, isset($productor->region_id) ? $productor->region_id : '' , array('class' => 'form-control col-lg-6' , 'id'=>'region_id')) !!}
         </div>
    </div>
   
</div>
    

 