<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\PortfolioItemDataTable;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\PortfolioItem;
use Illuminate\Http\Request;

class PortfolioItemController extends Controller
{

    public function index(PortfolioItemDataTable $dataTable)
    {
        return $dataTable->render('admin.portfolio-item.index');
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.portfolio-item.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => ['required', 'image', 'max:5000'],
            'title' => ['required', 'max:200'],
            'description' => ['required'],
            'category_id' => ['required', 'numeric', 'exists:categories,id'],
            'client' => ['max:200'],
            'website' => ['url']
        ]);

        $imagePath = handleUpload('image');

        $portfolioItem = new PortfolioItem();
        $portfolioItem->image = $imagePath;
        $portfolioItem->title = $request->title;
        $portfolioItem->description = $request->description;
        $portfolioItem->category_id = $request->category_id;
        $portfolioItem->client = $request->client;
        $portfolioItem->website = $request->website;
        $portfolioItem->save();

        toastr()->success('Portfolio Item Created Successfully!', 'Congrats');
        return redirect()->route('admin.portfolio-item.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $portfolioItem = PortfolioItem::findOrFail($id);
        $categories = Category::all();
        return view("admin.portfolio-item.edit", compact("portfolioItem", "categories"));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => ['image', 'max:5000'],
            'title' => ['required', 'max:200'],
            'description' => ['required'],
            'category_id' => ['required', 'numeric', 'exists:categories,id'],
            'client' => ['max:200'],
            'website' => ['url']
        ]);

        $portfolioItem = PortfolioItem::findOrFail($id);
        $imagePath = handleUpload('image', $portfolioItem);

        $portfolioItem->image = (!empty($imagePath)) ? $imagePath : $portfolioItem->image;
        $portfolioItem->title = $request->title;
        $portfolioItem->description = $request->description;
        $portfolioItem->category_id = $request->category_id;
        $portfolioItem->client = $request->client;
        $portfolioItem->website = $request->website;
        $portfolioItem->save();

        toastr()->success('Portfolio Item Updated Successfully!', 'Congrats');
        return redirect()->route('admin.portfolio-item.index');
    }

    public function destroy($id)
    {
        $portfolioItem = PortfolioItem::findOrfail($id);
        deleteFileIfExists($portfolioItem->image);
        $portfolioItem->delete();
    }
}
