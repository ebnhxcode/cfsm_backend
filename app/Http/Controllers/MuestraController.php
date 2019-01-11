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
        $regiones = Region::orderBy('region_nombre')->pluck('region_nombre','region_id');
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
