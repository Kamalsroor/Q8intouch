<?php

namespace App\DataTables;

use App\Appointment;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Http\Request;

class AppointmentsDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query, Request $request)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', 'appointments.action')
            ->addColumn('name',function($query){
                return $query->user_id > 0 ? $query->user->name : $query->name;
             })
            ->addColumn('phone_number',function($query){
                return $query->user_id > 0 ? $query->user->phone_number : $query->phone_number;
             })
            ->addColumn('civil_id',function($query){
                return $query->user_id > 0 ? $query->user->civil_id : $query->civil_id;
             })
            ->addColumn('specialist',function($query){
                return isset($query->admin_id) ? $query->admin->name : "";
             })
             ->filterColumn('date', function ($query, $keywords) use ($request) {
                if (!$request->has('date')) {
                    return; //ignore if there are no dates
                }
                $query->whereDate('date','=', $request->date);
            })
            ->rawColumns(['action']);

    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\App\Appointment $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Appointment $model)
    {
        return $model->where('date' , $this->request->date)->with('user','admin')->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('appointments-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(0)
                    ->buttons(
                        Button::make('create'),
                        Button::make('export'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('id'),
            Column::make('status'),
            Column::make('name'),
            Column::make('phone_number'),
            Column::make('civil_id'),
            Column::make('specialist'),
            Column::make('date'),
            Column::make('time'),
            Column::make('created_at'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(250)
                  ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Appointments_' . date('YmdHis');
    }
}
