<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CustomizableMaintenance;
use App\Models\RegularMaintenance;

class ServiceController extends Controller
{
    public function index()
    {
        $regularPlans = RegularMaintenance::all();
        $customizablePlans = CustomizableMaintenance::all();
        return view('backend.services.index', compact('regularPlans', 'customizablePlans'));
    }

    public function create()
    {
        return view('backend.services.create');
    }

    public function store(Request $request)
    {
        $title = null;
        $statements = null;
        $statement = null;
        $price = $request->get('price');
        if ($request->has('type')) {
            if ($request->get('type') == "regular") {
                $title = $request->get('title');
                $statements = $request->get('statements');

                $formFields = $request->validate([
                    'title' => 'required',
                    'statements' => 'required',
                    'price' => 'required'
                ]);
                RegularMaintenance::create($formFields);
            } else if ($request->get('type') == 'custom') {
                $statement = $request->get('statement');

                $formFields = $request->validate([
                    'statement' => 'required',
                    'price' => 'required'
                ]);
                CustomizableMaintenance::create($formFields);
            }
        }

        return redirect('backend/services/create')->with('message', 'Inserted New plan');
    }

    public function edit(string $type, string $id)
    {
        $plan = null;
        if ($type == 'regular') {
            $plan = RegularMaintenance::find($id);
        } else if ($type == 'custom') {
            $plan = CustomizableMaintenance::find($id);
        }
        return view('backend.services.edit', compact('type', 'plan'));
    }

    public function update(Request $request, string $type, string $id)
    {
        if ($type == 'regular') {
            $plan = RegularMaintenance::find($id);
            $formFields = $request->validate([
                'title' => 'required',
                'statements' => 'required',
                'price' => 'required'
            ]);
        } else if ($type == 'custom') {
            $plan = CustomizableMaintenance::find($id);
            $formFields = $request->validate([
                'statement' => 'required',
                'price' => 'required'
            ]);
        }
        $plan->update($formFields);
        return redirect('/backend/services/' . $type . '/' . $id . '/edit')->with('message', 'Updated Plan Successfully.');
    }

    public function destroy(string $type, string $id)
    {
        $Title = null;
        if ($type == 'regular') {
            RegularMaintenance::destroy($id);
            $Title = "Regular";
        } else if ($type == 'custom') {
            CustomizableMaintenance::destroy($id);
            $Title = "Customized";
        }
        return redirect('/backend/services')->with('message', 'Deleted A ' . $Title . ' Plan');
    }
}
