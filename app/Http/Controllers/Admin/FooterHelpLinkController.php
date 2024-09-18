<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\FooterHelpLinkDataTable;
use App\Http\Controllers\Controller;
use App\Models\FooterHelpLink;
use Illuminate\Http\Request;

class FooterHelpLinkController extends Controller
{

    public function index(FooterHelpLinkDataTable $dataTable)
    {
        return $dataTable->render('admin.footer-help-link.index');
    }

    public function create()
    {
        return view('admin.footer-help-link.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:200'],
            'url' => ['required', 'url'],
        ]);

        $link = new FooterHelpLink();
        $link->name = $request->name;
        $link->url = $request->url;
        $link->save();

        toastr()->success('Created Successfully', 'Congrats');
        return redirect()->route('admin.footer-help-links.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $link = FooterHelpLink::findOrFail($id);
        return view("admin.footer-help-link.edit", compact('link'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:200'],
            'url' => ['required', 'url'],
        ]);

        $link = FooterHelpLink::findOrFail($id);
        $link->name = $request->name;
        $link->url = $request->url;
        $link->save();

        toastr()->success('Updated Successfully', 'Congrats');
        return redirect()->route('admin.footer-help-links.index');
    }

    public function destroy($id)
    {
        $link = FooterHelpLink::findOrFail($id);
        $link->delete();
    }
}
