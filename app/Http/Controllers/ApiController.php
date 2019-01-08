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

class ApiController extends Controller
{

    /*
    public function __construct(){
        $this->middleware('auth.basic');
    }
    */

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
            ' estados_muestra' => $result,
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
            ' notas' => $result,
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





}
