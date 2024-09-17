<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\CategoryDataTable;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\PortfolioItem;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{

    public function index(CategoryDataTable $dataTable)
    {
        return $dataTable->render('admin.portfolio-category.index');
    }

    public function create()
    {
        return view('admin.portfolio-category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
           'name' => ['required', 'max:200'],
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->save();

        toastr()->success('Created Successfully!', 'Congrats');
        return redirect()->route('admin.category.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.portfolio-category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'max:200'],
        ]);

        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->save();

        toastr()->success('Updated Successfully!', 'Congrats');
        return redirect()->route('admin.category.index');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $hasItem = PortfolioItem::where('category_id', $id)->count();
        if ($hasItem === 0) {
            $category->delete();
            return true;
        }

        return response([
            'status' => 'error'
        ]);

    }
}
