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

    public function verMuestras($lote_codigo){
        $muestras = Muestra::where('lote_codigo',$lote_codigo)->get();
        return view('admin.palets.muestras',compact('muestras'));
    }
}
