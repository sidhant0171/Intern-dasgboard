<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\Leave;
use App\Models\User;

class LeaveController extends Controller
{
    public function apply(Request $request)
    {
        $validatedData = $request->validate([
            'intern_name' => 'required|string',
            'reason' => 'required|string',
        ]);

        $user = User::where('name', $validatedData['intern_name'])->first();

        if (!$user) {
            return redirect()->back()->with('error', 'Intern not found.');
        }

        $attendance = Attendance::where('user_id', $user->id)->first();

        if (!$attendance) {                      
            return redirect()->back()->with('error', 'Attendance record not found.');
        }  

        $leave = new Leave();
        $leave->attendance_id = $attendance->id;
        $leave->user_id = $attendance->user_id;
        $leave->internship_id = $attendance->internship_id;
        $leave->reason = $validatedData['reason'];
        $leave->status = 'Pending';
        $leave->save();  

        return redirect()->back()->with('success', 'Leave application submitted successfully.');
    }

    public function index()
    {
        $leaves = Leave::with('attendance.user')->get();   

        return view('attendance', compact('leaves'));
    }

    public function acceptLeave($id)
    {
        $leave = Leave::find($id);
        $leave->status = 'Accepted';
        $leave->save();

        return redirect()->back()->with('success', 'Leave request accepted.');
    }

    public function declineLeave($id)
    {
        $leave = Leave::find($id);
        $leave->status = 'Declined';
        $leave->save();

        return redirect()->back()->with('success', 'Leave request declined.');
    }
}


