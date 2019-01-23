@extends('layouts.web')
@section('title', 'Reportes')
@section('content')
<ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">Home</a>
        </li>
        <li class="breadcrumb-item active">Graficos por fecha (muestra)</li>
    </ol>

    
    <div class="row">
        @foreach($productores  as $p)
        <div class="col-lg-4">
                <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-chart-pie"></i>
                    {{$p->productor_nombre}}
                    

                   
                </div>
                <div class="card-body">
                    <canvas id="chart{{$p->productor_id}}" width="100%" height="100"></canvas>
                </div>
                <div class="card-footer small text-muted">{{$fecha_seleccionada}}</div>
                </div>
        </div>
        @endforeach

        <a href="{!!URL::to('/graficos')!!}" class="btn btn btn-success   btn-block"> Finalizar <i class="far fa-save"></i> </a>
        
    </div>
   

@endsection
@section('js')
<script type="text/JavaScript" >
    $(function() {
    @foreach($productores  as $p)
      var ctxP = document.getElementById("chart{{$p->productor_id}}").getContext('2d');
      var myPieChart = new Chart(ctxP, {
        type: 'pie',
        data: {
          labels: [
         @foreach($p->notas  as $n)
          "{{$n->nota_nombre}}",
         @endforeach
         ],
          datasets: [{
            data: [
            @foreach($p->notas  as $n)
                {{$n->total}},
            @endforeach    

            ],
            backgroundColor: [
                @foreach($p->notas  as $n)
                "{{$n->color}}",
                @endforeach  
            ],
            hoverBackgroundColor: [
                @foreach($p->notas  as $n)
                "{{$n->color_bg}}",
                @endforeach      
            ]
          }]
        },
        options: {
          responsive: true
        }
      });
    @endforeach

    });
    </script>

@endsection