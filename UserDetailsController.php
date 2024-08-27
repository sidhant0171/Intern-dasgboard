<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserDetail;
use App\Models\UserIntern;
use App\Models\Role;
use App\Models\Internship;
use App\Mail\DemoMail;
use Illuminate\Http\Request;
use App\Models\Attendance;

class UserDetailsController extends Controller
{
    public function department(Request $request)
    {
        $intern = Internship::all();
        return view('department', compact('intern'));
    }

    public function create()
    {
        $userrole = Role::all();
        return view('register', compact('userrole'));
    }

    public function userform()
    {
        $role = Role::all();
        return view('userform', compact('role'));
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    public function adduser(Request $req)
    {
        $req->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        $user = new User();
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = bcrypt($req->password);
        $user->role_id = $req->role_id;
        $user->save();

        if ($req->department) {
            $internUser = new UserIntern();
            $internUser->users_id = $user->id;
            $internUser->intern_id = $req->department;
            $internUser->save();
        }

        $details = new UserDetail();
        $details->users_id = $user->id;
        $details->user_name = $user->name;
        $details->role_id = $user->role_id;
        $details->internship_id = $req->department;
        $details->save();

        // // Send registration email
        $mailController = new MailController();
        $mailController->index($user->email, $user->name);

        return redirect('/showloginform')->with('success', "Register successfully");
    }



    public function index()
    {
        $userDetails = UserDetail::all(); 

        return view('record', compact('userDetails'));
    }
    public function record()
{
    $userDetails = UserDetail::with('user')->get(); // Eager load the user relationship
    return view('record', compact('userDetails'));
}

// public function hello(Request $request)
// {
//     // Fetch paginated attendance data (10 items per page)
//     $attendances = Attendance::paginate(10);

//     return view('dashboard', compact('attendances'));
// }
// public function page() {
//     // Fetch paginated results, 5 records per page
//     $attendances = Attendance::with('user', 'internship')->paginate(5); 
//     return view('dashboard', compact('attendances'));
// }



}
