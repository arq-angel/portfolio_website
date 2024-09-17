<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\SkillItemDataTable;
use App\Http\Controllers\Controller;
use App\Models\SkillItem;
use Illuminate\Http\Request;

class SkillItemController extends Controller
{

    public function index(SkillItemDataTable $dataTable)
    {
        return $dataTable->render('admin.skill-item.index');
    }

    public function create()
    {
        return view("admin.skill-item.create");
    }

    public function store(Request $request)
    {
        $request->validate([
           'name' => ['required', 'string', 'max:200'],
           'percent' => ['required', 'numeric', 'min:0', 'max:100'],
        ]);

        $skillItem = new SkillItem();
        $skillItem->name = $request->name;
        $skillItem->percent = $request->percent;
        $skillItem->save();

        toastr()->success('Created Successfully!', 'Congrats');
        return redirect()->route("admin.skill-item.index");
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $skill = SkillItem::findOrFail($id);
        return view("admin.skill-item.edit", compact('skill'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:200'],
            'percent' => ['required', 'numeric', 'min:0', 'max:100'],
        ]);

        $skillItem = SkillItem::findOrFail($id);
        $skillItem->name = $request->name;
        $skillItem->percent = $request->percent;
        $skillItem->save();

        toastr()->success('Created Successfully!', 'Congrats');
        return redirect()->route("admin.skill-item.index");
    }

    public function destroy($id)
    {
        $skillItem = SkillItem::findOrFail($id);
        $skillItem->delete();
    }
}
