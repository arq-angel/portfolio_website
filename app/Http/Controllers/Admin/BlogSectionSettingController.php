<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogSectionSetting;
use Illuminate\Http\Request;

class BlogSectionSettingController extends Controller
{

    public function index()
    {
        $blogTitle = BlogSectionSetting::first();
        return view("admin.blog-setting.index", compact('blogTitle'));
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
           'sub_title' => ['required', 'string', 'max:500'],
        ]);

        BlogSectionSetting::updateOrCreate(
            ['id' => $id],
            [
                'title' => $request->title,
                'sub_title' => $request->sub_title,
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
