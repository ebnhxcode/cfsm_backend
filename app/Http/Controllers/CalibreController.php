<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
#use App\Http\Controllers\Controller;
use App\Calibre;

class CalibreController extends Controller
{
    private $validacion;
    private $calibres;
    private $nombre_modelo;
    private $ruta;
    private $rutas;

    public function __construct () {
        $this->nombre_modelo = "Calibre";
        $this->ruta = "calibres";
        $this->rutas = "calibres";
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->calibres = Calibre::all();
        if ($request->wantsJson() || $request->ajax() || $request->isXmlHttpRequest()) {
            return response()->json($this->calibres);
        }

        $this->calibres = count($this->calibres) > 0 ? $this->calibres : 'Sin resultados';
        return view('calibres.index', ['calibres'=>$this->calibres]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('calibres.create');
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
        $this->validacion = Validator::make($request->all(), [
            'calibre_nombre' => "required|regex:/(^([a-zA-Z0-9_ ]+)(\d+)?$)/u|max:255",
            'especie_id' => "required|regex:/(^([0-9]+)(\d+)?$)/u|max:255",
         ]);
        #Se valida la respuesta con la salida de la validacion
        if ($this->validacion->fails() == true) {
            return response()->json([
               'status' => 200,
               'tipo' => 'errores_campos_requeridos', //Para las notificaciones
               'mensajes' => $this->validacion->messages(), //Para mostrar los mensajes que van desde el backend
            ]);
        }

        $this->calibre = $request->all();
        #Se crea el nuevo registro
        $this->nuevo_calibre = Calibre::create([
           'calibre_nombre' => $this->calibre['calibre_nombre'],
           'especie_id' => $this->calibre['especie_id'],
           #'id_usuario_registra' => Auth::user()->id,
           #'id_usuario_modifica' => Auth::user()->id,
        ]);

        unset($this->calibre, $this->validacion);

        return response()->json([
           'status' => 200, //Para los popups con alertas de sweet alert
           'tipo' => 'creacion_exitosa', //Para las notificaciones
           'mensajes' => ["nuevo_$this->nombre_modelo" => [0=>"Registro ($this->nombre_modelo) creado exitosamente."]],
            //Para mostrar los mensajes que van desde el backend
           'servicio' => $this->new_servicio
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        #return view('', $id)
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
}
