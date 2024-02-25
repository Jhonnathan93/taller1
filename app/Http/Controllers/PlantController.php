<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class PlantController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = 'plants - Online Store';
        $viewData['subtitle'] = 'List of plants';
        $viewData['plants'] = Plant::all();

        return view('plant.index')->with('viewData', $viewData);
    }

    public function show(string $id): View
    {
        $viewData = [];
        $plant = Plant::findOrFail($id);
        $viewData['title'] = $plant['name'].' - Online Store';
        $viewData['subtitle'] = $plant['name'].' - Plant information';
        $viewData['plant'] = $plant;

        return view('plant.show')->with('viewData', $viewData);
    }

    public function create(): View
    {
        $viewData = []; //to be sent to the view
        $viewData['title'] = 'Create plant';

        return view('plant.create')->with('viewData', $viewData);
    }

    public function save(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'imageUrl' => 'required',
            'price' => 'required',
            'stock' => 'required',
        ]);
        Plant::create($request->only(['name', 'description', 'imageUrl', 'price', 'stock']));

        Session::flash('success', 'Element created successfully.');

        return redirect()->back();

    }

    public function delete($id)
    {
        $plant = Plant::findOrFail($id);
        $plant->delete();

        Session::flash('success', 'Plant deleted successfully.');

        return redirect()->route('plant.index');
    }
}
