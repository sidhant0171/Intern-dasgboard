<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SidebarLink;

class SidebarController extends Controller
{
    public function edit()
    {
        $links = SidebarLink::all();
        return view('sidebar', compact('links'));
    }

    public function update(Request $request)
    {
        $enabledLinks = $request->input('enabled', []);

        foreach (SidebarLink::all() as $link) {
            $link->enabled = isset($enabledLinks[$link->id]);
            $link->save();
        }

        return redirect()->route('sidebar.edit')->with('success', 'Sidebar links updated successfully.');
    }
}
