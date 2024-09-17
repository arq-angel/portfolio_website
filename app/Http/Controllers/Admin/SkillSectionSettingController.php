<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SkillSectionSetting;
use Illuminate\Http\Request;

class SkillSectionSettingController extends Controller
{

    public function index()
    {
        $skillSetting = SkillSectionSetting::first();
        return view("admin.skill-setting.index", compact("skillSetting"));
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
            'sub_title' => ['required', 'string', 'max:1000'],
            'image' => ['image', 'max:5000']
        ]);

        $skill = SkillSectionSetting::first();
        $imagePath = handleUpload('image', $skill);

        SkillSectionSetting::updateOrCreate(
            ['id' => $id],
            [
                'title' => $request->title,
                'sub_title' => $request->sub_title,
                'image' => (!empty($imagePath) ? $imagePath : $skill->image)
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
