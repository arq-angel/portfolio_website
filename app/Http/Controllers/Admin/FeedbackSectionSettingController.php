<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FeedbackSectionSetting;
use Illuminate\Http\Request;

class FeedbackSectionSettingController extends Controller
{

    public function index()
    {
        $feedback = FeedbackSectionSetting::first();
        return view("admin.feedback-setting.index", compact('feedback'));
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
           'title' => ['required', 'string', 'max:100'],
           'sub_title' => ['required', 'string', 'max:500'],
        ]);

        FeedbackSectionSetting::updateOrCreate(
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
