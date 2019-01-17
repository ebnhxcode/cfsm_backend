<?php

namespace App\DataTables;

use App\User;
use Yajra\DataTables\Services\DataTable;
use App\Muestra;
use Carbon\Carbon;
use Gate;

class ReporteDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables($query)
            ->editColumn('region', function($query) {
                return $query->region->region_nombre;
            })
            ->editColumn('productor', function($query) {
                return $query->productor->productor_nombre;
            })
            ->editColumn('especie', function($query) {
                return $query->especie->especie_nombre;
            })
            ->editColumn('variedad', function($query) {
                return $query->variedad->variedad_nombre;
            })
            ->editColumn('calibre', function($query) {
                return $query->calibre->calibre_nombre;
            })
            ->editColumn('embalaje', function($query) {
                return $query->embalaje->embalaje_nombre;
            })
            ->editColumn('etiqueta', function($query) {
                return $query->etiqueta->etiqueta_nombre;
            })
            ->editColumn('nota', function($query) {
                return $query->nota->nota_nombre;
            })
            ->editColumn('estado', function($query) {
                return $query->estado_muestra->estado_muestra_nombre;
            })
            ->addColumn('action', function ($query) {
                return '
                <a href="'.route('muestras.edit',$query->muestra_id).'" class="btn btn-sm mb-1 btn-warning"><i class="glyphicon glyphicon-edit"></i> Editar </a>
                <br>
                <a href="'.route('muestras.show',$query->muestra_id).'" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-edit"></i> Detalle </a>
                ';
            })
            ->addColumn('responsive', function ($query) {
                
            });
            /*->editColumn('lote_codigo', function($query) {
                return $query->lote->lote_codigo;
            });*/
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Muestra $model)
    {
        set_time_limit(0);
        //CONTRUCCION DE BUSQUEDA SQL SEGUN PARAMETROS ENVIADOS POR POST
        $query = $model->with('region','productor','especie','variedad','calibre','embalaje','etiqueta','nota','estado_muestra')
        ->orderBy('muestra_id', 'DESC');;

        //Fecha en que fue entregado el producto
        if ($this->request()->get('desde') && !$this->request()->get('hasta')) {
            $date = Carbon::parse($this->request()->get('desde'))->toDateTimeString();
            $query->where('muestra_fecha', '>=', $date);
        } elseif (!$this->request()->get('desde') && $this->request()->get('hasta')) {
            $date = Carbon::parse($this->request()->get('hasta'))->toDateTimeString();
            $query->where('muestra_fecha', '<=', $date);
        } elseif ($this->request()->get('desde') && $this->request()->get('hasta')) {
            $dateFrom = Carbon::parse($this->request()->get('desde'))->toDateTimeString();
            $dateTo = Carbon::parse($this->request()->get('hasta'))->toDateTimeString();
            $query->whereBetween('muestra_fecha', [$dateFrom, $dateTo]);
        }

        if ($this->request()->productor != '') {
            $query->where('productor_id', '=', $this->request()->productor);
        }
        if ($this->request()->especie != '') {
            $query->where('especie_id', '=', $this->request()->especie);
        }
        if ($this->request()->variedad != '') {
            $query->where('variedad_id', '=', $this->request()->variedad);
        }
        if ($this->request()->calibre != '') {
            $query->where('calibre_id', '=', $this->request()->calibre);
        }
        if ($this->request()->etiqueta != '') {
            $query->where('etiqueta_id', '=', $this->request()->etiqueta);
        }
        if ($this->request()->muestra_qr != '') {
            $query->where('muestra_qr', '=', $this->request()->muestra_qr);
        }

        //return $model->newQuery()->select('id', 'add-your-columns-here', 'created_at', 'updated_at');
        return $query;
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->parameters($this->getBuilderParameters());
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'responsive'        => ['title' => '', 'searchable' => false, 'orderable' => false, 'exportable' => false],
            'action'            => ['name'  => 'action', 'title' => 'Opciones', 'exportable' => false],
            'muestra_id'        => ['name'  => 'muestra_id', 'title' => 'ID'],
            'muestra_fecha'     => ['name'  => 'muestra_fecha', 'title' => 'Fecha'],
            'muestra_qr'        => ['name'  => 'muestra_qr', 'title' => 'QR'],
            'region'            => ['name'  => 'region.region_nombre', 'title' => 'Región'],
            'productor'         => ['name'  => 'productor.productor_nombre', 'title' => 'Productor'],
            'especie'           => ['name'  => 'especie.especie_nombre', 'title' => 'Especie'],
            'variedad'          => ['name'  => 'variedad.variedad_nombre', 'title' => 'Variedad'],
            'calibre'           => ['name'  => 'calibre.calibre_nombre', 'title' => 'Calibre'],
            'embalaje'          => ['name'  => 'embalaje.embalaje_nombre', 'title' => 'Embalaje'],
            'etiqueta'          => ['name'  => 'etiqueta.etiqueta_nombre', 'title' => 'Etiqueta'],
            'nota'              => ['name'  => 'nota.nota_nombre', 'title' => 'Nota'],
            'estado'            => ['name'  => 'estado_muestra.estado_muestra_nombre', 'title' => 'Estado'],
            'muestra_cajas'     => ['name'  => 'muestra_cajas', 'title' => 'Cajas'],
            //'lote_codigo'       => ['name'  => 'lote_codigo', 'title' => 'Lote Código'],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Reporte_' . date('YmdHis');
    }

    protected function getBuilderParameters()
    {
        return [
            'dom'     => "<'row'<'col-sm-6'l><'col-sm-6'f>><'row'<'col-sm-12'tr>><'row'<'col-sm-4'i><'col-sm-4 text-center'B><'col-sm-4'p>>",
            'buttons' => [
                'excel',
                'csv',
                //'pdf',
                [
                    'extend' => 'print',
                    'text' => '<i class="fa fa-print"></i> Imprimir'
                ],
                'reset',
            ],
        ];
    }
}
