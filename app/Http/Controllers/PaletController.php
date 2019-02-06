<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Muestra;
use App\Region;

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
        $productor_id = $request->productor_id;
        set_time_limit(0);
        $statement = 'SELECT m.muestra_id
        , m.`muestra_qr`
        , e.`especie_nombre`
        , v.`variedad_nombre`
        , cl.`calibre_nombre`
        , m.`categoria_id`
        , ct.`categoria_nombre`
        , m.`nota_id`
        , n.`nota_nombre`
        , a.`apariencia_nombre`
        , p.productor_nombre
        , m.`lote_codigo`
        ,`nota_final`(CEILING(SUM(m.`nota_id`)/COUNT(*)),m.`categoria_id`) AS nota_nombre
               ,SUM(
                       IF(f.defecto_id=1
                       ,   d.`muestra_defecto_calculo`
                       ,   0
                       )
                   ) "Racimo_Bajo_Calibre"
               ,SUM(
                       IF(f.defecto_id=2
                       ,   d.`muestra_defecto_calculo`
                       ,   0
                       )
                   ) "Racimo_Bajo_Color"

               ,SUM(
                       IF(f.defecto_id=3
                       ,   d.`muestra_defecto_calculo`
                       ,   0
                       )
                   ) "Racimo_Fuera_de_Color"
                   ,SUM(
                       IF(f.defecto_id=4
                       ,   d.`muestra_defecto_calculo`
                       ,   0
                       )
                   ) "Racimo_Apretado"
                   ,SUM(
                       IF(f.defecto_id=5
                       ,   d.`muestra_defecto_calculo`
                       ,   0
                       )
                   ) "Racimo_Bajo_Brix"
                   ,SUM(
                       IF(f.defecto_id=6
                       ,   d.`muestra_defecto_calculo`
                       ,   0
                       )
                   ) "Racimo_Deforme"
                   ,SUM(
                       IF(f.defecto_id=7
                       ,   d.`muestra_defecto_calculo`
                       ,   0
                       )
                   ) "Manchas"
                   ,SUM(
                       IF(f.defecto_id=8
                       ,   d.`muestra_defecto_calculo`
                       ,   0
                       )
                   ) "Racimo_Debil"
                   ,SUM(
                       IF(f.defecto_id=9
                       ,   d.`muestra_defecto_calculo`
                       ,   0
                       )
                   ) "Raquis_Deshidratado"
                   ,SUM(
                       IF(f.defecto_id=10
                       ,   d.`muestra_defecto_calculo`
                       ,   0
                       )
                   ) "Racimo_Humedo"
                   ,SUM(
                       IF(f.defecto_id=11
                       ,   d.`muestra_defecto_calculo`
                       ,   0
                       )
                   ) "Partiduras"
                   ,SUM(
                       IF(f.defecto_id=12
                       ,   d.`muestra_defecto_calculo`
                       ,   0
                       )
                   ) "Acuosas"
                   ,SUM(
                       IF(f.defecto_id=13
                       ,   d.`muestra_defecto_calculo`
                       ,   0
                       )
                   ) "Bayas_Reventas"
                   ,SUM(
                       IF(f.defecto_id=14
                       ,   d.`muestra_defecto_calculo`
                       ,   0
                       )
                   ) "Oidio"
                   ,SUM(
                       IF(f.defecto_id=15
                       ,   d.`muestra_defecto_calculo`
                       ,   0
                       )
                   ) "acida"
             ,SUM(
                       IF(f.defecto_id=20
                       ,   d.`muestra_defecto_calculo`
                       ,   0
                       )
                   ) "Desgrane"
                ,SUM(
                       IF(f.defecto_id=21
                       ,   d.`muestra_defecto_calculo`
                       ,   0
                       )
                   ) "Penicillium"
                   ,SUM(
                       IF(f.defecto_id=22
                       ,   d.`muestra_defecto_calculo`
                       ,   0
                       )
                   ) "Botritys"
                   ,SUM(
                       IF(f.defecto_id=23
                       ,   d.`muestra_defecto_calculo`
                       ,   0
                       )
                   ) "Racimo_bajo_peso"
        FROM muestra  m
        inner join apariencia a on a.`apariencia_id` = m.`apariencia_id`
        inner join especie e on e.`especie_id` = m.`especie_id`
        inner join variedad v on v.`variedad_id` = m.`variedad_id`
        inner join productor p on p.`productor_id` =  m.`productor_id`
        INNER JOIN `calibre` cl on cl.`calibre_id`= m.`calibre_id`
        inner join categoria ct on ct.`categoria_id` = m.`categoria_id`
        INNER JOIN muestra_defecto d ON d.`muestra_id` = m.`muestra_id`
        INNER JOIN defecto f ON f.`defecto_id` = d.`defecto_id`
        INNER JOIN nota n ON n.`nota_id` = m.`nota_id`
        where m.`productor_id` = '.$productor_id.'
        GROUP BY  m.muestra_id
        , m.muestra_id
        , m.`muestra_qr`
        , e.`especie_nombre`
        , v.`variedad_nombre`
        , cl.`calibre_nombre`
        , ct.`categoria_nombre`
        , m.`nota_id`
        , n.`nota_nombre`
        , a.`apariencia_nombre`
        , p.productor_nombre
        , m.`lote_codigo`
        , m.`categoria_id`';
        $consolidado = DB::select(DB::raw($statement));
        dd($consolidado);
    }

    public function verMuestras($lote_codigo){
        $muestras = Muestra::where('lote_codigo',$lote_codigo)->get();
        return view('admin.palets.muestras',compact('muestras'));
    }
}
