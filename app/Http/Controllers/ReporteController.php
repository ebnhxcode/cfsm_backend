<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\ReporteDataTable;

class ReporteController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }
    public function index(ReporteDataTable $dataTable)
    {
        return $dataTable->render('admin.reportes.index');
        //return view('admin.reportes.index');
    }
}
