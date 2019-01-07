<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Productor;
use App\Region;
use yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class ProductorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.productores.index");
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
        return view('admin.productores.agregar', compact('regiones'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $productor = new Productor();
        $productor->productor_nombre = $request->productor_nombre;
        $productor->region_id = $request->region_id;
        $productor->save();
        return view("admin.productores.index");
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
        $productor = Productor::find($id);
        $regiones = Region::orderBy('region_nombre')->pluck('region_nombre','region_id');
        return view('admin.productores.editar', compact('productor','regiones'));
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
        $productor = Productor::find($id);
        $productor->productor_nombre = $request->productor_nombre;
        $productor->region_id  = $request->region_id;
        $productor->save();
        Session::flash('message','Resultado actualizado');
        return redirect::to('productores');
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
        return "aaaa";
    }

    public function productoresDatetables(){
        /*return datatables()
        ->eloquent(Productor::select('productor_id','productor_nombre','region_id')
        ->with(['region']))
        ->toJson();*/

        ///$orders = Orders::with('customer','carrier','orderState','orderDetails','orderDetails.product.supplier')->get();
        $productores = Productor::select('productor_id','productor_nombre','region_id')->with('region')->get();

        return Datatables::of($productores)
            ->addColumn('action', function ($productores) {
                return '
                    <a href="'.route('productores.edit',$productores->productor_id).'" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-edit"></i> Editar </a>
                    <a href="'.url('productoresDelete/'.$productores->productor_id).'" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-edit"></i> Eliminar </a>
                    ';
            })
            ->make(true);
    }

    public function productoresDelete($id){
        Productor::destroy($id);
        return  view("admin.productores.index");
    }
}
