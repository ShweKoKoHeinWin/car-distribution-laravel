<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\MOdels\MainPageAsset;
use Illuminate\Support\Facades\Log;
use App\Models\Vehicle;
use App\Models\Brand;
use App\Models\Category;
use App\Models\CustomizableMaintenance;
use App\Models\RegularMaintenance;
use Illuminate\Support\Facades\Auth;


class PageController extends Controller
{
    public function index()
    {

        $assets = MainPageAsset::all();
        return view('frontend.interface.index', compact('assets'));
    }

    public function show()
    {
        $data = MainPageAsset::latest()->first();
        return view('frontend.interface.show', compact('data'));
    }

    public function create()
    {
        return view('frontend.interface.create');
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'banner_video' => 'required',
            'banner_text' => 'required',
            'about_img' => 'required',
            'about_text' => 'required',
            'about_imgs' => 'required',
            'location' => 'required',
            'phone' => 'required',
            'email' => ['required', 'email']
        ]);

        $video = $request->file('banner_video');

        if ($video->isValid()) {
            $videoname = uniqid() . '_' . $video->getClientOriginalName();
            $video->move(public_path('video'), $videoname);
            $formFields['banner_video'] = $videoname;
        } else {
            return response()->view('components.flash-message', ['message' => $video->getClientOriginalName() . "has error"]);
        }


        $aboutImg = $request->file('about_img');
        if ($aboutImg->isValid()) {
            $aboutImgName = uniqid() . '_' . $aboutImg->getClientOriginalName();
            $aboutImg->move(public_path() . '/image/cars/app/', $aboutImgName);
            $formFields['about_img'] = $aboutImgName;
        } else {
            return response()->view('components.flash-message', ['message' => $aboutImg->getClientOriginalName() . "has error"]);
        }

        $images = $request->file('about_imgs');
        $imgNameArr = [];

        foreach ($images as $image) {
            if ($image->isValid()) {
                $imageName = uniqid() . '_' . $image->getClientOriginalName();
                $image->move(public_path('image/cars/logos/'), $imageName);
                $imgNameArr[] = $imageName;
            } else {
                return response()->view('components.flash-message', ['message' => $image->getClientOriginalName() . "has error"]);
            }
        }

        $formFields['about_imgs'] = json_encode($imgNameArr);

        MainPageAsset::create($formFields);

        return redirect('/frontend/interface')->with('message', 'New Interface Is Added Successfully.');
    }


    public function edit($id)
    {
        $interface = MainPageAsset::find($id);
        return view('frontend.interface.edit', compact('interface'));
    }

    public function update(Request $request, $id)
    {
        $asset = MainPageAsset::find($id);

        $formFields = $request->validate([
            'banner_text' => 'required',
            'about_text' => 'required',
            'location' => 'required',
            'phone' => 'required',
            'email' => ['required', 'email']
        ]);

        if ($request->hasFile('banner_video')) {
            $video = $request->file('banner_video');

            if ($video->isValid()) {
                $videoname = uniqid() . '_' . $video->getClientOriginalName();
                $video->move(public_path('video'), $videoname);
                $formFields['banner_video'] = $videoname;
            } else {
                return response()->view('components.flash-message', ['message' => $video->getClientOriginalName() . "has error"]);
            }
        }

        if ($request->hasFile('about_img')) {

            $img = $request->file('about_img');

            if ($img->isValid()) {
                $imgname = uniqid() . '_' . $img->getClientOriginalName();
                $img->move(public_path() . '/image/cars/app/', $imgname);
                $formFields['about_img'] = $imgname;
            } else {
                return response()->view('components.flash-message', ['message' => $img->getClientOriginalName() . "has error"]);
            }
        }

        if ($request->hasFile('about_imgs')) {
            $images = $request->file('about_imgs');
            $imgNameArr = [];

            foreach ($images as $image) {
                if ($image->isValid()) {
                    $imageName = uniqid() . '_' . $image->getClientOriginalName();
                    $image->move(public_path('image/cars/logos/'), $imageName);
                    $imgNameArr[] = $imageName;
                } else {
                    return response()->view('components.flash-message', ['message' => $image->getClientOriginalName() . "has error"]);
                }
            }

            $formFields['about_imgs'] = json_encode($imgNameArr);
        }

        $asset->update($formFields);

        return redirect('/frontend/interface/edit/' . $id)->with('message', "Updated Successfully.");
    }

    public function destroy(string $page)
    {
        MainPageAsset::destroy($page);
        return redirect('/frontend/interface')->with('message', "An Interface Is Deleted.");
    }

    public function vehicles(Request $request)
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

        $brands = Brand::all();
        $categories = Category::all();
        $vehicles = Vehicle::latest()->filter(request(['brand', 'category', 'search', 'price']))->paginate(12);
        $data = MainPageAsset::latest()->first();
        return view('frontend.vehicles.index', compact('data', 'vehicles', 'brands', 'categories', 'filterTitleCategory', 'filterTitleBrand', 'filterTitle'));
    }

    public function services()
    {
        $data = MainPageAsset::latest()->first();
        $regularPlans = RegularMaintenance::all();
        $customizablePlans = CustomizableMaintenance::all();
        return view('frontend.services.index',  compact('regularPlans', 'customizablePlans', 'data'));
    }



    public function showNotifications()
    {
        $data = MainPageAsset::latest()->first();
        $user = Auth::user();
        $notifications = $user->unreadNotifications;
        // Mark all notifications as read


        return view('frontend.notifications.show', compact('notifications', 'data'));
    }

    public function clearNotifications()
    {
        auth()->user()->unreadNotifications->markAsRead();
        return redirect('/');
    }
}
