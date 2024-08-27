<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\user_details;
use App\Http\Controllers\Auth\LoginController;
use App\Models\Role;
use App\Http\Controllers\InternshipController;

use App\Models\Attendance;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\TaskController;
use App\Models\task;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\SidebarController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\UserDetailsController;  
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\DashboardController;

use App\Http\Controllers\RazorpayPaymentController;
Route::get('/tasks/count', [TaskController::class, 'getTaskCount']);

Route::get('/razorpay-payment', [RazorpayPaymentController::class, 'index']);
Route::post('/razorpay-payment', [RazorpayPaymentController::class, 'store'])->name('razorpay.payment.store');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


Route::get('/payment', [PaymentController::class, 'showPaymentPage'])->name('payment.page');


Route::get('/tasks/unread', [TaskController::class, 'getUnreadTasks']);

// Route::get('/tasks/unread', [TaskController::class, 'getUnreadTasks']);   

Route::get('/user-details', [UserDetailsController::class, 'index'])->name('user.details');

// Route::get('/test-email', function() {
//     $mailController = new MailController();
//     $mailController->sendRegistrationEmail('sid2viru@gmail.com', 'Test User');
//     return 'Test email sent';
// });



Route::get('send-mail', [MailController::class, 'index']);

// dyanamic sidebar to enabale and disenable
Route::get('/manage-sidebar', [SidebarController::class, 'edit'])->name('sidebar.edit');
Route::put('/manage-sidebar', [SidebarController::class, 'update'])->name('sidebar.update');


Route::get('/search-attendance', [AttendanceController::class, 'search'])->name('search.attendance');

// file upload by intern
Route::get('/upload', [FileUploadController::class, 'showUploadForm'])->name('upload.form');
Route::post('/upload', [FileUploadController::class, 'upload'])->name('file.upload');



// Route::get('/boss', function () {
//     return view('member');    
// });
    
// leave response accept and declined
Route::post('/leave/{id}/accept', [LeaveController::class, 'acceptLeave'])->name('leave.accept');
Route::post('/leave/{id}/decline', [LeaveController::class, 'declineLeave'])->name('leave.decline');

// leave page intern ask for leave
Route::get('/party', [LeaveController::class, 'index'])->name('party');
Route::post('/barfi', [LeaveController::class, 'apply'])->name('barfi');

// to create a task
Route::get('/kaam', [TaskController::class, 'create']); 
Route::post('/task', [TaskController::class, 'store']);


// intern fill perosnal details

Route::get('/upload-photo', [PhotoController::class, 'create']);
Route::post('/store-photo', [PhotoController::class, 'store']);


// Route::get('/task', [TaskController::class, 'create'])->name('task.create');
// Route::post('/task', [TaskController::class, 'store'])->name('task.store');


//  count number of task create by mentor
Route::get('/tasks/count', [TaskController::class, 'getTaskCount']);
Route::get('/tasks/details', [TaskController::class, 'getTaskDetails']);
// Route::get('/buddy', function () {
//     $userrole = role::all();    
//     return view('register',compact('userrole'));
//     return view('register');
// }); 


// new register(mentor and intern)
Route::get('/buddy',[UserDetailsController::class, 'create']);  

Route::post('/registerdata', [UserDetailsController::class, 'adduser']);

Route::post('/department', [UserDetailsController::class, 'department']);
 

// Route::get('/posts', [user_details::class, 'register']);

Route::get('/posts', [PostController::class, 'create']);

Route::get('/userform', [UserDetailsController::class, 'userform']);    
Route::post('/store', [UserDetailsController::class, 'userstore']);
    

Route::get('/intern', [InternshipController::class, 'intern']);
Route::post('/intern_store', [InternshipController::class, 'intern_insert']);



// Route::get('/login', [loginController::class, 'showLoginForm'])->name('login');
// Route::post('/login', [AuthController::class, 'login']);




// user and mentor get login 
Route::get('/showloginform', [LoginController::class, 'showLoginForm'])->name('login');

Route::post('/userlogin', [LoginController::class, 'login']);
Route::post('/userlogin', [LoginController::class, 'logout'])->name('logout');

Route::get('/showloginform', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/userlogin', [LoginController::class, 'verifyuser']);


// this is logout routee
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
// Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/showloginform', [LoginController::class, 'showLoginForm'])->name('showloginform');


// Protected Routes
// Route::middleware('auth')->group(function () {
    // Route::get('/dashboard', function () {   
    //     return view('dashboard'); 
    // })->name('dashboard');
// });

Route::get('/home', function () {     
    return view('welcome'); 
});





// routes/web.php

// Route::get('/dashboard', function () {   
//     return view('welcome'); 
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// not directly access the dashbaord
Route::middleware(['authCheck'])->group(function () {
    Route::get('/dashboard', function () {
        $attendances = Attendance::all();
        return view('Dashboard',compact('attendances'));
    });
      
      
    // $user->userDetail()->name;
    // Route::get('/dashboard', function () {
    //     $attendances = Attendance::with(['internship', 'user'])->get();
    //     return view('dashboard', compact('attendances'));
    // });
       
    



    Route::get('/users', function () {
        return 'Users';
    });
});









require __DIR__.'/auth.php';  