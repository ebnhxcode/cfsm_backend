@extends('layouts.web')
@section('title', 'Muestra')
@section('content')

@include('layouts.error')
{!! Form::open(['route' => 'muestras.store', 'method' => 'POST', 'class' => 'col-lg-6','role'=>'form']) !!}
    <h2 class="" id="">Muestra</h2>
    @include('admin.muestras.form.muestra')
    <button type="submit" class="btn btn-primary btn_ok">Enviar</button>
{!! Form::close() !!}

@endsection
@section('js')

<link rel="stylesheet" href="{{ url('vendor/datatables/buttons.bootstrap4.min.css') }}">
<link href="https://unpkg.com/gijgo@1.9.11/css/gijgo.min.css" rel="stylesheet" type="text/css" />   
<script src="https://unpkg.com/gijgo@1.9.11/js/gijgo.min.js" type="text/javascript"></script>
<script src="{{ url('js/messages/messages.es-es.min.js') }}"></script>
<script src="{{ url('vendor/datatables/dataTables.buttons.min.js') }}"></script>


<script type="text/javascript">
    $(document).ready(function () {
         var muestra_fecha = $('#muestra_fecha').datepicker({
                uiLibrary: 'bootstrap4',
                locale: 'es-es',
                format: 'dd-mm-yyyy',
                change: function (e) {
                    $(this).focus();
                }
            });


        $( "#region_id" ).change(function() {
            var route = "{!!URL::to('/getProductoresByRegionId')!!}";
            //alert(route);
            var region_id = $("#region_id" ).val();
            var select = $("#productor_id");
            var token = $("input[name=_token]").val();
            $("#productor_id option").remove();
             $.post( route, { region_id: region_id , _token : token })
             .done(function( data ) {
                 $(data).each(function( index, value ) {
                        select.append("<option value='"+value.id+"'> "+value.nombre+"</option>");
                        console.log( value.id + value.nombre );
                 });
             });

          //dalert(region_id);
         });
    });
</script>
@endsection
