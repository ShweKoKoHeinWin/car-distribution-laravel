<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('backend.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('backend.categories.create');
    }

    public function store(Request $request)
    {

        $formFields = $request->validate([
            'title' => 'required',
            'logo' => 'required',
        ]);

        $img = $request->file('logo');

        $imgname = uniqid() . '_' . $img->getClientOriginalName();
        $img->move(public_path() . '/image/categories/', $imgname);

        $formFields['logo'] = $imgname;
        Category::create($formFields);

        return redirect('/backend/categories/create')->with('message', 'Category Created Successfully.');
    }

    public function destroy(Category $brand)
    {
        $brand->delete();
        return redirect('/backend/categories')->with('message', 'Deleted Successfully');
    }
}
