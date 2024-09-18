<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\FooterSocialLinkDataTable;
use App\Http\Controllers\Controller;
use App\Models\FooterSocialLink;
use Illuminate\Http\Request;

class FooterSocialLinkController extends Controller
{

    public function index(FooterSocialLinkDataTable $dataTable)
    {
        return $dataTable->render('admin.footer-social-link.index');
    }

    public function create()
    {
        return view("admin.footer-social-link.create");
    }

    public function store(Request $request)
    {
        $request->validate([
           'icon' => ['required'],
           'url' => ['required', 'url'],
        ]);

        $social  = new FooterSocialLink();
        $social->icon = $request->icon;
        $social->url = $request->url;
        $social->save();

        toastr()->success('Created Successfully', 'Congrats');
        return redirect()->route('admin.footer-social.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $social = FooterSocialLink::findOrFail($id);
        return view("admin.footer-social-link.edit", compact("social"));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'icon' => ['required'],
            'url' => ['required', 'url'],
        ]);

        $social = FooterSocialLink::findOrFail($id);
        $social->icon = $request->icon;
        $social->url = $request->url;
        $social->save();

        toastr()->success('Updated Successfully', 'Congrats');
        return redirect()->route('admin.footer-social.index');
    }

    public function destroy($id)
    {
        $social = FooterSocialLink::findOrFail($id);
        $social->delete();
    }
}
