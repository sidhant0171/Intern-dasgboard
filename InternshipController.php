<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Internship;


class InternshipController extends Controller
{
    public function intern()
    {
    return view('intern');
    } 




    public function intern_insert(request $req)
{       
    $intern= new Internship();
   
        $intern->department =$req->department;
        $intern->duration = $req->duration;
        $intern->save();
        dd(true);


}



    public function store(Request $request)
    {   
        $request->validate([
            'department' => 'required|string|max:255',
            'duration' => 'required|string|max:255',
            'user_id' => 'required|exists:userdetails,id',
        ]);

        Internship::create($request->all());  
        

    
        
    }
}
