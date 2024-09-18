<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\BlogDataTable;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    public function index(BlogDataTable $dataTable)
    {
        return $dataTable->render('admin.blog.index');
    }

    public function create()
    {
        $categories = BlogCategory::all();
        return view("admin.blog.create", compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => ['required', 'image', 'max:5000'],
            'title' => ['required', 'string', 'max:200'],
            'description' => ['required'],
            'category' => ['required', 'numeric', 'exists:blog_categories,id'],
        ]);

        $imagePath = handleUpload('image');
        $blog = new Blog();
        $blog->image = $imagePath;
        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->category = $request->category;
        $blog->save();

        toastr()->success('Created successfully!', 'Congrats');
        return redirect()->route('admin.blog.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        $categories = BlogCategory::all();
        return view("admin.blog.edit", compact('blog', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => ['image', 'max:5000'],
            'title' => ['required', 'string', 'max:200'],
            'description' => ['required'],
            'category' => ['required', 'numeric', 'exists:blog_categories,id'],
        ]);

        $blog = Blog::findOrFail($id);
        $imagePath = handleUpload('image', $blog);

        $blog->image = (!empty($imagePath)) ? $imagePath : $blog->image;
        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->category = $request->category;
        $blog->save();

        toastr()->success('Updated successfully!', 'Congrats');
        return redirect()->route('admin.blog.index');
    }

    public function destroy($id)
    {
        $blog = Blog::findOrfail($id);
        deleteFileIfExists($blog->image);
        $blog->delete();
    }
}
