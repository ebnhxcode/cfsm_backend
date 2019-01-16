<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Variedad;
use App\Especie;

class VariedadController extends Controller
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
        return view("admin.variedades.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $especies = Especie::orderBy('especie_nombre')->pluck('especie_nombre','especie_id');
        return view('admin.variedades.agregar', compact('especies'));
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
        $variedad = new Variedad();
        $variedad->variedad_nombre = $request->variedad_nombre;
        $variedad->especie_id = $request->especie_id;
        $variedad->save();
        Session::flash('message','registro agregado correctamente:'.$request->variedad_nombre);
        return redirect::to('variedades');

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
        $variedad = Variedad::find($id);
        $especies = Especie::orderBy('especie_nombre')->pluck('especie_nombre','especie_id');
        return view('admin.variedades.editar', compact('variedad','especies'));
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
        $variedad = Variedad::find($id);
        $variedad->variedad_nombre = $request->variedad_nombre;
        $variedad->especie_id = $request->especie_id;
        $variedad->save();
        Session::flash('message','registro actualizado correctamente:'.$request->variedad_nombre);
        return redirect::to('variedades');
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

    public function variedadesDatetables(){
        $variedades = Variedad::select('variedad_id','variedad_nombre','especie_id')->with('especie')->get();
        return Datatables::of($variedades)
            ->addColumn('action', function ($variedades) {
                return '
                    <a href="'.route('variedades.edit',$variedades->variedad_id).'" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-edit"></i> Editar </a>
                    ';
            })
            ->make(true);
            #<a href="'.url('variedadesDelete/'.$variedades->variedad_id).'" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-edit"></i> Eliminar </a>

    }

    public function variedadesDelete($id){
        Variedad::destroy($id);
        //cambiar estado
        return  view("admin.variedades.index");
    }
}
