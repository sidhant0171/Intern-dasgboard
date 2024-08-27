<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // Fetch paginated attendance data (10 items per page)
        $attendances = Attendance::paginate(10);

        return view('dashboard', compact('attendances'));
    }

    


    
}


