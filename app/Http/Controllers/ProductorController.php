<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Productor;
use yajra\Datatables\Datatables;

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

    public function productoresDatetables(){
        /*return datatables()
        ->eloquent(Productor::select('productor_id','productor_nombre','region_id')
        ->with(['region']))
        ->toJson();*/

        ///$orders = Orders::with('customer','carrier','orderState','orderDetails','orderDetails.product.supplier')->get();
        $productores = Productor::select('productor_id','productor_nombre','region_id')->with('region')->get();


        return Datatables::of($productores)
            ->addColumn('action', function ($productores) {
                return '<a href="'.route('productores.show',$productores->productor_id).'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Ver</a>
                    <a href="'.route('productores.edit',$productores->productor_id).'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Editar</a>';
            })
            ->make(true);
    }
}
