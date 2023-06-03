<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\Brand;
use App\Models\Category;
use App\Notifications\NewMessageNotification;
use App\Models\User;
use Spatie\Permission\Models\Role;


class VehicleController extends Controller
{
    public function index(Request $request)
    {
        $filterTitle = null;
        $filterTitleBrand = null;
        $filterTitleCategory = null;
        if ($request->has('search')) {
            $filterTitle = $request->get('search');
        } else if ($request->has('brand')) {
            $filterTitle = $request->get('brand');
            $filterTitleBrand = Brand::find($filterTitle);
        } else if ($request->has('category')) {
            $filterTitle = $request->get('category');
            $filterTitleCategory = Category::find($filterTitle);
        } else if ($request->has('price')) {
            $filterTitle = "Vehicles Under $" . $request->get('price');
        } else {
            $filterTitle = "All Vehicles";
        }

        $vehicles = Vehicle::latest()->filter(request(['brand', 'category', 'search', 'price']))->get();
        $brands = Brand::all();
        $categories = Category::all();
        return view('backend.vehicles.index', compact('vehicles', 'brands', 'categories', 'filterTitle', 'filterTitleBrand', 'filterTitleCategory'));
    }

    public function show(string $id)
    {
        $vehicle = Vehicle::find($id);
        return view('frontend.vehicles.show', ['vehicle' => $vehicle]);
    }

    public function create()
    {
        $brands = Brand::all();
        $categories = Category::all();


        return view('backend.vehicles.create', compact('brands', 'categories'));
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'model' => 'required',
            'brand_id' => 'required',
            'category_id' => 'required',
            'engine' => 'required',
            'transmission' => 'required',
            'fuel' => 'required',
            'price' => 'required',
            'front_img' => 'required',
            'side_img' => 'required',
            'back_img' => 'required',
            'inside_img' => 'required',
            'purpose' => 'required'
        ]);

        $front_img = $request->file('front_img');
        if ($front_img->isValid()) {
            $front_img_name = uniqid() . '_' . $front_img->getClientOriginalName();
            $front_img->move(public_path('image/vehicles'), $front_img_name);
            $formFields['front_img'] = $front_img_name;
        }
        $side_img = $request->file('side_img');
        if ($side_img->isValid()) {
            $side_img_name = uniqid() . '_' . $side_img->getClientOriginalName();
            $side_img->move(public_path('image/vehicles'), $side_img_name);
            $formFields['side_img'] = $side_img_name;
        }
        $back_img = $request->file('back_img');
        if ($back_img->isValid()) {
            $back_img_name = uniqid() . '_' . $front_img->getClientOriginalName();
            $back_img->move(public_path('image/vehicles'), $back_img_name);
            $formFields['back_img'] = $back_img_name;
        }
        $inside_img = $request->file('inside_img');
        if ($inside_img->isValid()) {
            $inside_img_name = uniqid() . '_' . $front_img->getClientOriginalName();
            $inside_img->move(public_path('image/vehicles'), $inside_img_name);
            $formFields['inside_img'] = $inside_img_name;
        }

        $vehicle = Vehicle::create($formFields);

        $message = "A new Vehicle - $vehicle->model is available now. Check that out!";
        $type = 'New Vehicle Uploaded';
        $link = '/backend/vehicles/' . $vehicle->id . '/show';
        $role = Role::where('name', 'Member')->first();
        $users = User::role($role)->get();
        $users->each(function ($user)  use ($type, $message, $link) {
            $user->notify(new NewMessageNotification($type, $message, $link));
        });

        return redirect('backend/vehicles')->with('message', "Created A NEW Vehicle Successfully.");
    }

    public function edit(string $id)
    {
        $vehicle = Vehicle::find($id);
        $brands = Brand::all();
        $categories = Category::all();
        return view('backend.vehicles.edit', compact('vehicle', 'brands', 'categories'));
    }

    public function update(Request $request, string $id)
    {
        $vehicle = Vehicle::find($id);

        $formFields = $request->validate([
            'model' => 'required',
            'brand_id' => 'required',
            'category_id' => 'required',
            'engine' => 'required',
            'transmission' => 'required',
            'fuel' => 'required',
            'price' => 'required'
        ]);


        if ($request->hasFile('front_img')) {
            $front_img = $request->file('front_img');
            if ($front_img->isValid()) {
                $front_img_name = uniqid() . '_' . $front_img->getClientOriginalName();
                $front_img->move(public_path('image/vehicles/'), $front_img_name);
                $formFields['front_img'] = $front_img_name;
            }
        }
        if ($request->hasFile('side_img')) {
            $side_img = $request->file('front_img');
            if ($side_img->isValid()) {
                $side_img_name = uniqid() . '_' . $side_img->getClientOriginalName();
                $side_img->move(public_path('image/vehicles/'), $side_img_name);
                $formFields['side_img'] = $side_img_name;
            }
        }
        if ($request->hasFile('back_img')) {
            $back_img = $request->file('front_img');
            if ($back_img->isValid()) {
                $back_img_name = uniqid() . '_' . $back_img->getClientOriginalName();
                $back_img->move(public_path('image/vehicles/'), $back_img_name);
                $formFields['back_img'] = $back_img_name;
            }
        }
        if ($request->hasFile('inside_img')) {
            $inside_img = $request->file('inside_img');
            if ($inside_img->isValid()) {
                $inside_img_name = uniqid() . '_' . $inside_img->getClientOriginalName();
                $inside_img->move(public_path('image/vehicles/'), $inside_img_name);
                $formFields['inside_img'] = $inside_img_name;
            }
        }

        $vehicle->update($formFields);



        return redirect('/backend/vehicles/' . $vehicle->id . '/edit')->with('message', "Updated " . $vehicle->brand->title . ' ' . $vehicle->model . " Successfully.");
    }

    public function destroy(string $id)
    {
        Vehicle::destroy($id);
        return redirect('/backend/vehicles')->with('message', "Deleted Successfully.");
    }
}
