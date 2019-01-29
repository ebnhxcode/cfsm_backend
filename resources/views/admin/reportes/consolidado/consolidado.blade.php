@extends('layouts.web')
@section('title', 'Consolidado')
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">Home</a>
        </li>
        <li class="breadcrumb-item active">Consolidado Muestras</li>
    </ol>



<div class="row">
        
        <div  class="col-sm-12">
                <input class="btn btn-primary btn-block" type="button" name="descargar" id="descargar" value="Obtener Consolidado" />
                {!! Form::token() !!}
        </div>
        <div class="col-sm-12 consolidado" style="display: none;"> 
            <a href="{!!URL::to('/reporte.xlsx')!!}" class="btn btn btn-success   btn-block"> Descargar <i class="far fa-save"></i> </a>
        </div>
        <div class="loader" style="display: none;"></div>
</div>



    @endsection
@section('js')
<script type="text/javascript">

    $(document).ready(function () {
        $( "#descargar" ).click(function() {
            var token = $("input[name=_token]").val();
            $.ajax({
                type:'POST',
                beforeSend: function(){
                  $('.loader').show();
                  $('.consolidado').hide();
                },
                url:"{!!URL::to('/reporteConsolidado')!!}",
                data: {
                 '_token' : token
                },
                 success:function(data){
                   alert("exito");
                   $('.consolidado').show();
                },
                complete: function(){
                  $('.loader').hide();
                  
                 // alert("aaaa");
                }
              });

        });
    
       
    
    });
    
</script>
@endsection
