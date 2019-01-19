<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Productor;
use App\Variedad;
use App\Region;
use App\Especie;
use App\Etiqueta;
use App\Calibre;
use App\Categoria;
use App\Embalaje;
use App\EstadoMuestra;
use App\Nota;
use App\Defecto;
use App\Tolerancia;
use App\ZonaDefecto;
use App\Apariencia;
use App\Grupo;

class ApiController extends Controller
{
    public function __construct(){
        #$this->middleware('auth.basic');
        $this->middleware('admin');
    }


    public function getDataControlCalidad () {
        $productores = Productor::all();
        $regiones = Region::all();
        $especies = Especie::all();
        $variedades = Variedad::all();
        $etiquetas = Etiqueta::all();
        $calibres = Calibre::all();
        $categorias = Categoria::all();
        $embalajes = Embalaje::all();
        $estados_muestras = EstadoMuestra::all();
        $notas = Nota::all();
        $defectos = Defecto::all();
        $tolerancias = Tolerancia::all();
        $apariencias = Apariencia::all();
        $grupos = Grupo::all();
        $zonas_defectos = ZonaDefecto::all();
        return response()->json([
            'status' => 200,
            'msg' => 'ok',
            'productores' => $productores,
            'regiones' => $regiones,
            'especies' => $especies,
            'variedades' => $variedades,
            'etiquetas' => $etiquetas,
            'calibres' => $calibres,
            'categorias' => $categorias,
            'embalajes' => $embalajes,
            'estados_muestras' => $estados_muestras,
            'notas' => $notas,
            'defectos' => $defectos,
            'tolerancias' => $tolerancias,
            'apariencias' => $apariencias,
            'grupos' => $grupos,
            'zonas_defectos' => $zonas_defectos
        ]);

    }

    public function getProductores(){
        //$regiones = Region::lists('region_nombre', 'region_id');
        $productores = Productor::all();
        if(!empty($productores)){
            $array = ['status' => 200,
            'msg'=> 'Ok',
            'productores' => $productores,
            ];
        }else{
            $array = ['status' => 150,
            'msg'=> 'Error',
            ];
        }
        return response()->json($array);
    }

    public function getRegiones(){
        //$regiones = Region::lists('region_nombre', 'region_id');
        $regiones = Region::all();
        if(!empty($regiones)){
            $array = ['status' => 200,
            'msg'=> 'Ok',
            'regiones' => $regiones,
            ];
        }else{
            $array = ['status' => 150,
            'msg'=> 'Error',
            ];
        }
        return response()->json($array);
    }

    public function getEspecies(){
        $especies = Especie::all();
        if(!empty($especies)){
            $array = ['status' => 200,
            'msg'=> 'Ok',
            'especies' => $especies,
            ];
        }else{
            $array = ['status' => 150,
            'msg'=> 'Error',
            ];
        }
        return response()->json($array);
    }

    public function getVariedades(){
        //$regiones = Region::lists('region_nombre', 'region_id');
        $variedades = Variedad::all();
        if(!empty($variedades)){
            $array = ['status' => 200,
            'msg'=> 'Ok',
            'variedades' => $variedades,
            ];
        }else{
            $array = ['status' => 150,
            'msg'=> 'Error',
            ];
        }
        return response()->json($array);
    }

    public function getEtiquetas(){
        $etiquetas = Etiqueta::all();
        if(!empty($etiquetas)){
            $array = ['status' => 200,
            'msg'=> 'Ok',
            'etiquetas' => $etiquetas,
            ];
        }else{
            $array = ['status' => 150,
            'msg'=> 'Error',
            ];
        }
        return response()->json($array);
    }

    public function getCalibres(){
        $result = Calibre::all();
        if(!empty($result)){
            $array = ['status' => 200,
            'msg'=> 'Ok',
            'calibres' => $result,
            ];
        }else{
            $array = ['status' => 150,
            'msg'=> 'Error',
            ];
        }
        return response()->json($array);
    }

    public function getCategorias(){
        $result = Categoria::all();
        if(!empty($result)){
            $array = ['status' => 200,
            'msg'=> 'Ok',
            'categorias' => $result,
            ];
        }else{
            $array = ['status' => 150,
            'msg'=> 'Error',
            ];
        }
        return response()->json($array);
    }

    public function getEmbalajes(){
        $result = Embalaje::all();
        if(!empty($result)){
            $array = ['status' => 200,
            'msg'=> 'Ok',
            'embalajes' => $result,
            ];
        }else{
            $array = ['status' => 150,
            'msg'=> 'Error',
            ];
        }
        return response()->json($array);
    }

    public function getEstadosMuestra(){
        $result = EstadoMuestra::all();
        if(!empty($result)){
            $array = ['status' => 200,
            'msg'=> 'Ok',
            'estados_muestras' => $result,
            ];
        }else{
            $array = ['status' => 150,
            'msg'=> 'Error',
            ];
        }
        return response()->json($array);
    }

    public function getNotas(){
        $result = Nota::all();
        if(!empty($result)){
            $array = ['status' => 200,
            'msg'=> 'Ok',
            'notas' => $result,
            ];
        }else{
            $array = ['status' => 150,
            'msg'=> 'Error',
            ];
        }
        return response()->json($array);
    }

    public function loginUsuario(){
        $array = ['status' => 200,
            'msg'=> 'OK',
            ];
        return response()->json($array);

    }

    public function getDefectos(){
        $result = Defecto::all();
        if(!empty($result)){
            $array = ['status' => 200,
            'msg'=> 'Ok',
            'defectos' => $result,
            ];
        }else{
            $array = ['status' => 150,
            'msg'=> 'Error',
            ];
        }
        return response()->json($array);
    }

    
    public function getTolerancias(){
        $result = Tolerancia::all();
        if(!empty($result)){
            $array = ['status' => 200,
            'msg'=> 'Ok',
            'tolerancias' => $result,
            ];
        }else{
            $array = ['status' => 150,
            'msg'=> 'Error',
            ];
        }
        return response()->json($array);
    }

    public function getApariencias(){
        $result = Apariencia::all();
        if(!empty($result)){
            $array = ['status' => 200,
            'msg'=> 'Ok',
            'apariencias' => $result,
            ];
        }else{
            $array = ['status' => 150,
            'msg'=> 'Error',
            ];
        }
        return response()->json($array);
    }

    public function getGrupos(){
        $result = Grupo::all();
        if(!empty($result)){
            $array = ['status' => 200,
            'msg'=> 'Ok',
            'grupos' => $result,
            ];
        }else{
            $array = ['status' => 150,
            'msg'=> 'Error',
            ];
        }
        return response()->json($array);
    }

    public function getZonaDefecto(){
        $result = ZonaDefecto::all();
        if(!empty($result)){
            $array = ['status' => 200,
            'msg'=> 'Ok',
            'zonas_defectos' => $result,
            ];
        }else{
            $array = ['status' => 150,
            'msg'=> 'Error',
            ];
        }
        return response()->json($array);
    }



}
