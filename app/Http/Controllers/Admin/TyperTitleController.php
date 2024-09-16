<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\TyperTitleDataTable;
use App\Http\Controllers\Controller;
use App\Models\TyperTitle;
use Illuminate\Http\Request;

class TyperTitleController extends Controller
{

    public function index(TyperTitleDataTable $dataTable)
    {
        return $dataTable->render("admin.typer-title.index");
    }

    public function create()
    {
        return view("admin.typer-title.create");
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:200'],
        ]);

        $create = new TyperTitle();
        $create->title = $request->title;
        $create->save();

        toastr()->success('Created Successfully!', 'Congrats');
        return redirect()->route("admin.typer-title.index");
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $title = TyperTitle::findOrFail($id);
        return view("admin.typer-title.edit", compact('title'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:200'],
        ]);

        $create = TyperTitle::findOrFail($id);
        $create->title = $request->title;
        $create->save();

        toastr()->success('Updated Successfully!', 'Congrats');
        return redirect()->route("admin.typer-title.index");

    }

    public function destroy($id)
    {
        $title = TyperTitle::findOrFail($id);
        $title->delete();
    }
}
