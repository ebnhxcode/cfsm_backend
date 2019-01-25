<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Especie;
use App\Region;
use App\Variedad;
use App\Calibre;
use App\Categoria;
use App\Embalaje;
use App\Etiqueta;
use App\Productor;
use App\Muestra;
use Carbon\Carbon;
use App\Concepto;
use App\Nota;
use App\Apariencia;
use App\Defecto;
use App\Grupo;
use App\EstadoMuestra;
use yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Tolerancia;
use App\MuestraDefecto;
use DB;
use App\ToleranciaGrupo;
use Storage;
use App\MuestraImagen;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class MuestraController extends Controller
{
    public function __construct(){
        #$this->middleware('admin');
        #$this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.muestras.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $muestra = "";
        $regiones = Region::orderBy('region_nombre')->get();
        $productores = Productor::where('region_id', '1')->get();
        $especies = Especie::orderBy('especie_nombre')->pluck('especie_nombre','especie_id');
        $variedades = Variedad::orderBy('variedad_nombre')->pluck('variedad_nombre','variedad_id');
        $calibres = Calibre::orderBy('calibre_nombre')->pluck('calibre_nombre','calibre_id');
        $categorias = Categoria::orderBy('categoria_nombre')->pluck('categoria_nombre','categoria_id');
        $embalajes = Embalaje::orderBy('embalaje_nombre')->pluck('embalaje_nombre','embalaje_id');
        $etiquetas = Etiqueta::orderBy('etiqueta_nombre')->pluck('etiqueta_nombre','etiqueta_id');
        $apariencias = Apariencia::orderBy('apariencia_nombre')->pluck('apariencia_nombre','apariencia_id');

        return view('admin.muestras.agregar', compact('muestra','productores','apariencias','regiones','especies','variedades','calibres','categorias','embalajes','etiquetas'));
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
        $rules = [
            'muestra_peso' => 'required|numeric',
            'muestra_qr' => 'required|unique:muestra|max:255',
            'region_id' => 'required',
            'productor_id' => 'required',
            'especie_id' => 'required',
            'variedad_id' => 'required',
            'calibre_id' => 'required',
            'categoria_id' => 'required',
            'embalaje_id' => 'required',
            'etiqueta_id' => 'required',
            'apariencia_id' => 'required',
            'muestra_bolsas' => 'required|numeric',
            'muestra_racimos' => 'required|numeric',
            'muestra_brix' => 'required|numeric',
        ];

        $messages = [
            'muestra_peso.required' => 'El Peso obligatorio.',
            'muestra_peso.numeric' => 'Peso debe ser número.',
            'muestra_qr.required' => 'El Código QR es obligatorio.',
            'muestra_qr.unique' => 'El codigo QR ya se encuentra registrado.',
            'muestra_qr.max' => 'El nombre del productor ingresado es demaciado largo.',
            'region_id.required' => 'Región es obligatorio.',
            'productor_id.required' => 'Productor es obligatorio.',
            'especie_id.required' => 'Especie es obligatorio.',
            'variedad_id.required' => 'Variedad es obligatorio.',
            'calibre_id.required' => 'Calibre es obligatorio.',
            'categoria_id.required' => 'Categoría es obligatorio.',
            'embalaje_id.required' => 'Embalaje es obligatorio.',
            'etiqueta_id.required' => 'Etiqueta es obligatorio.',
            'apariencia_id.required' => 'Apariencia es obligatorio.',
            'muestra_bolsas.required' => 'Bolsas es obligatorio.',
            'muestra_bolsas.numeric' => 'Bolsas debe ser número..',
            'muestra_racimos.required' => 'Racimos es obligatorio.',
            'muestra_racimos.numeric' => 'Bolsas debe ser número.',
            'muestra_brix.required' => 'Brix  es obligatorio.',
            'muestra_brix.numeric' => 'Brix debe ser número.',
        ];

        $this->validate($request, $rules, $messages);


        $apariencia = Apariencia::find($request->apariencia_id);
        #dd($apariencia);
        $muestra = new Muestra();
        $muestra->muestra_qr = $request->muestra_qr;
        $muestra->region_id = $request->region_id;
        $muestra->productor_id = $request->productor_id;
        $muestra->especie_id = $request->especie_id;
        $muestra->variedad_id = $request->variedad_id;
        $muestra->calibre_id = $request->calibre_id;
        $muestra->categoria_id = $request->categoria_id;
        $muestra->embalaje_id = $request->embalaje_id;
        $muestra->apariencia_id = $request->apariencia_id;
        $muestra->etiqueta_id = $request->etiqueta_id;
        $muestra->muestra_peso = $request->muestra_peso;
        $muestra->muestra_fecha = Carbon::parse($request->muestra_fecha)->toDateTimeString();
        $muestra->nota_id = $apariencia->nota_id; //PROCESO
        $muestra->estado_muestra_id = 1;
        $muestra->muestra_bolsas = $request->muestra_bolsas;
        $muestra->muestra_racimos = $request->muestra_racimos;
        $muestra->muestra_brix = $request->muestra_brix;

        #dd($muestra->productor_id);
        $muestra->save();
        $id  = $muestra->muestra_id;
        $defecto_id = 20;
        $defecto = Defecto::find($defecto_id);
        $muestra_desgrane = $request->muestra_desgrane;
        $muestra_defecto_valor = $request->muestra_desgrane;

        if($defecto->zona_id == 1 ){
            #CALCULO POR %
            $calculado = round((($muestra_defecto_valor*100)/$request->muestra_peso),2);
            $tolerancia  = Tolerancia::where('defecto_id',$defecto_id)
            ->where('tolerancia_desde','<=',$calculado)
            ->where('tolerancia_hasta','>=',$calculado)
            ->first();
            //NOTA $tolerancia->nota->nota_nombre
            //NOTA $tolerancia->nota->nota_id
            if(isset($tolerancia->nota->nota_id)){
                $nota_id = $tolerancia->nota->nota_id;
            }else{
                $nota_id = 5;
            }
            $nota = Nota::find($nota_id);
        }else{
            #CALCULO POR NUMERO
            $calculado = $muestra_defecto_valor;
            $nota_id = 5;
            $nota = Nota::find($nota_id);
            $muestra_defecto_valor=$muestra_defecto_valor;
        }
        //return response()->json(1);
        #print_r($tolerancia->nota->nota_nombre);

        try {
            $muestra_defecto = New MuestraDefecto();
            $muestra_defecto->muestra_id = $id;
            $muestra_defecto->defecto_id = $defecto_id;
            $muestra_defecto->muestra_defecto_valor = $muestra_desgrane;
            $muestra_defecto->nota_id = $nota->nota_id;
            $muestra_defecto->muestra_defecto_calculo = $calculado;
            $muestra_defecto->save();
            #echo 'registrado con exito';
        }
          catch (Exception $e) {
              return $e->getMessage();
        }
        return redirect::to('muestra-3/'.$muestra->muestra_id);

    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $muestra = Muestra::find($id);
        $conceptos = Concepto::all();
        $apariencias = Apariencia::all();
        $grupos = Grupo::all();
        $muestra_imagenes = MuestraImagen::where('muestra_id',$id)->get();
        $estado_muestras = EstadoMuestra::orderBy('estado_muestra_nombre')->pluck('estado_muestra_nombre','estado_muestra_id');
        $muestras_defecto = MuestraDefecto::where('muestra_id',$id)->get();
        $muestra_imagenes = MuestraImagen::where('muestra_id',$id)->get();
        $statement = "SELECT
        z.`zona_id`
        ,z.zona_nombre
        , c.`concepto_id`
        , c.`concepto_nombre`
        , g.`grupo_id`
        , g.`grupo_nombre`
        ,SUM(df.`muestra_defecto_calculo`) AS total_grupo
        FROM  muestra_defecto df
        inner join defecto d ON df.`defecto_id` = d.`defecto_id` and df.muestra_id = $id
        INNER JOIN zona_defecto z ON z.zona_id = d.`zona_id`
        INNER JOIN concepto c ON c.`concepto_id` = d.`concepto_id`
        INNER JOIN grupo g ON g.`grupo_id` = d.grupo_id
        INNER JOIN nota n ON n.`nota_id` = df.`nota_id`
        INNER JOIN muestra m ON m.`muestra_id` = $id
        GROUP BY z.zona_nombre
        , z.`zona_id`
        , c.`concepto_id`
        , c.`concepto_nombre`
        , g.`grupo_id`
        , g.`grupo_nombre`
        ";
        #INICIALIZA LAS NOTAS GENERALES
        $nota_max = 1;
        $arrayCalidad = array();
        array_push($arrayCalidad, 1);
        $arrayCondicion = array();
        array_push($arrayCondicion, 1);


        $nota_calidad = max($arrayCalidad);
        $nota_condicion = max($arrayCondicion);
        $grupos_totales = DB::select(DB::raw($statement));

        foreach($grupos_totales as $g){
            //echo $g->concepto_id ." - ".$g->grupo_id." - ".$g->total_grupo;
            //echo "<br>";

            /*$query = "select *
            from tolerancia_grupo
            where grupo_id = $g->grupo_id
            and categoria_id = $muestra->categoria_id
            and tolerancia_grupo_desde <=  $g->total_grupo
            and tolerancia_grupo_hasta >=  $g->total_grupo  ";

            $result = DB::select(DB::raw($query));
            dd($query);*/


            $result = ToleranciaGrupo::where('grupo_id',$g->grupo_id)
            ->where('categoria_id',$muestra->categoria_id)
            ->where('tolerancia_grupo_desde','<=',$g->total_grupo)
            ->where('tolerancia_grupo_hasta','>=',$g->total_grupo)
            ->first();

           if(isset($result->nota_id)){
                    if($g->concepto_id == 1 ){
                        #CONCEPTO 1 CALIDAD
                        array_push($arrayCalidad, $result->nota_id);
                    }else{
                        #CONCEPTO 2 CONDICION
                        array_push($arrayCondicion, $result->nota_id);
                    }
           }else{
            if($g->concepto_id == 1 ){
                #CONCEPTO 1 CALIDAD
                array_push($arrayCalidad, 4);
            }else{
                #CONCEPTO 2 CONDICION
                array_push($arrayCondicion, 4);
            }
           }

        }
        $nota_max_calidad = max($arrayCalidad);
        $nota_calidad = Nota::find($nota_max_calidad);
        $nota_calidad_nombre = $nota_calidad->nota_nombre;

        $nota_max_condicion = max($arrayCondicion);
        $nota_condicion = Nota::find($nota_max_condicion);
        $nota_condicion_nombre = $nota_condicion->nota_nombre;

        if($nota_max_calidad >= $nota_max_condicion){
            $nota = Nota::find($nota_max_calidad);
        }else{
            $nota = Nota::find($nota_max_condicion);
        }

        if($nota->nota_id < $muestra->nota_id){
            $nota = Nota::find($muestra->nota_id);
        }


        $muestra->nota_id = $nota->nota_id;
        //$muestra->save();
        return view('admin.muestras.show',compact('muestra_imagenes','grupos_totales','grupos','conceptos','muestra','nota','muestras_defecto','nota_calidad_nombre','nota_condicion_nombre','apariencias'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $variedades = Variedad::orderBy('variedad_nombre')->pluck('variedad_nombre','variedad_id');
        $especies = Especie::orderBy('especie_nombre')->pluck('especie_nombre','especie_id');
        $muestra = Muestra::find($id);
        $defecto = MuestraDefecto::where('defecto_id',20)->where('muestra_id',$id)->first();
        $muestra_desgrane = round($defecto->muestra_defecto_valor,0);
        $productores = Productor::where('region_id', $muestra->region_id)->get();
        $calibres = Calibre::orderBy('calibre_nombre')->pluck('calibre_nombre','calibre_id');
        $categorias = Categoria::orderBy('categoria_nombre')->pluck('categoria_nombre','categoria_id');
        $regiones = Region::orderBy('region_nombre')->get();
        $embalajes = Embalaje::orderBy('embalaje_nombre')->pluck('embalaje_nombre','embalaje_id');
        $etiquetas = Etiqueta::orderBy('etiqueta_nombre')->pluck('etiqueta_nombre','etiqueta_id');
        $apariencias = Apariencia::orderBy('apariencia_nombre')->pluck('apariencia_nombre','apariencia_id');
        $muestra->muestra_fecha = Carbon::parse($muestra->muestra_fecha)->format('d-m-Y');
        #dd($muestra->muestra_fecha);
        return view('admin.muestras.editar',compact('muestra_desgrane','productores','categorias','calibres','variedades','especies','regiones','etiquetas','embalajes','muestra','conceptos','apariencias'));
    
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
        $muestra = Muestra::find($request->muestra_id);
        $rules = [
            'muestra_peso' => 'required|numeric',
            'muestra_qr' => 'required|max:255',
            'region_id' => 'required',
            'productor_id' => 'required',
            'especie_id' => 'required',
            'variedad_id' => 'required',
            'calibre_id' => 'required',
            'categoria_id' => 'required',
            'embalaje_id' => 'required',
            'etiqueta_id' => 'required',
            'apariencia_id' => 'required',
            'muestra_bolsas' => 'required|numeric',
            'muestra_racimos' => 'required|numeric',
            'muestra_brix' => 'required|numeric',
        ];

        $messages = [
            'muestra_peso.required' => 'El Peso obligatorio.',
            'muestra_peso.numeric' => 'Peso debe ser número.',
            'muestra_qr.required' => 'El Código QR es obligatorio.',
            'muestra_qr.max' => 'El nombre del productor ingresado es demaciado largo.',
            'region_id.required' => 'Región es obligatorio.',
            'productor_id.required' => 'Productor es obligatorio.',
            'especie_id.required' => 'Especie es obligatorio.',
            'variedad_id.required' => 'Variedad es obligatorio.',
            'calibre_id.required' => 'Calibre es obligatorio.',
            'categoria_id.required' => 'Categoría es obligatorio.',
            'embalaje_id.required' => 'Embalaje es obligatorio.',
            'etiqueta_id.required' => 'Etiqueta es obligatorio.',
            'apariencia_id.required' => 'Apariencia es obligatorio.',
            'muestra_bolsas.required' => 'Bolsas es obligatorio.',
            'muestra_bolsas.numeric' => 'Bolsas debe ser número..',
            'muestra_racimos.required' => 'Racimos es obligatorio.',
            'muestra_racimos.numeric' => 'Bolsas debe ser número.',
            'muestra_brix.required' => 'Brix  es obligatorio.',
            'muestra_brix.numeric' => 'Brix debe ser número.',
        ];

        $this->validate($request, $rules, $messages);

        $apariencia = Apariencia::find($request->apariencia_id);
        #dd($apariencia);
        $muestra->muestra_qr = $request->muestra_qr;
        $muestra->region_id = $request->region_id;
        $muestra->productor_id = $request->productor_id;
        $muestra->especie_id = $request->especie_id;
        $muestra->variedad_id = $request->variedad_id;
        $muestra->calibre_id = $request->calibre_id;
        $muestra->categoria_id = $request->categoria_id;
        $muestra->embalaje_id = $request->embalaje_id;
        $muestra->apariencia_id = $request->apariencia_id;
        $muestra->etiqueta_id = $request->etiqueta_id;
        $muestra->muestra_peso = $request->muestra_peso;
        $muestra->muestra_fecha = Carbon::parse($request->muestra_fecha)->toDateTimeString();
        $muestra->nota_id = $apariencia->nota_id; //PROCESO
        $muestra->estado_muestra_id = 1;
        $muestra->muestra_bolsas = $request->muestra_bolsas;
        $muestra->muestra_racimos = $request->muestra_racimos;
        $muestra->muestra_brix = $request->muestra_brix;

        #dd($muestra->productor_id);
        $muestra->save();

        return redirect::to('muestra-3/'.$muestra->muestra_id);

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


    public function muestrasDatetables(){
        $muestras = Muestra::select(
            'muestra_id'
            ,'muestra_qr'
            ,'region_id'
            ,'productor_id'
            ,'especie_id'
            ,'variedad_id'
            ,'calibre_id'
            ,'categoria_id'
            ,'embalaje_id'
            ,'etiqueta_id'
            , 'nota_id'
            )
        ->with(
            'region'
        ,'productor'
        ,'especie'
        ,'variedad'
        ,'calibre'
        ,'categoria'
        ,'embalaje'
        ,'nota'
        )->get();
        return Datatables::of($muestras)
            ->addColumn('action', function ($muestras) {
                return '
                    <a href="'.route('productores.edit',$muestras->muestra_id).'" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-edit"></i> Editar </a>
                    <a href="'.url('productoresDelete/'.$muestras->muestra_id).'" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-edit"></i> Eliminar </a>
                    ';
            })
            ->make(true);
    }

    public function getProductoresByRegionId(Request $request){
        $region_id = $request->region_id;
        $arrayProveedores = array();
        $productores  = Productor::where('region_id', $region_id)->get();
        //dd($productores);
        foreach($productores as $p){
                    array_push($arrayProveedores, array( 'id' =>$p->productor_id,
                        'nombre' => $p->productor_nombre)
                    );
        }
        return response()->json($arrayProveedores);

    }

    public function getVariedadesByEspecieId(Request $request){
        $region_id = $request->region_id;
        $arrayProveedores = array();
        $productores  = Productor::where('region_id', $region_id)->get();
        foreach($productores as $p){
                    array_push($arrayProveedores, array( 'id' =>$p->productor_id,
                        'nombre' => $p->productor_nombre)
                    );
        }
        return response()->json($arrayProveedores);

    }

    public function muestraStep2($id)
    {

        $conceptos = Concepto::all();
        $apariencias = Apariencia::orderBy('apariencia_id')->pluck('apariencia_nombre','apariencia_id');
        $muestra = Muestra::find($id);

        return view('admin.muestras.paso2.agregar',compact('conceptos','apariencias','muestra'));



    }

    public function muestraStep3($id){
        $muestra = Muestra::find($id);
        $conceptos = Concepto::all();
        $apariencias = Apariencia::all();
        $grupos = Grupo::all();

        $statement = "SELECT
        z.`zona_id`
        ,z.zona_nombre
        , c.`concepto_id`
        , c.`concepto_nombre`
        , g.`grupo_id`
        , g.`grupo_nombre`
        ,SUM(df.`muestra_defecto_calculo`) AS total_grupo
        FROM  muestra_defecto df
        inner join defecto d ON df.`defecto_id` = d.`defecto_id` and df.muestra_id = $id
        INNER JOIN zona_defecto z ON z.zona_id = d.`zona_id`
        INNER JOIN concepto c ON c.`concepto_id` = d.`concepto_id`
        INNER JOIN grupo g ON g.`grupo_id` = d.grupo_id
        INNER JOIN nota n ON n.`nota_id` = df.`nota_id`
        INNER JOIN muestra m ON m.`muestra_id` = $id
        GROUP BY z.zona_nombre
        , z.`zona_id`
        , c.`concepto_id`
        , c.`concepto_nombre`
        , g.`grupo_id`
        , g.`grupo_nombre`
        ";
        #INICIALIZA LAS NOTAS GENERALES
        $nota_max = 1;
        $arrayCalidad = array();
        array_push($arrayCalidad, 1);
        $arrayCondicion = array();
        array_push($arrayCondicion, 1);


        $nota_calidad = max($arrayCalidad);
        $nota_condicion = max($arrayCondicion);
        $grupos_totales = DB::select(DB::raw($statement));

        foreach($grupos_totales as $g){
            //echo $g->concepto_id ." - ".$g->grupo_id." - ".$g->total_grupo;
            //echo "<br>";
            /*$query = "select *
            from tolerancia_grupo
            where grupo_id = $g->grupo_id
            and categoria_id = $muestra->categoria_id
            and tolerancia_grupo_desde <=  $g->total_grupo
            and tolerancia_grupo_hasta >=  $g->total_grupo  ";

            $result = DB::select(DB::raw($query));
            dd($query);*/


            $result = ToleranciaGrupo::where('grupo_id',$g->grupo_id)
            ->where('categoria_id',$muestra->categoria_id)
            ->where('tolerancia_grupo_desde','<=',$g->total_grupo)
            ->where('tolerancia_grupo_hasta','>=',$g->total_grupo)
            ->first();

           if(isset($result->nota_id)){
                    if($g->concepto_id == 1 ){
                        #CONCEPTO 1 CALIDAD
                        array_push($arrayCalidad, $result->nota_id);
                    }else{
                        #CONCEPTO 2 CONDICION
                        array_push($arrayCondicion, $result->nota_id);
                    }
           }else{
            if($g->concepto_id == 1 ){
                #CONCEPTO 1 CALIDAD
                array_push($arrayCalidad, 4);
            }else{
                #CONCEPTO 2 CONDICION

                array_push($arrayCondicion, 4);
            }
           }

        }
        $nota_max_calidad = max($arrayCalidad);
        $nota_calidad = Nota::find($nota_max_calidad);
        $nota_calidad_nombre = $nota_calidad->nota_nombre;

        $nota_max_condicion = max($arrayCondicion);
        $nota_condicion = Nota::find($nota_max_condicion);
        $nota_condicion_nombre = $nota_condicion->nota_nombre;

        if($nota_max_calidad >= $nota_max_condicion){
            $nota = Nota::find($nota_max_calidad);
        }else{
            $nota = Nota::find($nota_max_condicion);
        }

        if($nota->nota_id < $muestra->nota_id){
            $nota = Nota::find($muestra->nota_id);
        }
        $muestras_defecto = MuestraDefecto::where('muestra_id',$id)->get();
        #dd($muestra);
        return view('admin.muestras.paso3.index',compact('grupos_totales','grupos','conceptos','muestra','nota','muestras_defecto','nota_calidad_nombre','nota_condicion_nombre','apariencias'));
    }

    public function  paso3(Request $request){
        $muestra = Muestra::find($request->muestra_id);
        $defecto_id = $request->defecto_id;
        $defecto = Defecto::find($defecto_id);
        $muestra_defecto_valor = $request->muestra_defecto_valor;

        if($defecto->zona_id == 1 ){
            #CALCULO POR %
            $calculado = round((($muestra_defecto_valor*100)/$muestra->muestra_peso),2);
            $tolerancia  = Tolerancia::where('defecto_id',$defecto_id)
            ->where('tolerancia_desde','<=',$calculado)
            ->where('tolerancia_hasta','>=',$calculado)
            ->first();
            //NOTA $tolerancia->nota->nota_nombre
            //NOTA $tolerancia->nota->nota_id
            if(isset($tolerancia->nota->nota_id)){
                $nota_id = $tolerancia->nota->nota_id;
            }else{
                $nota_id = 5;
            }
            $nota = Nota::find($nota_id);
        }else{
            #CALCULO POR NUMERO
            $calculado = $muestra_defecto_valor;
            $nota_id = 5;
            $nota = Nota::find($nota_id);
            $muestra_defecto_valor=$muestra_defecto_valor;
        }
        //return response()->json(1);
        #print_r($tolerancia->nota->nota_nombre);

        try {
            $muestra_defecto = New MuestraDefecto();
            $muestra_defecto->muestra_id = $request->muestra_id;
            $muestra_defecto->defecto_id = $request->defecto_id;
            $muestra_defecto->muestra_defecto_valor = $request->muestra_defecto_valor;
            $muestra_defecto->nota_id = $nota->nota_id;
            $muestra_defecto->muestra_defecto_calculo = $calculado;
            $muestra_defecto->save();
            echo 'registrado con exito';
        }
          catch (Exception $e) {
              return $e->getMessage();
        }

    }

    public function getDefectosByGrupo(Request $request){
        $grupo_id = $request->grupo_id;
        $arrayGrupos = array();
        $defectos  = Defecto::where('grupo_id', $grupo_id)->get();
        foreach($defectos as $g){
                    array_push($arrayGrupos, array( 'id' =>$g->defecto_id,
                        'nombre' => $g->defecto_nombre)
                    );
        }
        return response()->json($arrayGrupos);
    }


    public function getDefectoNota(Request $request){

        $muestra = Muestra::find($request->muestra_id);
        $defecto_id = $request->defecto_id;
        $defecto = Defecto::find($defecto_id);
        $muestra_defecto_valor = $request->muestra_defecto_valor;

        if($defecto->zona_id == 1 ){
            #CALCULO POR %
            $porcentaje = round((($muestra_defecto_valor*100)/$muestra->muestra_peso),0);
            $tolerancia  = Tolerancia::where('defecto_id',$defecto_id)
            ->where('tolerancia_desde','<=',$porcentaje)
            ->where('tolerancia_hasta','>=',$porcentaje)
            ->first();
            //NOTA $tolerancia->nota->nota_nombre
            //NOTA $tolerancia->nota->nota_id
            if(isset($tolerancia->nota->nota_id)){
                $nota_id = $tolerancia->nota->nota_id;
            }else{
                $nota_id = 5;
            }
            $nota = Nota::find($nota_id);
        }else{
            #CALCULO POR NUMERO
            $nota_id = 5;
            $nota = Nota::find($nota_id);
        }
        //return response()->json(1);
        #print_r($tolerancia->nota->nota_nombre);
        echo $nota->nota_nombre;
    }

    public function muestraStep4($id){
        $muestra = Muestra::find($id);
        $conceptos = Concepto::all();
        $apariencias = Apariencia::all();
        $grupos = Grupo::all();
        $muestra_imagenes = MuestraImagen::where('muestra_id',$id)->get();
        $estado_muestras = EstadoMuestra::orderBy('estado_muestra_nombre')->pluck('estado_muestra_nombre','estado_muestra_id');

        $statement = "SELECT
        z.`zona_id`
        ,z.zona_nombre
        , c.`concepto_id`
        , c.`concepto_nombre`
        , g.`grupo_id`
        , g.`grupo_nombre`
        ,SUM(df.`muestra_defecto_calculo`) AS total_grupo
        FROM  muestra_defecto df
        inner join defecto d ON df.`defecto_id` = d.`defecto_id` and df.muestra_id = $id
        INNER JOIN zona_defecto z ON z.zona_id = d.`zona_id`
        INNER JOIN concepto c ON c.`concepto_id` = d.`concepto_id`
        INNER JOIN grupo g ON g.`grupo_id` = d.grupo_id
        INNER JOIN nota n ON n.`nota_id` = df.`nota_id`
        INNER JOIN muestra m ON m.`muestra_id` = $id
        GROUP BY z.zona_nombre
        , z.`zona_id`
        , c.`concepto_id`
        , c.`concepto_nombre`
        , g.`grupo_id`
        , g.`grupo_nombre`
        ";
        #INICIALIZA LAS NOTAS GENERALES
        $nota_max = 1;
        $arrayCalidad = array();
        array_push($arrayCalidad, 1);
        $arrayCondicion = array();
        array_push($arrayCondicion, 1);


        $nota_calidad = max($arrayCalidad);
        $nota_condicion = max($arrayCondicion);
        $grupos_totales = DB::select(DB::raw($statement));

        foreach($grupos_totales as $g){
            //echo $g->concepto_id ." - ".$g->grupo_id." - ".$g->total_grupo;
            //echo "<br>";

            /*$query = "select *
            from tolerancia_grupo
            where grupo_id = $g->grupo_id
            and categoria_id = $muestra->categoria_id
            and tolerancia_grupo_desde <=  $g->total_grupo
            and tolerancia_grupo_hasta >=  $g->total_grupo  ";

            $result = DB::select(DB::raw($query));
            dd($query);*/


            $result = ToleranciaGrupo::where('grupo_id',$g->grupo_id)
            ->where('categoria_id',$muestra->categoria_id)
            ->where('tolerancia_grupo_desde','<=',$g->total_grupo)
            ->where('tolerancia_grupo_hasta','>=',$g->total_grupo)
            ->first();

           if(isset($result->nota_id)){
                    if($g->concepto_id == 1 ){
                        #CONCEPTO 1 CALIDAD
                        array_push($arrayCalidad, $result->nota_id);
                    }else{
                        #CONCEPTO 2 CONDICION
                        array_push($arrayCondicion, $result->nota_id);
                    }
           }else{
            if($g->concepto_id == 1 ){
                #CONCEPTO 1 CALIDAD
                array_push($arrayCalidad, 4);
            }else{
                #CONCEPTO 2 CONDICION

                array_push($arrayCondicion, 4);
            }
           }

        }
        $nota_max_calidad = max($arrayCalidad);
        $nota_calidad = Nota::find($nota_max_calidad);
        $nota_calidad_nombre = $nota_calidad->nota_nombre;

        $nota_max_condicion = max($arrayCondicion);
        $nota_condicion = Nota::find($nota_max_condicion);
        $nota_condicion_nombre = $nota_condicion->nota_nombre;

        if($nota_max_calidad >= $nota_max_condicion){
            $nota = Nota::find($nota_max_calidad);
        }else{
            $nota = Nota::find($nota_max_condicion);
        }

        if($nota->nota_id < $muestra->nota_id){
            $nota = Nota::find($muestra->nota_id);
        }


        $muestra->nota_id = $nota->nota_id;
        $muestra->save();
        return view('admin.muestras.paso4.index',compact('estado_muestras','muestra_imagenes','grupos_totales','muestra','nota','nota_calidad_nombre','nota_condicion_nombre'));
    }


    public function uploadimagen(Request $request) {

        $rules = [
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'muestra_imagen_texto' => 'required',
            'muestra_id'  => 'required',
        ];

        $messages = [
            'file.required' => 'Imagen es obligatorio.',
            'muestra_imagen_texto.required' => 'Comentario es obligatorio.',
            'muestra_id.required' => 'Muestra es obligatorio.',
        ];

        $this->validate($request, $rules, $messages);
        $muestra = Muestra::find($request->muestra_id);
        if($request->file('file')){
            $path = Storage::disk('public')->put('image', $request->file('file'));
            $muestra_imagen = new MuestraImagen();
            $muestra_imagen->muestra_imagen_ruta  = asset($path);
            #$muestra_imagen->muestra_imagen_fecha
            $muestra_imagen->muestra_id = $request->muestra_id;
            $muestra_imagen->muestra_imagen_texto = $request->muestra_imagen_texto;
            $muestra_imagen->muestra_imagen_ruta_corta = $path;
            $muestra_imagen->save();
        }

        return redirect::to('muestra-4/'.$muestra->muestra_id);


    }


    public function setMuestraSerie(Request $request){
        $id = $request->muestra_id;
        $muestra = Muestra::find($id);
        $muestra->lote_codigo = $request->lote_codigo;
        $muestra->estado_muestra_id = $request->estado_muestra_id;
        $muestra->save();



        $rules = [
            'lote_codigo' => 'required|numeric',
        ];

        $messages = [
            'lote_codigo.required' => 'Lote Codigo / Serie es obligatorio.',
            'lote_codigo.numeric' => 'Lote Codigo / Serie debe ser un número.',
        ];

        $this->validate($request, $rules, $messages);
        Session::flash('message','Numero de pallet / serie! asociado con exito.');
        return redirect::to('muestra-4/'.$muestra->muestra_id);
    }


    /**
     * 
     * FUNCIONES PARA LA APLICACION 
     * 
     */


     public function index_for_app (Request $request) {

        #$muestras = Muestra::all();
        $muestras = Muestra::with([
            'region', 
            'productor', 
            'especie', 
            'variedad', 
            'calibre', 
            'categoria', 
            'embalaje', 
            'etiqueta', 
            'nota', 
            'estado_muestra', 
            'apariencia'
        ])->get();
        return response()->json([
            'status' => 200,
            'msj' => 'ok',
            'muestras' => $muestras
        ]);

     }



     public function GetReporteConsolidado(){
        set_time_limit(0);
        $statement = 'SELECT m.muestra_id
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
        , m.`lote_codigo`';
        $consolidado = DB::select(DB::raw($statement));
        
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
        $sheet->setCellValue('AA1','PALLET');
        
                
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
            $sheet->setCellValue('AA'.$i,$c->lote_codigo);
            $i++;
        }

        $writer = new Xlsx($spreadsheet);
        $writer->save('reporte.xlsx');
        return redirect::to('reporte.xlsx');

     }



}
