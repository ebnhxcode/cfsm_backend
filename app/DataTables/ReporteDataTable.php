<?php

namespace App\DataTables;

use App\User;
use Yajra\DataTables\Services\DataTable;
use App\Muestra;

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
            ->addColumn('action', 'reportedatatable.action')
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
            ->editColumn('lote_codigo', function($query) {
                return $query->lote->lote_codigo;
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Muestra $model)
    {
        //return $model->newQuery()->select('id', 'add-your-columns-here', 'created_at', 'updated_at');
        return $model->with('region','productor','especie','variedad','calibre','embalaje','etiqueta','nota','estado_muestra','lote');
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
                    ->addAction(['width' => '80px'])
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
            'muestra_imagen'    => ['name'  => 'muestra_imagen', 'title' => 'Imagen'],
            'nota'              => ['name'  => 'nota.nota_nombre', 'title' => 'Nota'],
            'estado'            => ['name'  => 'estado_muestra.estado_muestra_nombre', 'title' => 'Estado'],
            'muestra_cajas'     => ['name'  => 'muestra_cajas', 'title' => 'Cajas'],
            'lote_id'           => ['name'  => 'lote_id', 'title' => 'Lote'],
            'lote_codigo'       => ['name'  => 'lote.lote_codigo', 'title' => 'Lote Código'],
            //'add your columns',
            /*'created_at',
            'updated_at'*/
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
            /*'dom'     => "<'row'<'col-sm-6'l><'col-sm-6'f>><'row'<'col-sm-12'tr>><'row'<'col-sm-4'i><'col-sm-4 text-center'B><'col-sm-4'p>>",
            'order'   => [[0, 'asc']],
            'buttons' => [
                'excel',
                //'print',
                [
                    'extend' => 'print',
                    'text' => '<i class="fa fa-print"></i> Imprimir'
                ],
                'reset',
            ],*/
            'dom'     => "<'row'<'col-sm-6'l><'col-sm-6'f>><'row'<'col-sm-12'tr>><'row'<'col-sm-4'i><'col-sm-4 text-center'B><'col-sm-4'p>>",
            'buttons' => [
                'excel',
                [
                    'extend' => 'print',
                    'text' => '<i class="fa fa-print"></i> Imprimir'
                ],
                'reset',
            ],
            
        ];
    }
}
