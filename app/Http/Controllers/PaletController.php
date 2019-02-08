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
use Dompdf\Dompdf;

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
        //PALLETS CON CALIFICACION
        $pallets_agrupados = Muestra::groupBy('lote_codigo','categoria_id')->where('productor_id',$productor_id)
        ->where('muestra_fecha','=',$fecha)
        ->where('lote_codigo','>',0)
        ->select('lote_codigo'
        ,'categoria_id'
        , DB::raw('count(*) as total'), DB::raw('sum(nota_id) as nota_total'),DB::raw('0 as nota_final_pallet'))->get();

        $html= '';
        $html .= "<p><h2>$productor->productor_nombre</h2></p>";
        $html .= "<p><h2>".$productor->region->region_nombre."</h2></p>";
        $html .= "<p><h2>".$request->fecha."</h2></p>";

        foreach($pallets_agrupados as $p){
            $html .="<table>";
            $html .="<tr>";
            $html .='<td>PALLET </td> <td>'.$p->lote_codigo.'</td>';
            $html .="</tr>";
            $html .="<tr>";
            $html .='<td>CANTIDAD MUESTRAS </td> <td>'.$p->total.'</td>';
            $html .="</tr>";
            $html .="<tr>";
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
            $html .='<td> NOTA PALLET </td> <td>'.$p->nota_final_pallet.'</td>';
            $html .="</tr>";
            $html .="</table>";
        }
        $array_pallets = $pallets_agrupados;


        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream();

        dd('FIN');

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



        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $i=2;
        $sheet->setCellValue('A'.$i, 'Nombre');
        $sheet->setCellValue('B'.$i, $productor->productor_nombre);


        $muestrasTotal = Muestra::where('productor_id',$productor_id)->where('lote_codigo','>',0)->count();



        $sql_muestras = '
        SELECT   m.`nota_id`
        , n.`nota_nombre`
        , COUNT(*) AS total
        FROM muestra  m
        INNER JOIN nota n ON n.`nota_id` = m.`nota_id`
        WHERE m.`productor_id` = '.$productor_id.'
        and m.`lote_codigo` is not null
        GROUP BY m.`nota_id`
        , n.`nota_nombre`';
        $result = DB::select(DB::raw($sql_muestras));
        foreach($result as $m){
            $i++;
            $sheet->setCellValue('A'.$i, 'Nota Muestra: '.$m->nota_nombre);
            $sheet->setCellValue('B'.$i, $m->total);
            $porcentaje =  ($m->total / $muestrasTotal)*100;
            $sheet->setCellValue('C'.$i,$porcentaje.'%');
        }


        $i++;
        $i++;

        $sheet->setCellValue('A'.$i, 'ID');
        $sheet->setCellValue('B'.$i, 'QR');
        $sheet->setCellValue('C'.$i, 'PRODUCTOR');
        $sheet->setCellValue('D'.$i, 'ESPECIE');
        $sheet->setCellValue('E'.$i, 'VARIEDAD');
        $sheet->setCellValue('F'.$i, 'CALIBRE');
        $sheet->setCellValue('G'.$i, 'CATEGORIA');
        $sheet->setCellValue('H'.$i, 'NOTAFINAL');

        $sheet->setCellValue('I'.$i,'Racimo Bajo Calibre');
        $sheet->setCellValue('J'.$i,'Racimo Bajo Color');
        $sheet->setCellValue('K'.$i,'Racimo Fuera de Color');
        $sheet->setCellValue('L'.$i,'Racimo Apretado');
        $sheet->setCellValue('M'.$i,'Racimo Bajo Brix');
        $sheet->setCellValue('N'.$i,'Racimo Deforme');
        $sheet->setCellValue('O'.$i,'Manchas(Russet, golpe de sol, trips, etc.)');
        $sheet->setCellValue('P'.$i,'Racimo Debil/Cristalino');
        $sheet->setCellValue('Q'.$i,'Raquis Deshidratado');
        $sheet->setCellValue('R'.$i,'Racimo Humedo/Pegajoso');
        $sheet->setCellValue('S'.$i,'Partiduras - Heridas Abiertas');
        $sheet->setCellValue('T'.$i,'Acuosas');
        $sheet->setCellValue('U'.$i,'Bayas Reventas');
        $sheet->setCellValue('V'.$i,'Oidio');
        $sheet->setCellValue('W'.$i,'Pudrición Ácida');
        $sheet->setCellValue('X'.$i,'Desgrane');
        $sheet->setCellValue('Y'.$i,'Penicillium');
        $sheet->setCellValue('Z'.$i,'Botritys (Piel suelta)');
        $sheet->setCellValue('AA'.$i,'Racimo bajo peso');
        $sheet->setCellValue('AB'.$i,'PALLET');
        $sheet->setCellValue('AC'.$i,'NOTA_PALLET');
        $i++;
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
        $name = 'productor_'.$productor_id.'.xlsx';
        $writer->save($name);

        return redirect::to($name);


    }

    public function verMuestras($lote_codigo){
        $muestras = Muestra::where('lote_codigo',$lote_codigo)->get();
        return view('admin.palets.muestras',compact('muestras'));
    }
}
