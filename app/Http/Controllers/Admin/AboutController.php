<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{

    public function index()
    {
        $about = About::first();
        return view('admin.about.index', compact('about'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:200'],
            'description' => ['required', 'max:5000'],
            'image' => ['image', 'max:5000'],
            'resume' => ['mimes:pdf,csv,text', 'max:10000']
        ]);

        $about = About::first();
        $imagePath = handleUpload('image', $about);
        $resumePath = handleUpload('resume', $about);

        About::updateOrCreate(
            ['id' => $id],
            [
                'title' => $request->title,
                'description' => $request->description,
                'image' => (!empty($imagePath)) ? $imagePath : $about->image,
                'resume' => (!empty($resumePath)) ? $resumePath : $about->resume,
            ]
        );

        toastr()->success('Updated successfully!', 'Congrats');
        return redirect()->back();
    }

    public function resumeDownload()
    {
        $about = About::first();
        if ($about && $about->resume && file_exists(public_path($about->resume))) {
            return response()->download(public_path($about->resume));
        }

        return redirect()->back()->with('error', 'Resume file not found.');
    }

    public function destroy($id)
    {
        //
    }
}
