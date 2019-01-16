<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Calibre;
use App\Especie;

class CalibreController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
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
        return view("admin.calibres.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $especies = Especie::orderBy('especie_nombre')->pluck('especie_nombre','especie_id');
        return view('admin.calibres.agregar', compact('especies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $calibre = new Calibre();
        $calibre->calibre_nombre = $request->calibre_nombre;
        $calibre->especie_id = $request->especie_id;
        $calibre->save();
        return view("admin.calibres.index");
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
        $calibre = Calibre::find($id);
        $especies = Especie::orderBy('especie_nombre')->pluck('especie_nombre','especie_id');
        return view('admin.calibres.editar', compact('calibre','especies'));

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
        $calibre = Calibre::find($id);
        $calibre->calibre_nombre = $request->calibre_nombre;
        $calibre->especie_id = $request->especie_id;
        $calibre->save();
        return view('admin.calibres.index');

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
    public function calibresDatetables(){
        $calibres = Calibre::select('calibre_id','calibre_nombre','especie_id')->with('especie')->get();
        return Datatables::of($calibres)
            ->addColumn('action', function ($calibres) {
                return '
                    <a href="'.route('calibres.edit',$calibres->calibre_id).'" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-edit"></i> Editar </a>

                    ';
            })
            ->make(true);
            # <a href="'.url('calibresDelete/'.$calibres->calibre_id).'" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-edit"></i> Eliminar </a>
    }

    public function calibresDelete($id){
        Calibre::destroy($id);
        //cambiar estado
        return  view("admin.calibres.index");
    }
}
