<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Etiqueta;
use yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class EtiquetaController extends Controller
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
        return view("admin.etiquetas.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.etiquetas.agregar");
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
        $etiqueta = new Etiqueta();
        $etiqueta->etiqueta_nombre = $request->etiqueta_nombre;
        $etiqueta->save();
        return view("admin.etiquetas.index");
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
        $etiqueta = Etiqueta::find($id);
        return view('admin.etiquetas.editar', compact('etiqueta'));
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
        $etiqueta = Etiqueta::find($id);
        $etiqueta->etiqueta_nombre = $request->etiqueta_nombre;
        $etiqueta->save();
        return view("admin.etiquetas.index");
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


    public function etiquetasDatetables(){
        //$etiquetas = Etiqueta::select('etiqueta_id','etiqueta_nombre')->get();
            return datatables()->eloquent(Etiqueta::query())
            ->addColumn('action', function ($etiquetas) {
                return '
                    <a href="'.route('etiquetas.edit',$etiquetas->etiqueta_id).'" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-edit"></i> Editar </a>
                    <a href="'.url('etiquetasDelete/'.$etiquetas->etiqueta_id).'" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-edit"></i> Eliminar </a>
                    ';
            })
            ->make(true);
            //datatables()->eloquent(Etiqueta::query())->toJson();
    }

    public function etiquetasDelete($id){
        Etiqueta::destroy($id);
        //cambiar estado
        return  view("admin.etiquetas.index");
    }
}
