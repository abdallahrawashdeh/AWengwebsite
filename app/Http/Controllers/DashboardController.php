<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Career;
use App\Models\News;
use App\Models\Project;
use App\Models\Service;
use App\Models\Client;
use Carbon\Carbon;





class DashboardController extends Controller
{
public function index(Request $request)
{
    // Set timezone to Amman
    $timezone = 'Asia/Amman';

    // Parse 'from' and 'to' dates or default to today
    $from = $request->input('from')
        ? Carbon::createFromFormat('Y-m-d', $request->input('from'), $timezone)->startOfDay()
        : Carbon::now($timezone)->startOfDay();

    $to = $request->input('to')
        ? Carbon::createFromFormat('Y-m-d', $request->input('to'), $timezone)->endOfDay()
        : Carbon::now($timezone)->endOfDay();

    // Get total counts (no date filtering)
    $careerTotal = Career::count();
    $newsTotal = News::count();
    $projectsTotal = Project::count();
    $serviceTotal = Service::count();
    $clientsTotal = Client::count();

    // Filtered counts within date range
    $careerCount = Career::whereBetween('created_at', [$from, $to])->count();
    $newsCount = News::whereBetween('created_at', [$from, $to])->count();
    $projectsCount = Project::whereBetween('created_at', [$from, $to])->count();
    $serviceCount = Service::whereBetween('created_at', [$from, $to])->count();
    $clientsCount = Client::whereBetween('created_at', [$from, $to])->count();

    $data = [
        'careerTotal' => $careerTotal,
        'newsTotal' => $newsTotal,
        'projectsTotal' => $projectsTotal,
        'serviceTotal' => $serviceTotal,
        'clientsTotal' => $clientsTotal,
        'careerCount' => $careerCount,
        'newsCount' => $newsCount,
        'projectsCount' => $projectsCount,
        'serviceCount' => $serviceCount,
        'clientsCount' => $clientsCount,
        'from' => $from->toDateString(),
        'to' => $to->toDateString(),
    ];

    if ($request->ajax()) {
        return response()->json([
            'careerCount' => $careerCount,
            'newsCount' => $newsCount,
            'projectsCount' => $projectsCount,
            'serviceCount' => $serviceCount,
            'clientsCount' => $clientsCount,
        ]);
    }

    return view('dashboard', $data);
}

}
