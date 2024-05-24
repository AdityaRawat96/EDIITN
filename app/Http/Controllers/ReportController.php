<?php

namespace App\Http\Controllers;

use App\Exports\ApplicationsExport;
use App\Models\Application;
use App\Models\Attachment;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\DataTables;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('report.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function view(Request $request)
    {
        // Check if the request is ajax
        if ($request->ajax()) {
            // Build an eloquent query using these values
            $query = Application::join('users', 'applications.user_id', '=', 'users.id')
                ->select(
                    'applications.id',
                    'applications.app_no as app_no',
                    'applications.communication_state as communication_state',
                    'applications.status as status',
                    'applications.archived as archived',
                    DB::raw("CONCAT(users.first_name, ' ', COALESCE(users.middle_name, ''), ' ', users.last_name) as name"),
                    'users.phone as phone',
                );

            if (Auth::user()->privilege != 'superadmin') {
                $query->where('applications.archived', false);
            }



            // only if the filter is not empty and exists filter the records
            if (!empty($request->filter) && isset($request->filter)) {
                foreach ($request->filter as $filter) {
                    if ($filter['type'] == 'text') {
                        $query->where($filter['name'], $filter['comparator'], $filter['value']);
                    } else if ($filter['type'] == 'date') {
                        $query->whereDate($filter['name'], $filter['comparator'], $filter['value']);
                    } else if ($filter['type'] == 'text-multiple') {
                        $query->orWhere($filter['name'], $filter['comparator'], $filter['value']);
                    }
                }
            }

            // Get the values from the request object
            $start = $request->start;
            $length = $request->length;
            $search = $request->search;
            $order = $request->order;
            $columns = $request->columns;

            // Add the search query trim the search value and check if it is not empty
            if (!empty($search['value'])) {
                $query->where(function ($query) use ($columns, $search) {
                    $query->where('users.first_name', 'like', '%' . $search['value'] . '%')
                        ->orWhere('users.middle_name', 'like', '%' . $search['value'] . '%')
                        ->orWhere('users.last_name', 'like', '%' . $search['value'] . '%')
                        ->orWhere('users.phone', 'like', '%' . $search['value'] . '%'); // Add carrier name search
                    foreach ($columns as $column) {
                        if ($column['searchable'] == 'true' && $column['data'] != 'name' && $column['data'] != 'phone') {
                            $query->orWhere("applications." . $column['data'], 'like', '%' . $search['value'] . '%');
                        }
                    }
                });
            }

            // Add the order by clause if the column is orderable
            if (!empty($order)) {
                $column = $columns[$order[0]['column']]['data'];
                $dir = $order[0]['dir'];
                if ($columns[$order[0]['column']]['orderable'] == 'true') {
                    $query->orderBy($column, $dir);
                }
            }

            // get count of the records from query
            $recordsFiltered = $query->count();

            // Get the data
            $query->offset($start)
                ->limit($length);

            $data_filtered = $query->get();

            $datatable = DataTables::of($data_filtered)
                ->setOffset($start)
                ->with('recordsTotal', Application::count())
                ->with('sqlQuery', $query->toSql()) // Note: It's better to use ->toSql() to get the SQL query for debugging purposes
                ->with('recordsFiltered', $recordsFiltered)
                ->addColumn('id', function ($data) {
                    return $data->id;
                })
                ->addColumn('app_no', function ($data) {
                    if ($data->archived) {
                        return '<span>' . $data->app_no . '</span>
                        <span class="badge badge-danger">Archived</span>';
                    } else {
                        return $data->app_no;
                    }
                })
                ->addColumn('status', function ($data) {
                    if ($data->status == 'rejected') {
                        return '<span class="badge badge-danger">Rejected</span>';
                    } else if ($data->status == 'approved') {
                        return '<span class="badge badge-success">Approved</span>';
                    } else if ($data->status == 'processing') {
                        return '<span class="badge badge-primary">Processing</span>';
                    } else if ($data->status == 'pending') {
                        return '<span class="badge badge-warning">Pending</span>';
                    }
                })
                ->rawColumns(['status', 'app_no'])
                ->make(true);
            return $datatable;
        }

        $report_filter = $request->filter;
        $report_filter = json_decode($report_filter, true);
        return view('report.view')->with([
            'report_filter' => $report_filter,
        ]);
    }

    // Export the applications to excel
    public function export($type = 'excel')
    {
        if ($type == 'excel') {
            // return the excel file 
            return Excel::download(new ApplicationsExport, 'applications_' . time() . '.xlsx');
        } else if ($type == 'csv') {
            // return the csv file
            return Excel::download(new ApplicationsExport, 'applications_' . time() . '.csv', \Maatwebsite\Excel\Excel::CSV, [
                'Content-Type' => 'text/csv',
            ]);
        } else if ($type == 'pdf') {
            // return the pdf file
            return Excel::download(new ApplicationsExport, 'applications_' . time() . '.pdf', \Maatwebsite\Excel\Excel::MPDF);
        }
    }
}
