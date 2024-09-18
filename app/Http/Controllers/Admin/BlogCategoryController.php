<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\BlogCategoryDataTable;
use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogCategoryController extends Controller
{

    public function index(BlogCategoryDataTable $dataTable)
    {
        return $dataTable->render('admin.blog-category.index');
    }

    public function create()
    {
        return view("admin.blog-category.create");
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:200'],
        ]);

        $category = new BlogCategory();
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->save();

        toastr()->success('Created Successfully!', 'Congrats');
        return redirect()->route('admin.blog-category.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $category = BlogCategory::findOrFail($id);
        return view("admin.blog-category.edit", compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'max:200'],
        ]);

        $category = BlogCategory::findOrFail($id);
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->save();

        toastr()->success('Updated Successfully!', 'Congrats');
        return redirect()->route('admin.blog-category.index');
    }

    public function destroy($id)
    {
        $category = BlogCategory::findOrFail($id);
        $category->delete();
    }
}
