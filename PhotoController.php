<?php

namespace App\Http\Controllers;

use App\Models\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PhotoController extends Controller
{
    public function create()
    {
        return view('profile');
    }

    public function store(Request $request)
    {
        $request->validate([
            'phone_number' => 'required|string',
            'gender' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        }

        $user = Auth::user();
        $role_id = $user->role_id; // Fetch the role_id of the logged-in user

        UserDetail::updateOrCreate(
            ['users_id' => $user->id], // Unique key to find the record
            [
                'phone_number' => $request->phone_number,
                'gender' => $request->gender,
                'image' => $imageName,
                'role_id' => $role_id, // Keep the original role_id
            ]
        );

        return back()->with('success', 'Photo uploaded and profile updated successfully.');
    }
}
