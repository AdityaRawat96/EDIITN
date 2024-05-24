<?php

namespace App\Http\Controllers;

use App\Exports\ApplicationsExport;
use App\Models\Application;
use App\Http\Requests\StoreApplicationRequest;
use App\Http\Requests\UpdateApplicationRequest;
use App\Models\Attachment;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
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

            $query->where('applications.archived', false);

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
        $user = User::find($application->user_id);
        // return the view for showing the application

        $photo_attachments = Attachment::where('type', 'photo')->where('ref_id', $application->id)->get();
        $address_attachments = Attachment::where('type', 'address_proof')->where('ref_id', $application->id)->get();
        $marksheet_attachments = Attachment::where('type', 'marksheets')->where('ref_id', $application->id)->get();

        $notifications = Notification::where('user_id', $user->id)->get();
        // Get attachments for each notification
        foreach ($notifications as $notification) {
            $notification->attachments = Attachment::where('type', 'notification')->where('ref_id', $notification->id)->get();
        }

        return view('application.show', compact('application', 'user', 'photo_attachments', 'address_attachments', 'marksheet_attachments', 'notifications'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function edit(Application $application)
    {
        $this->authorize('update', $application, Application::class);

        $user = User::find($application->user_id);

        $application->first_name = $user->first_name;
        $application->middle_name = $user->middle_name;
        $application->last_name = $user->last_name;
        $application->email = $user->email;
        $application->phone = $user->phone;

        $photo_attachments = Attachment::where('type', 'photo')->where('ref_id', $application->id)->get();
        $address_attachments = Attachment::where('type', 'address_proof')->where('ref_id', $application->id)->get();
        $marksheet_attachments = Attachment::where('type', 'marksheets')->where('ref_id', $application->id)->get();


        // return the view for editing the application
        return view('application.create', compact('application', 'photo_attachments', 'address_attachments', 'marksheet_attachments'));
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
        if ($application->status == 'pending') {
            $validated['status'] = 'processing';
        }
        try {
            DB::beginTransaction();
            // Update the application in the database
            $application->update($validated);
            $existing_photo_files = Attachment::where('type', 'photo')->where('ref_id', $application->id)->get();
            $existing_address_files = Attachment::where('type', 'address')->where('ref_id', $application->id)->get();
            $existing_marksheet_files = Attachment::where('type', 'marksheets')->where('ref_id', $application->id)->get();

            // Store application attacahments
            if ($request->hasFile('photo')) {
                $attachments_created = $this->handleAttachmentReuploads('photo', $request->file('photo'), $existing_photo_files, $application->id, $application->app_no);
                if (count($attachments_created) > 0) {
                    $photo_url = $attachments_created[0]['url'];
                    $validated['avatar'] = $photo_url;
                }
            } else {
                // Delete all the files if no file is in the request
                foreach ($existing_photo_files as $existing_file) {
                    Storage::disk('public')->delete($existing_file->url);
                    $existing_file->delete();
                }
            }

            if ($request->hasFile('address_proof')) {
                $this->handleAttachmentReuploads('address_proof', $request->file('address_proof'), $existing_address_files, $application->id, $application->app_no);
            } else {
                // Delete all the files if no file is in the request
                foreach ($existing_address_files as $existing_file) {
                    Storage::disk('public')->delete($existing_file->url);
                    $existing_file->delete();
                }
            }

            if ($request->hasFile('marksheets')) {
                $this->handleAttachmentReuploads('marksheets', $request->file('marksheets'), $existing_marksheet_files, $application->id, $application->app_no);
            } else {
                // Delete all the files if no file is in the request
                foreach ($existing_marksheet_files as $existing_file) {
                    Storage::disk('public')->delete($existing_file->url);
                    $existing_file->delete();
                }
            }

            // update user details
            $user = User::find($application->user_id);
            $user->update([
                'first_name' => $validated['first_name'],
                'middle_name' => $validated['middle_name'],
                'last_name' => $validated['last_name'],
                'email' => $validated['email'],
                'avatar' => isset($validated['avatar']) ? $validated['avatar'] : $user->avatar
            ]);

            DB::commit();
            return response()->json(['application_id' => $application->app_no, 'status' => "success"], 200);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function updateStatus(Request $request, $application_id)
    {
        // $this->authorize('updateStatus', Auth::user(), Application::class);

        $application = Application::where('id', $application_id)->first();
        $status = $request->status;

        if ($status == 'approve') {
            $application->status = 'approved';
        } else if ($status == 'reject') {
            $application->status = 'rejected';
        }

        if ($request->archived) {
            $application->archived = $request->archived == 'true' ? true : false;
        }

        try {
            DB::beginTransaction();
            $application->save();
            DB::commit();
            return response()->json(['application_id' => $application->app_no, 'status' => "success"], 200);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }


    public function handleAttachmentReuploads($type, $files, $existing_files, $application_id, $app_no)
    {
        $attachments_created = [];
        // check file by name. if file exists, do not reupload and create an attachment, if the file is not in the request but in db delete the file and attachment
        foreach ($files as $file) {
            $existing_file = $existing_files->where('name', $file->getClientOriginalName())->first();
            if (!$existing_file) {
                $attachment['type'] = $type;
                $attachment['ref_id'] = $application_id;
                $attachment['name'] = $file->getClientOriginalName();
                $attachment['extension'] = $file->getClientOriginalExtension();
                $attachment['mime_type'] = $file->getClientMimeType();
                $attachment['size'] = $file->getSize();
                $attachment['url'] = $file->store('applications/' . $app_no, 'public');
                Attachment::create($attachment);
                $attachments_created[] = $attachment;
            }
        }

        // Delete the files that are not in the request
        foreach ($existing_files as $existing_file) {
            $file_exists = false;
            foreach ($files as $file) {
                if ($existing_file->name == $file->getClientOriginalName()) {
                    $file_exists = true;
                    break;
                }
            }
            if (!$file_exists) {
                Storage::disk('public')->delete($existing_file->url);
                $existing_file->delete();
            }
        }

        return $attachments_created;
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function destroy(Application $application)
    {
        $this->authorize('delete', Auth::user(), $application);
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
