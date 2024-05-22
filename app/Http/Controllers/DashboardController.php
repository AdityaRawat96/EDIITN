<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Attachment;
use App\Models\Notification;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $status_data = DB::table('applications')
            ->select('status', DB::raw('count(*) as total'))
            ->groupBy('status')
            ->get();

        $status_data = $status_data->toArray();
        $status_map = array_map(function ($item) {
            return $item->status;
        }, $status_data);
        $status_count = array_map(function ($item) {
            return $item->total;
        }, $status_data);

        $STATUS_DATA = [
            $status_map,
            $status_count
        ];

        // Get last 2 weeks daily application data including days with 0 total
        $startDate = now()->subWeeks(2)->startOfDay(); // Start date of the last 2 weeks
        $endDate = now()->endOfDay(); // End date (today)

        // Generate an array of dates for the last 2 weeks
        $dateRange = [];
        $currentDate = clone $startDate;
        while ($currentDate <= $endDate) {
            $dateRange[] = $currentDate->copy();
            $currentDate->addDay();
        }

        // Fetch applications data
        $applications = Application::select(
            DB::raw('DATE_FORMAT(application_date, "%b %d") as date'),
            DB::raw('COALESCE(COUNT(*), 0) as total')
        )
            ->whereBetween('application_date', [$startDate, $endDate]);
        $applications = $applications
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        // Map fetched data to the desired format including missing dates
        $applicationData = [];
        foreach ($dateRange as $date) {
            $formattedDate = $date->format('M d');
            $total = 0;
            // Find total for the date if it exists in the fetched data
            foreach ($applications as $application) {
                if ($application->date === $formattedDate) {
                    $total = $application->total;
                    break;
                }
            }
            // Add data to the result array
            $applicationData[] = ['date' => $formattedDate, 'total' => $total];
        }

        // split the data into 2 arrays for the last 2 weeks
        $applicationsTotal = array_map(function ($data) {
            return $data['total'];
        }, $applicationData);

        $applicationsDate = array_map(function ($data) {
            return $data['date'];
        }, $applicationData);

        $applicationTotalSum = 0;
        $applicationMaxTotal = 0;
        foreach ($applicationData as $data) {
            $applicationTotalSum += $data['total'];
            if ($data['total'] > $applicationMaxTotal) {
                $applicationMaxTotal = $data['total'];
            }
        }

        $APPLICATION_DATA = [
            'applicationsTotal' => $applicationsTotal,
            'applicationsDate' => $applicationsDate,
            'applicationTotalSum' => $applicationTotalSum,
            'applicationMaxTotal' => $applicationMaxTotal,
        ];

        return view('dashboard.admin.index')->with([
            'STATUS_DATA' => $STATUS_DATA,
            'APPLICATION_DATA' => $APPLICATION_DATA,
            'total_applications' => $applicationTotalSum,
        ]);
    }

    public function studentDashboard()
    {
        $user = Auth::user();
        $notifications = Notification::where('user_id', $user->id)->orderBy('created_at', 'desc')->limit(5)->get();
        // Get attachments for each notification
        foreach ($notifications as $notification) {
            $notification->attachments = Attachment::where('type', 'notification')->where('ref_id', $notification->id)->get();
        }

        return view('dashboard.student.index')->with([
            'user' => $user,
            'notifications' => $notifications,
        ]);
    }

    // Custom sorting function to sort by month name
    function sortByMonth($a, $b)
    {
        $months = [
            'January', 'February', 'March', 'April', 'May', 'June',
            'July', 'August', 'September', 'October', 'November', 'December'
        ];
        return array_search($a['month'], $months) - array_search($b['month'], $months);
    }
}
