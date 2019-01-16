<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tolerancia;
use App\Defecto;
use App\Categoria;
use App\Nota;
use yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class ToleranciaController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view("admin.tolerancias.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $defectos = Defecto::orderBy('defecto_nombre')->pluck('defecto_nombre','defecto_id');
        $notas = Nota::orderBy('nota_nombre')->pluck('nota_nombre','nota_id');
        $categorias = Categoria::orderBy('categoria_nombre')->pluck('categoria_nombre','categoria_id');

        return view("admin.tolerancias.agregar",compact('defectos','notas','categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //VERIFICAR QUE NO EXISTA UN VALOR EN EL RANGO DE NOTA, DEFECTO,CATEGORIA

        $tolerancia = new Tolerancia();
        $tolerancia->tolerancia_desde = $request->tolerancia_desde;
        $tolerancia->tolerancia_hasta = $request->tolerancia_hasta;
        $tolerancia->defecto_id  = $request->defecto_id;
        $tolerancia->nota_id  = $request->nota_id;
        $tolerancia->categoria_id  = $request->categoria_id;
        $tolerancia->save();
        return view("admin.tolerancias.index");

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
        $tolerancia = Tolerancia::find($id);
        $defectos = Defecto::orderBy('defecto_nombre')->pluck('defecto_nombre','defecto_id');
        $notas = Nota::orderBy('nota_nombre')->pluck('nota_nombre','nota_id');
        $categorias = Categoria::orderBy('categoria_nombre')->pluck('categoria_nombre','categoria_id');

        return view("admin.tolerancias.editar",compact('defectos','notas','categorias','tolerancia'));
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
        $tolerancia = Tolerancia::find($id);
        $tolerancia->tolerancia_desde = $request->tolerancia_desde;
        $tolerancia->tolerancia_hasta = $request->tolerancia_hasta;
        $tolerancia->defecto_id  = $request->defecto_id;
        $tolerancia->nota_id  = $request->nota_id;
        $tolerancia->categoria_id  = $request->categoria_id;
        $tolerancia->save();
        $tolerancia->save();
        return view("admin.tolerancias.index");
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


    public function toleranciasDatetables(){
        $tolerancias = Tolerancia::select('tolerancia_id','tolerancia_desde','tolerancia_hasta','categoria_id','defecto_id','nota_id')->with('categoria','defecto','nota')->get();
        return Datatables::of($tolerancias)
        ->addColumn('action', function ($tolerancias) {
            return '
                <a href="'.route('tolerancias.edit',$tolerancias->tolerancia_id).'" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-edit"></i> Editar </a>
                <a href="'.url('toleranciasDelete/'.$tolerancias->tolerancia_id).'" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-edit"></i> Eliminar </a>
                ';
        })
        ->make(true);


    }

    public function toleranciasDelete($id){
        Tolerancia::destroy($id);
        //cambiar estado
        return  view("admin.tolerancias.index");
    }
}
