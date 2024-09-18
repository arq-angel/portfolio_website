<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SeoSetting;
use Illuminate\Http\Request;

class SeoSettingController extends Controller
{

    public function index()
    {
        $seoSetting = SeoSetting::first();
        return view("admin.setting.seo-setting.index", compact('seoSetting'));
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
            'description' => ['required', 'max:500'],
            'keywords' => ['required', 'max:300'],
        ]);

        SeoSetting::updateOrCreate(
            ['id' => $id],
            [
                'title' => $request->title,
                'description' => $request->description,
                'keywords' => $request->keywords,

            ]
        );

        toastr()->success('Updated Successfully', 'Congrats');
        return redirect()->back();
    }

    public function destroy($id)
    {
        //
    }
}
