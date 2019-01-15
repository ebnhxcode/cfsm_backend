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
use yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Tolerancia;
use App\MuestraDefecto;

class MuestraController extends Controller
{
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
        $regiones = Region::orderBy('region_nombre')->get();
        $especies = Especie::orderBy('especie_nombre')->pluck('especie_nombre','especie_id');
        $variedades = Variedad::orderBy('variedad_nombre')->pluck('variedad_nombre','variedad_id');
        $calibres = Calibre::orderBy('calibre_nombre')->pluck('calibre_nombre','calibre_id');
        $categorias = Categoria::orderBy('categoria_nombre')->pluck('categoria_nombre','categoria_id');
        $embalajes = Embalaje::orderBy('embalaje_nombre')->pluck('embalaje_nombre','embalaje_id');
        $etiquetas = Etiqueta::orderBy('etiqueta_nombre')->pluck('etiqueta_nombre','etiqueta_id');

        return view('admin.muestras.agregar', compact('regiones','especies','variedades','calibres','categorias','embalajes','etiquetas'));
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
            'muestra_qr' => 'required|unique:muestra|max:255',
            'region_id' => 'required',
            'productor_id' => 'required',
            'especie_id' => 'required',
            'variedad_id' => 'required',
            'calibre_id' => 'required',
            'categoria_id' => 'required',
            'embalaje_id' => 'required',
            'etiqueta_id' => 'required',
        ];

        $messages = [
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
        ];

        $this->validate($request, $rules, $messages);

        $muestra = new Muestra();
        $muestra->muestra_qr = $request->muestra_qr;
        $muestra->region_id = $request->region_id;
        $muestra->productor_id = $request->productor_id;
        $muestra->especie_id = $request->especie_id;
        $muestra->variedad_id = $request->variedad_id;
        $muestra->calibre_id = $request->calibre_id;
        $muestra->categoria_id = $request->categoria_id;
        $muestra->embalaje_id = $request->embalaje_id;
        $muestra->etiqueta_id = $request->etiqueta_id;
        #$muestra->muestra_peso = $request->muestra_peso;
        $muestra->muestra_peso = 0;
        $muestra->muestra_fecha = Carbon::parse($request->muestra_fecha)->toDateTimeString();
        $muestra->nota_id = 1; //PROCESO
        $muestra->estado_muestra_id = 1;

        #dd($muestra->productor_id);
        $muestra->save();

        return redirect::to('muestra-2/'.$muestra->muestra_id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $conceptos = Concepto::all();
        $muestra = Muestra::find($id);

        return view('admin.muestras.muestrashow',compact('conceptos'));



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
        //dd($productores);
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

        #dd($apariencias);

        return view('admin.muestras.paso2.agregar',compact('conceptos','apariencias','muestra'));



    }
    public function  paso2(Request $request){
        $rules = [
            'muestra_peso' => 'required|numeric',
            'muestra_desgrane' => 'required|numeric',
            'apariencia_id' => 'required',
            'muestra_bolsas' => 'required|numeric',
            'muestra_racimos' => 'required|numeric',
            'muestra_brix' => 'required|numeric',
            'muestra_cajas' => 'required|numeric',
        ];

        $messages = [
            'muestra_peso.required' => 'Peso es obligatorio.',
            'muestra_peso.numeric' => 'Peso debe ser un número.',
            'apariencia_id.required' => 'Apariencia es obligatorio',
            'muestra_desgrane.required' => 'Desgrane es obligatorio.',
            'muestra_desgrane.numeric' => 'Desgrane debe ser un número.',
            'muestra_bolsas.required' => 'Bolsas es obligatorio.',
            'muestra_bolsas.numeric' => 'Bolsas debe ser un número.',
            'muestra_racimos.required' => 'Racimos es obligatorio.',
            'muestra_racimos.numeric' => 'Racimos debe ser un número.',
            'muestra_brix.required' => 'Brix es obligatorio.',
            'muestra_brix.numeric' => 'Brix debe ser un número.',
            'muestra_cajas.required' => 'Cajas es obligatorio.',
            'muestra_cajas.numeric' => 'Cajas debe ser un número.',
        ];

        $this->validate($request, $rules, $messages);
        $muestra = Muestra::find($request->muestra_id);

        $muestra->muestra_peso = $request->muestra_peso;
        $muestra->muestra_desgrane = $request->muestra_desgrane;
        $muestra->apariencia_id = $request->apariencia_id;
        $apariencianota = Apariencia::find($muestra->apariencia_id);
        $muestra->nota_id = $apariencianota->nota_id;
        $muestra->muestra_bolsas = $request->muestra_bolsas;
        $muestra->muestra_racimos = $request->muestra_racimos;
        $muestra->muestra_brix = $request->muestra_brix;
        $muestra->muestra_cajas = $request->muestra_cajas;
        $muestra->save();
        return redirect::to('muestra-3/'.$muestra->muestra_id);



    }

    public function muestraStep3($id){
        $muestra = Muestra::find($id);
        $conceptos = Concepto::all();
        $nota = Nota::find($muestra->nota_id);
        $muestras_defecto = MuestraDefecto::where('muestra_id',$id)->get();
        $defecto_nota_calidad = MuestraDefecto::select('nota_id')
        ->join('defecto', 'defecto.defecto_id', '=', 'muestra_defecto.defecto_id')
        ->join('nota', 'nota.nota_id', '=', 'muestra_defecto.nota_id')
        ->where('muestra_defecto.muestra_id',$id)
        ->where('defecto.concepto_id','1')
        ->max('nota.nota_id');
        $nota_calidad = Nota::find($defecto_nota_calidad);
        if(isset($nota_calidad->nota_nombre)){
            $nota_calidad_nombre = $nota_calidad->nota_nombre;
            $nota_calidad_id = $nota_calidad->nota_id;
        }else{
            $nota_calidad_nombre = 'A';
            $nota_calidad_id = 1;
        }

        $defecto_nota_condicion = MuestraDefecto::select('nota_id')
        ->join('defecto', 'defecto.defecto_id', '=', 'muestra_defecto.defecto_id')
        ->join('nota', 'nota.nota_id', '=', 'muestra_defecto.nota_id')
        ->where('muestra_defecto.muestra_id',$id)
        ->where('defecto.concepto_id','2')
        ->max('nota.nota_id');

        $nota_condicion = Nota::find($defecto_nota_condicion);
        if(isset($nota_condicion->nota_nombre)){
            $nota_condicion_nombre = $nota_condicion->nota_nombre;
            $nota_condicion_id = $nota_condicion->nota_id;
        }else{
            $nota_condicion_nombre = 'A';
            $nota_condicion_id = 1;
        }
       

        $nota_general = max($nota_condicion_id,$nota_calidad_id,$nota->nota_id);
        $nota = Nota::find($nota_general);
        #dd($muestra);
        return view('admin.muestras.paso3.index',compact('conceptos','muestra','nota','muestras_defecto','nota_calidad_nombre','nota_condicion_nombre'));
    }

    public function  paso3(Request $request){
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
            $muestra_defecto_valor=0;
        }
        //return response()->json(1);
        #print_r($tolerancia->nota->nota_nombre);
        
        try {
            $muestra_defecto = New MuestraDefecto();
            $muestra_defecto->muestra_id = $request->muestra_id;
            $muestra_defecto->defecto_id = $request->defecto_id;
            $muestra_defecto->muestra_defecto_valor = $request->muestra_defecto_valor;
            $muestra_defecto->nota_id = $nota->nota_id;
            $muestra_defecto->save();
            echo 'registrado con exito';
        }
          catch (Exception $e) {
              return $e->getMessage();
        }

    }

    public function getDefectosByConcepto(Request $request){
        $concepto_id = $request->concepto_id;
        $arrayDefectos = array();
        $defectos  = Defecto::where('concepto_id', $concepto_id)->get();
        //dd($productores);
        foreach($defectos as $p){
                    array_push($arrayDefectos, array( 'id' =>$p->defecto_id,
                        'nombre' => $p->defecto_nombre)
                    );
        }
        return response()->json($arrayDefectos);
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
            $muestra_defecto_valor=0;
        }
        //return response()->json(1);
        #print_r($tolerancia->nota->nota_nombre);
        echo $nota->nota_nombre;
    }

}
