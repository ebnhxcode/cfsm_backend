<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Embalaje;
use App\Categoria;
use yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class EmbalajeController extends Controller
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
        return view('admin.embalajes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::orderBy('categoria_nombre')->pluck('categoria_nombre','categoria_id');
        return view('admin.embalajes.agregar', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $embalaje = new Embalaje();
        $embalaje->embalaje_nombre = $request->embalaje_nombre;
        $embalaje->categoria_id = $request->categoria_id;
        $embalaje->save();
        return view("admin.embalajes.index");
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
        $embalaje = Embalaje::find($id);
        $categorias = Categoria::orderBy('categoria_nombre')->pluck('categoria_nombre','categoria_id');
        return view('admin.embalajes.editar', compact('categorias','embalaje'));
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
        $embalaje = Embalaje::find($id);
        $embalaje->embalaje_nombre  = $request->embalaje_nombre;
        $embalaje->categoria_id = $request->categoria_id;
        $embalaje->save();
        return view("admin.embalajes.index");
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

    public function embalajesDatetables(){
        $embalajes = Embalaje::select('embalaje_id','embalaje_nombre','categoria_id')->with('categoria')->get();
        return Datatables::of($embalajes)
            ->addColumn('action', function ($embalajes) {
                return '
                    <a href="'.route('embalajes.edit',$embalajes->embalaje_id).'" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-edit"></i> Editar </a>

                    ';
            })
            ->make(true);
            # <a href="'.url('embalajesDelete/'.$embalajes->embalaje_id).'" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-edit"></i> Eliminar </a>
    }

    public function embalajesDelete($id){
        Embalaje::destroy($id);
        //cambiar estado
        return  view("admin.embalajes.index");
    }


}
