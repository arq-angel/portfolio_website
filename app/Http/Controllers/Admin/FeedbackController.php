<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\FeedbackDataTable;
use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{

    public function index(FeedbackDataTable $dataTable)
    {
        return $dataTable->render('admin.feedback.index');
    }

    public function create()
    {
        return view("admin.feedback.create");
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:200'],
            'position' => ['required', 'string', 'max:100'],
            'description' => ['required', 'max:1000'],
        ]);

        $feedback = new Feedback();
        $feedback->name = $request->name;
        $feedback->position = $request->position;
        $feedback->description = $request->description;
        $feedback->save();

        toastr()->success('Created Successfully', 'Congrats');
        return redirect()->route('admin.feedback.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $feedback = Feedback::findOrFail($id);
        return view("admin.feedback.edit", compact('feedback'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:200'],
            'position' => ['required', 'string', 'max:100'],
            'description' => ['required', 'max:1000'],
        ]);

        $feedback = Feedback::findOrFail($id);
        $feedback->name = $request->name;
        $feedback->position = $request->position;
        $feedback->description = $request->description;
        $feedback->save();

        toastr()->success('Updated Successfully', 'Congrats');
        return redirect()->route('admin.feedback.index');
    }

    public function destroy($id)
    {
        $feedback = Feedback::findOrFail($id);
        $feedback->delete();
    }
}
