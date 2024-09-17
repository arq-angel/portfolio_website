<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{

    public function index()
    {
        $experience = Experience::first();
        return view("admin.experience.index", compact('experience'));
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
            'image' => ['image', 'max:5000'],
            'title' => ['required', 'string', 'max:200'],
            'description' => ['required', 'max:1000'],
            'phone' => ['nullable', 'max:100'],
            'email' => ['nullable', 'max:100', 'email'],
        ]);

        $experience = Experience::find($id);
        $imagePath = handleUpload('image', $experience);

        Experience::updateOrCreate(
            ['id' => $id],
            [
                'image' => (!empty($imagePath)) ? $imagePath : $experience->image,
                'title' => $request->title,
                'description' => $request->description,
                'phone' => $request->phone,
                'email' => $request->email,
            ]
        );

        toastr()->success('Updated successfully!', 'Congrats');
        return redirect()->back();
    }

    public function destroy($id)
    {
        //
    }
}
