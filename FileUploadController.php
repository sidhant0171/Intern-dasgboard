<?php
namespace App\Http\Controllers;

use App\Models\Task; 
use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    public function showUploadForm()
    {
        $homework = Task::paginate(3); // Fetch 3 tasks per page
        return view('upload', compact('homework'));
    }

    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:jpeg,png,pdf,txt|max:2048',
        ]);

        if ($request->file('file')->isValid()) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $fileName);

            return back()->with('success', 'File uploaded successfully.');
        }

        return back()->with('error', 'Failed to upload file.');
    }

    public function homeworkpage()
    {
        $homework = Task::paginate(3); // Fetch 3 tasks per page
        return view('upload', compact('homework'));
    }
}
