<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FooterContactInfo;
use Illuminate\Http\Request;

class FooterContactInfoController extends Controller
{

    public function index()
    {
        $footerContactInfo = FooterContactInfo::first();
        return view('admin.footer-contact-info.index', compact('footerContactInfo'));
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
            'address' => ['max:500'],
            'phone' => ['max:50'],
            'email' => ['email', 'max:200'],
        ]);

        FooterContactInfo::updateOrCreate(
            ['id' => $id],
            [
                'address' => $request->address,
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
