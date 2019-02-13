<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Muestra;
use App\Productor;
use App\Region;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Carbon\Carbon;

class PaletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.palets.index');
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

    public function paletsDatatables(){
        $sql = "SELECT SUM(m.nota_id)/COUNT(*) AS promedio
        , FLOOR(SUM(m.nota_id)/COUNT(*)) AS promedio_floor
        , SUM(m.nota_id) AS suma
        , COUNT(*) AS COUNT
        , m.lote_codigo AS numero_pallet
        , m.categoria_id
        , c.categoria_nombre
        , CAST(MAX(m.`muestra_fecha`) as DATE) AS muestra_fecha
        , `nota_final`(CEILING(SUM(m.nota_id)/COUNT(*)),m.categoria_id) AS nota_nombre
        FROM muestra m
        INNER JOIN categoria c ON c.categoria_id = m.categoria_id
        WHERE  m.lote_codigo IS NOT NULL
        GROUP BY m.lote_codigo , m.categoria_id
        , c.categoria_nombre
        ";
        $result = DB::select(DB::raw($sql));
        return Datatables::of($result) ->addColumn('action', function ($palet) {
            return '
                <a href="'.route('verMuestras',$palet->numero_pallet).'" class="btn btn-xs btn-warning"> Ver </a>
                ';
        })->make(true);
    }

    public function palletproductor()
    {
        $regiones = Region::orderBy('region_nombre')->get();
        return view('admin.palets.productor',compact('regiones'));
    }
    public function generaExelPallet(Request $request){
        $rules = [
            'region_id' => 'required',
            'productor_id' => 'required',
        ];

        $messages = [

            'region_id.required' => 'Región es obligatorio.',
            'productor_id.required' => 'Productor es obligatorio.',
        ];

        $this->validate($request, $rules, $messages);

        /* DATOS VISTA */
        $productor_id = $request->productor_id;
        //DATOS DEL PRODUCTOS
        $productor = Productor::find($productor_id);
        set_time_limit(0);
        $fecha = Carbon::parse($request->fecha)->toDateTimeString();

        $muestra = new Muestra();

        $pallets_agrupados = $muestra->select(
                        "muestra.lote_codigo",
                        "muestra.muestra_id",
                        "muestra.muestra_qr",
                        "nota.nota_nombre",
                        "variedad.variedad_nombre",
                        "embalaje.embalaje_nombre",
                        "categoria.categoria_nombre",
                        "apariencia.apariencia_nombre",
                        DB::raw("
                        IFNULL((
                            SELECT MAX(md.muestra_defecto_valor) maximo
                            FROM muestra_defecto md
                            INNER JOIN defecto def on md.defecto_id = def.defecto_id
                            WHERE muestra.muestra_id = md.muestra_id
                            AND def.defecto_nombre not regexp 'desgrane'
                            ORDER BY maximo desc limit 1
                            ),(
                            SELECT MAX(md.muestra_defecto_valor) maximo
                            FROM muestra_defecto md
                            INNER JOIN defecto def on md.defecto_id = def.defecto_id
                            WHERE muestra.muestra_id = md.muestra_id
                            AND def.defecto_nombre regexp 'desgrane'
                            ORDER BY maximo desc limit 1
                            ))
                            valor_maximo"),
                        DB::raw("
                            IFNULL(
                                (
                                SELECT d.defecto_nombre
                                FROM muestra_defecto md
                                INNER JOIN defecto d on md.defecto_id = d.defecto_id
                                WHERE muestra.muestra_id = md.muestra_id
                                AND md.muestra_defecto_valor = valor_maximo
                                order by valor_maximo desc limit 1
                                ),(
                                SELECT 'Sin Defecto'
                                )
                            ) defecto
                        ")
                    )
                    ->from('AA.muestra')
                    ->join('AA.embalaje' , function ($embalaje) {
                        $embalaje->on('muestra.embalaje_id', '=', 'embalaje.embalaje_id');
                    })
                    ->join('AA.apariencia' , function ($apariencia) {
                        $apariencia->on('muestra.apariencia_id', '=', 'apariencia.apariencia_id');
                    })
                    ->join('AA.categoria' , function ($categoria) {
                        $categoria->on('muestra.categoria_id', '=', 'categoria.categoria_id');
                    })
                    ->join('AA.variedad' , function ($variedad) {
                        $variedad->on('muestra.variedad_id', '=', 'variedad.variedad_id');
                    })
                    ->join('AA.nota' , function ($nota) {
                        $nota->on('muestra.nota_id', '=', 'nota.nota_id');
                    })
                    ->where('muestra.productor_id', $productor_id)
                    ->where('muestra.muestra_fecha', $fecha)
                    #->where('muestra.productor_id', 19)
                    #->where('muestra.muestra_fecha', '2019-02-07')
                    
                    ->whereNotNull('muestra.lote_codigo')
                    #->whereNotNull('muestra.nota_id')

                    ->get();


/*
        $pallets_agrupados = $muestra->select(
                        "muestra.lote_codigo",
                        "muestra.muestra_id",
                        "muestra.muestra_qr",
                        "nota.nota_nombre",
                        "variedad.variedad_nombre",
                        "embalaje.embalaje_nombre",
                        "categoria.categoria_nombre",
                        "apariencia.apariencia_nombre",
                        DB::raw("
                            IFNULL(
                                (
                                SELECT MAX(md.muestra_defecto_valor) maximo
                                FROM muestra_defecto md
                                INNER JOIN defecto def on md.defecto_id = def.defecto_id
                                WHERE muestra.muestra_id = md.muestra_id
                                AND def.defecto_nombre not regexp 'desgrane'
                                ORDER BY maximo desc limit 1
                                ),(
                                SELECT MAX(md.muestra_defecto_valor) maximo
                                FROM muestra_defecto md
                                INNER JOIN defecto def on md.defecto_id = def.defecto_id
                                WHERE muestra.muestra_id = md.muestra_id
                                AND def.defecto_nombre regexp 'desgrane'
                                ORDER BY maximo desc limit 1
                                )
                            ) valor_maximo,
                            IFNULL(
                                (
                                SELECT d.defecto_nombre
                                FROM muestra_defecto md
                                INNER JOIN defecto d on md.defecto_id = d.defecto_id
                                WHERE muestra.muestra_id = md.muestra_id
                                AND md.muestra_defecto_valor = 
                                IFNULL(
                                    (
                                    SELECT MAX(md.muestra_defecto_valor) maximo
                                    FROM muestra_defecto md
                                    INNER JOIN defecto def on md.defecto_id = def.defecto_id
                                    WHERE muestra.muestra_id = md.muestra_id
                                    AND def.defecto_nombre not regexp 'desgrane'
                                    ORDER BY maximo desc limit 1
                                    ),(
                                    SELECT MAX(md.muestra_defecto_valor) maximo
                                    FROM muestra_defecto md
                                    INNER JOIN defecto def on md.defecto_id = def.defecto_id
                                    WHERE muestra.muestra_id = md.muestra_id
                                    AND def.defecto_nombre regexp 'desgrane'
                                    ORDER BY maximo desc limit 1
                                    )
                                )
                                -- valor_maximo

                                order by valor_maximo desc limit 1
                                ),(
                                SELECT 'Sin Defecto'
                                )
                            ) defecto
                        ")
                    )
                    ->from('AA.muestra')
                    ->join('AA.embalaje' , function ($embalaje) {
                        $embalaje->on('muestra.embalaje_id', '=', 'embalaje.embalaje_id');
                    })
                    ->join('AA.apariencia' , function ($apariencia) {
                        $apariencia->on('muestra.apariencia_id', '=', 'apariencia.apariencia_id');
                    })
                    ->join('AA.categoria' , function ($categoria) {
                        $categoria->on('muestra.categoria_id', '=', 'categoria.categoria_id');
                    })
                    ->join('AA.variedad' , function ($variedad) {
                        $variedad->on('muestra.variedad_id', '=', 'variedad.variedad_id');
                    })
                    ->join('AA.nota' , function ($nota) {
                        $nota->on('muestra.nota_id', '=', 'nota.nota_id');
                    })
                    ->where('muestra.productor_id', $productor_id)
                    ->where('muestra.muestra_fecha', $fecha)
                    #->where('muestra.productor_id', 19)
                    #->where('muestra.muestra_fecha', '2019-02-07')
                    
                    ->whereNotNull('muestra.lote_codigo')
                    #->whereNotNull('muestra.nota_id')

                    ->get();
*/


        
        //PALLETS CON CALIFICACION
        /*
        $pallets_agrupados = Muestra::groupBy('lote_codigo','categoria_id','variedad_id')
        ->where('productor_id',$productor_id)
        ->where('muestra_fecha','=',$fecha)
        ->where('lote_codigo','>',0)
        ->select('lote_codigo',
            'categoria_id',
            'muestra_id',
            DB::raw('count(*) as total'), 
            DB::raw('sum(nota_id) as nota_total'),
            DB::raw('0 as nota_final_pallet'),
            DB::raw('0 as nota_final_pallet')
        )
        ->orderBy('lote_codigo')->get();
        */

        #dd($pallets_agrupados);


        /*
        $muestras_por_pallets = array();
        foreach($pallets_agrupados as $p){
            $calculo_nota = ceil($p->nota_total/$p->total);
            if($p->categoria_id == 2){
                switch ($calculo_nota) {
                    case 1:
                        $p->nota_final_pallet = 'A';
                        break;
                    case 2:
                        $p->nota_final_pallet = 'B';
                        break;
                    case 3:
                        $p->nota_final_pallet = 'C';
                        break;
                    case 4:
                        $p->nota_final_pallet = 'O';
                        break;
                    default:
                        $p->nota_final_pallet = 'FUERA DE RANGO';
                }

            }else{
                switch ($calculo_nota) {
                    case 1:
                        $p->nota_final_pallet = 'A';
                        break;
                    case 2:
                        $p->nota_final_pallet = 'B';
                        break;
                    default:
                        $p->nota_final_pallet = 'FUERA DE RANGO';
                }
            }

        }
        */

        $muestras = Muestra::where('productor_id', $productor_id)
            ->where('muestra_fecha', $fecha)
            ->orderBy('lote_codigo')
            ->get();

        $data['pallets'] = json_decode(json_encode($pallets_agrupados)); #OK
        $data['productor'] = $productor; #OK
        $data['fecha'] =  $request->fecha; #OK
        $data['muestras'] = $muestras; #OK


        $pdf = \PDF::loadView('pdf.invoice', $data)->setPaper('a4', 'landscape');
        return $pdf->download('reporte_pallet.pdf');


    }

    public function verMuestras($lote_codigo){
        $muestras = Muestra::where('lote_codigo',$lote_codigo)->get();
        return view('admin.palets.muestras',compact('muestras'));
    }
}
