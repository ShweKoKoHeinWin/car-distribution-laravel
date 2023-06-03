<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Validation\Rule;


class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        return view('backend.brands.index', compact('brands'));
    }

    public function create()
    {
        return view('backend.brands.create');
    }

    public function store(Request $request)
    {

        $formFields = $request->validate([
            'title' => 'required',
            'logo' => 'required',
        ]);

        $img = $request->file('logo');

        $imgname = uniqid() . '_' . $img->getClientOriginalName();
        $img->move(public_path() . '/image/brands/', $imgname);

        $formFields['logo'] = $imgname;
        Brand::create($formFields);

        return redirect('/backend/brands/create')->with('message', 'Brand Created Successfully.');
    }

    public function destroy(Brand $brand)
    {
        $brand->delete();
        return redirect('/backend/brands')->with('message', 'Deleted Successfully');
    }
}
