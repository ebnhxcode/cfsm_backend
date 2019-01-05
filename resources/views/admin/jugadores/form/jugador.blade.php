<div class="row">
    
    {!! Form::hidden('JGD_ID',isset($jugador->JGD_ID) ? $jugador->JGD_ID : '', ['class' => 'form-control','type'=>'hidden']) !!}
    <div class="col-lg-6 ">
            {!! Form::label('JGD_NOMBRE', 'NOMBRE', array('class' => 'col-lg-3')) !!}
            <div class="col-lg-9">
               {!! Form::text('JGD_NOMBRE',isset($jugador->JGD_NOMBRE) ? $jugador->JGD_NOMBRE : '', ['class' => 'form-control']) !!}
            </div>
    </div>
    <div class="col-lg-6">
         {!! Form::label('JGD_DCI', 'DCI', array('class' => 'col-lg-3')) !!}
         <div class="col-lg-9">
         {!! Form::text('JGD_DCI',isset($jugador->JGD_DCI) ? $jugador->JGD_DCI : '', ['class' => 'form-control']) !!}
         </div>
    </div>
    <!-- <div class="input-group date" data-provide="datepicker">
        <input type="text" class="form-control">
        <div class="input-group-addon">
            <span class="glyphicon glyphicon-th"></span>
        </div>
    </div>
    -->
</div>
    

 