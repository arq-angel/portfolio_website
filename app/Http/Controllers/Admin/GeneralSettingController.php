<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GeneralSetting;
use Illuminate\Http\Request;

class GeneralSettingController extends Controller
{

    public function index()
    {
        $setting = GeneralSetting::first();
        return view("admin.setting.general-setting.index", compact('setting'));
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
            'logo' => ['max:5000', 'image'],
            'footer_logo' => ['max:5000', 'image'],
            'favicon' => ['max:5000', 'image'],
        ]);

        $setting = GeneralSetting::first();
        $logoPath = handleUpload('logo', $setting);
        $footer_logo = handleUpload('footer_logo', $setting);
        $favicon = handleUpload('favicon', $setting);

        GeneralSetting::updateOrCreate(
            ['id' => $id],
            [
                'logo' => (!empty($logoPath)) ? $logoPath : ($setting->logo ?? ''),
                'footer_logo' => (!empty($footer_logo)) ? $footer_logo : ($setting->footer_logo ?? ''),
                'favicon' => (!empty($favicon)) ? $favicon : ($setting->favicon ?? ''),
            ]
        );

        toastr()->success('Created Successfully.', 'Congrats');
        return redirect()->back();
    }

    public function destroy($id)
    {
        //
    }
}
