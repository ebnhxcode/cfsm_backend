<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Productor;
use Carbon\Carbon;
use DB;
class GraficoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $productores = Productor::orderBy('productor_nombre')->get();
        return view('graficos.productores',compact('productores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function vergraficos(Request $request){

        $rules = [
            'productor' => 'required',
            'fecha' => 'required',
        ];

        $messages = [
            'productor.required' => 'Debe seleccionar un productor.',
            'fecha.required' => 'Debe seleccionar una fecha.',
        ];

        $this->validate($request, $rules, $messages);

        $productores_array = $request->productor;
        $fecha_seleccionada = $request->fecha;
        $fecha = Carbon::parse($request->fecha)->toDateTimeString();
       
        $arrayProductores = array();


        foreach ($productores_array as $p) {
            //echo $p;
            $statement ="SELECT COUNT(*) as total
            , n.`nota_id`
            , n.`nota_nombre`
            , n.`color`
            , n.`color_bg`
            , round((COUNT(*) / (SELECT COUNT(*) FROM muestra
WHERE productor_id = $p and CAST(muestra_fecha as  DATE) = CAST('$fecha' as  DATE) ) )*100,1) AS porcentaje
            FROM muestra m
            LEFT JOIN nota n ON n.`nota_id` = m.`nota_id`
            WHERE m.productor_id = $p
            and CAST(m.muestra_fecha as  DATE) = CAST('$fecha' as  DATE)
            GROUP BY  n.nota_id
            , n.`nota_nombre`
            , n.`color`
            , n.`color_bg`";
            $notas_productor = DB::select(DB::raw($statement));
            if( count($notas_productor) > 0 ){
                #AGREGAR LOS PRODUCTORES QUE SI TIENEN NOTAS EN EL MOMENTO
                array_push($arrayProductores, $p);
            }
        }
        $productores =  Productor::whereIn('productor_id',$arrayProductores)->get();
        foreach($productores as $p){
            $statement ="SELECT COUNT(*) as total
            , n.`nota_id`
            , n.`nota_nombre`
            , n.`color`
            , n.`color_bg`
             , round((COUNT(*) / (SELECT COUNT(*) FROM muestra
WHERE productor_id = $p->productor_id and CAST(muestra_fecha as  DATE) = CAST('$fecha' as  DATE) ) )*100,1) AS porcentaje
            FROM muestra m
            LEFT JOIN nota n ON n.`nota_id` = m.`nota_id`
            WHERE m.productor_id = $p->productor_id
            and CAST(m.muestra_fecha as  DATE) = CAST('$fecha' as  DATE)
            GROUP BY  n.nota_id
            , n.`nota_nombre`
            , n.`color`
            , n.`color_bg`";
            $notas_productor = DB::select(DB::raw($statement));
            $p->notas =  $notas_productor;
        }
        return view('graficos.tiemporeal',compact('fecha_seleccionada','productores'));
    }



    public function graficoconsolidado()
    {
        //
        $productores = Productor::orderBy('productor_nombre')->get();
        return view('graficos.consolidado',compact('productores'));
    }



    public function vergraficosconsolidado(Request $request){

        $rules = [
            'productor' => 'required',
        ];

        $messages = [
            'productor.required' => 'Debe seleccionar un productor.',
        ];

        $this->validate($request, $rules, $messages);

        $productores_array = $request->productor;
       
        $arrayProductores = array();


        foreach ($productores_array as $p) {
            //echo $p;
            $statement ="SELECT COUNT(*) as total
            , n.`nota_id`
            , n.`nota_nombre`
            , n.`color`
            , n.`color_bg`
            , round((COUNT(*) / (SELECT COUNT(*) FROM muestra
WHERE productor_id = $p) )*100,1) AS porcentaje
            FROM muestra m
            LEFT JOIN nota n ON n.`nota_id` = m.`nota_id`
            WHERE m.productor_id = $p
            GROUP BY  n.nota_id
            , n.`nota_nombre`
            , n.`color`
            , n.`color_bg`";
            $notas_productor = DB::select(DB::raw($statement));
            if( count($notas_productor) > 0 ){
                #AGREGAR LOS PRODUCTORES QUE SI TIENEN NOTAS EN EL MOMENTO
                array_push($arrayProductores, $p);
            }
        }
        $productores =  Productor::whereIn('productor_id',$arrayProductores)->get();
        foreach($productores as $p){
            $statement ="SELECT COUNT(*) as total
            , n.`nota_id`
            , n.`nota_nombre`
            , n.`color`
            , n.`color_bg`
            , round((COUNT(*) / (SELECT COUNT(*) FROM muestra
WHERE productor_id = $p->productor_id) )*100,1) AS porcentaje
            FROM muestra m
            LEFT JOIN nota n ON n.`nota_id` = m.`nota_id`
            WHERE m.productor_id = $p->productor_id
            GROUP BY  n.nota_id
            , n.`nota_nombre`
            , n.`color`
            , n.`color_bg`";
            $notas_productor = DB::select(DB::raw($statement));
            $p->notas =  $notas_productor;
            $fecha_seleccionada = '2019';
        }
        return view('graficos.reporteconsolidado',compact('fecha_seleccionada','productores'));
    }
}
