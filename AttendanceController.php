<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;

class AttendanceController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        $attendances = Attendance::whereHas('user', function($q) use ($query) {
            $q->where('name', 'LIKE', "%{$query}%");
        })->with('user', 'internship')->get();

        return response()->json($attendances);
    }
    
    public function page() {
        $attendances = Attendance::with('user', 'internship')->paginate(5); // Paginate with 5 records per page
        return view('dashboard', compact('attendances'));
    }


    // public function index() {
    //     $attendances = Attendance::paginate(2); 
    //     return view('dashboard', compact('attendances')); 
    // }

}
