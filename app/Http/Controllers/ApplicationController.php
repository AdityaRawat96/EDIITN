<?php

namespace App\Http\Controllers;

use App\Exports\ApplicationsExport;
use App\Models\Application;
use App\Http\Requests\StoreApplicationRequest;
use App\Http\Requests\UpdateApplicationRequest;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\DataTables;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('viewAny', Application::class);
        // Check if the request is ajax
        if ($request->ajax()) {
            // Write your logic to get the data from database using the request object values

            // Get the values from the request object
            $start = $request->start;
            $length = $request->length;
            $search = $request->search;
            $order = $request->order;
            $columns = $request->columns;

            // Build an eloquent query using these values
            $query = Application::select(
                'id',
                'name',
                'status',
                'description',
            );

            // Add the search query trim the search value and check if it is not empty
            if (!empty($search['value'])) {
                // Loop columns and if they are searchable then add a where clause for first one and orWhere for the rest. if name exists whose values is an array loop that array and add the items to search
                $column_searched = false;
                foreach ($columns as $column) {
                    if ($column['searchable'] == 'true') {
                        if (!$column_searched) {
                            $query->where($column['data'], 'like', '%' . $search['value'] . '%');
                            $column_searched = true;
                        } else {
                            $query->orWhere($column['data'], 'like', '%' . $search['value'] . '%');
                        }
                    }
                }
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
                ->with('sqlQuery', $query->get())
                ->with('recordsFiltered', $recordsFiltered)
                ->addColumn('id', function ($data) {
                    return str_pad($data->id, 5, '0', STR_PAD_LEFT);
                })
                ->addColumn('status', function ($data) {
                    return $data->status == 'active' ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">Inactive</span>';
                })
                ->rawColumns(['status'])
                ->make(true);
            return $datatable;
        }
        return view('application.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Application::class);
        // return the view for creating a new application
        return view('application.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreApplicationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreApplicationRequest $request)
    {
        $this->authorize('create', Application::class);
        // Get the validated data from the request
        $validated = $request->validated();
        try {
            DB::beginTransaction();
            // Store the application in the database
            $application = Application::create($validated);
            DB::commit();
            // Return the application

            return response()->json([
                'application' => $application,
                'message' => 'Application - ' . str_pad($application->id, 5, '0', STR_PAD_LEFT) . ' created successfully!'
            ], 201);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Application $application)
    {
        $this->authorize('view', $application, Application::class);
        // Check if the request is ajax
        if ($request->ajax()) {
            // return the customer as json
            return response()->json($application);
        }
        // return the view for showing the application
        return view('application.show', compact('application'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function edit(Application $application)
    {
        $user = Auth::user();
        $this->authorize('update', $user, $application);

        $user = User::find($application->user_id);

        $application->first_name = $user->first_name;
        $application->middle_name = $user->middle_name;
        $application->last_name = $user->last_name;
        $application->email = $user->email;
        $application->phone = $user->phone;

        // return the view for editing the application
        return view('application.create', compact('application'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateApplicationRequest  $request
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateApplicationRequest $request, Application $application)
    {
        $this->authorize('update', $application, Application::class);
        // Get the validated data from the request
        $validated = $request->validated();
        try {
            DB::beginTransaction();
            // Update the application in the database
            $application->update($validated);
            DB::commit();
            return response()->json(['message' => 'Application - ' . str_pad($application->id, 5, '0', STR_PAD_LEFT) . ' updated successfully!'], 200);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function destroy(Application $application)
    {
        $this->authorize('delete', $application, Application::class);
        try {
            DB::beginTransaction();
            $application->delete();
            DB::commit();
            return response()->json(['message' => 'Application - ' . str_pad($application->id, 5, '0', STR_PAD_LEFT) . ' deleted successfully!'], 200);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['error' => $e->getMessage()], 500);
        }
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