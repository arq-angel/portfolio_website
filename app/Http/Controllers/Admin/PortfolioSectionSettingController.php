<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PortfolioSectionSetting;
use Illuminate\Http\Request;

class PortfolioSectionSettingController extends Controller
{

    public function index()
    {
        $portfolio = PortfolioSectionSetting::first();
        return view('admin.portfolio-setting.index', compact('portfolio'));
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
            'sub_title' => ['required', 'max:500'],
        ]);

        PortfolioSectionSetting::updateOrCreate(
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
