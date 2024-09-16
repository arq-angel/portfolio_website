<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class HeroController extends Controller
{

    public function index()
    {
        $hero = Hero::first();
        return view('admin.hero.index', compact('hero'));
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
            'title' => ['required', 'max:200'],
            'sub_title' => ['required', 'max:500'],
            'image' => ['max:3000', 'image']
        ]);

        //dd($request->all());

        if ($request->hasFile('image')) {
            $hero = Hero::first();
            if ($hero && File::exists(public_path($hero->image))) {
                File::delete(public_path($hero->image));
            }
            $image = $request->file('image');
            $imageName = rand().$image->getClientOriginalName();
            $image->move(public_path().'/uploads/', $imageName);

            $imagePath = '/uploads/'.$imageName;

        }

        $data = [
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'btn_text' => $request->btn_text,
            'btn_url' => $request->btn_url,
        ];

        // Only add the image to the $data array if a new image is uploaded
        if (!empty($imagePath)) {
            $data['image'] = $imagePath;
        }

        Hero::updateOrCreate(
            ['id' => $id],
            $data
        );

        toastr()->success('Updated successfully!', 'Congrats');
        return redirect()->back();

    }

    public function destroy($id)
    {
        //
    }
}
