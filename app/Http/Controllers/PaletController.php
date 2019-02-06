<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Muestra;
use App\Region;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


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
        ,`nota_final`(CEILING(SUM(m.`nota_id`)/COUNT(*)),m.`categoria_id`) AS nota_nombre_final
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
        $productor = Productor::find($productor_id);


        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'QR');
        $sheet->setCellValue('C1', 'PRODUCTOR');
        $sheet->setCellValue('D1', 'ESPECIE');
        $sheet->setCellValue('E1', 'VARIEDAD');
        $sheet->setCellValue('F1', 'CALIBRE');
        $sheet->setCellValue('G1', 'CATEGORIA');
        $sheet->setCellValue('H1', 'NOTAFINAL');

        $sheet->setCellValue('I1','Racimo Bajo Calibre');
        $sheet->setCellValue('J1','Racimo Bajo Color');
        $sheet->setCellValue('K1','Racimo Fuera de Color');
        $sheet->setCellValue('L1','Racimo Apretado');
        $sheet->setCellValue('M1','Racimo Bajo Brix');
        $sheet->setCellValue('N1','Racimo Deforme');
        $sheet->setCellValue('O1','Manchas(Russet, golpe de sol, trips, etc.)');
        $sheet->setCellValue('P1','Racimo Debil/Cristalino');
        $sheet->setCellValue('Q1','Raquis Deshidratado');
        $sheet->setCellValue('R1','Racimo Humedo/Pegajoso');
        $sheet->setCellValue('S1','Partiduras - Heridas Abiertas');
        $sheet->setCellValue('T1','Acuosas');
        $sheet->setCellValue('U1','Bayas Reventas');
        $sheet->setCellValue('V1','Oidio');
        $sheet->setCellValue('W1','Pudrición Ácida');
        $sheet->setCellValue('X1','Desgrane');
        $sheet->setCellValue('Y1','Penicillium');
        $sheet->setCellValue('Z1','Botritys (Piel suelta)');
        $sheet->setCellValue('AA1','Racimo bajo peso');
        $sheet->setCellValue('AB1','PALLET');
        $sheet->setCellValue('AC1','NOTA_PALLET');
        $i=2;
        foreach($consolidado as $c){
            $sheet->setCellValue("A".$i, $c->muestra_id);
            $sheet->setCellValue("B".$i, $c->muestra_qr);
            $sheet->setCellValue("C".$i, $c->productor_nombre);
            $sheet->setCellValue("D".$i, $c->especie_nombre);
            $sheet->setCellValue("E".$i, $c->variedad_nombre);
            $sheet->setCellValue("F".$i, $c->calibre_nombre);
            $sheet->setCellValue("G".$i, $c->categoria_nombre);
            $sheet->setCellValue("H".$i, $c->nota_nombre);


            $sheet->setCellValue('I'.$i,$c->Racimo_Bajo_Calibre);
            $sheet->setCellValue('J'.$i,$c->Racimo_Bajo_Color);
            $sheet->setCellValue('K'.$i,$c->Racimo_Fuera_de_Color);
            $sheet->setCellValue('L'.$i,$c->Racimo_Apretado);
            $sheet->setCellValue('M'.$i,$c->Racimo_Bajo_Brix);
            $sheet->setCellValue('N'.$i,$c->Racimo_Deforme);
            $sheet->setCellValue('O'.$i,$c->Manchas);
            $sheet->setCellValue('P'.$i,$c->Racimo_Debil);
            $sheet->setCellValue('Q'.$i,$c->Raquis_Deshidratado);
            $sheet->setCellValue('R'.$i,$c->Racimo_Humedo);
            $sheet->setCellValue('S'.$i,$c->Partiduras);
            $sheet->setCellValue('T'.$i,$c->Acuosas);
            $sheet->setCellValue('U'.$i,$c->Bayas_Reventas);
            $sheet->setCellValue('V'.$i,$c->Oidio);
            $sheet->setCellValue('W'.$i,$c->acida);
            $sheet->setCellValue('X'.$i,$c->Desgrane);
            $sheet->setCellValue('Y'.$i,$c->Penicillium);
            $sheet->setCellValue('Z'.$i,$c->Botritys);
            $sheet->setCellValue('AA'.$i,$c->Racimo_bajo_peso);
            $sheet->setCellValue('AB'.$i,$c->lote_codigo);
            $sheet->setCellValue('AC'.$i,$c->nota_nombre_final);
            $i++;
        }

        $writer = new Xlsx($spreadsheet);
        $writer->save('productor_'.$productor_id.'.xlsx');


        #return redirect::to('reporte.xlsx');

        dd($consolidado);
    }

    public function verMuestras($lote_codigo){
        $muestras = Muestra::where('lote_codigo',$lote_codigo)->get();
        return view('admin.palets.muestras',compact('muestras'));
    }
}
