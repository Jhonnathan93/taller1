<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class PlantController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = 'Plants - Online Store';
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
        $viewData = [];
        $viewData['title'] = 'Create plant';

        return view('plant.create')->with('viewData', $viewData);
    }

    private function validatePlantRequest(Request $request): array
    {
        return $request->validate([
            'name' => 'required',
            'description' => 'required',
            'imageUrl' => 'required',
            'price' => 'required|numeric|gt:0',
            'stock' => 'required|numeric|gte:0',
        ]);
    }

    public function save(Request $request): RedirectResponse
    {
        $validatedData = $this->validatePlantRequest($request);

        Plant::create($request->only(['name', 'description', 'imageUrl', 'price', 'stock']));

        Session::flash('success', 'Element created successfully.');

        return redirect()->back();

    }

    public function delete(string $id): RedirectResponse
    {
        Plant::destroy($id);

        Session::flash('success', 'Plant deleted successfully.');

        return redirect()->route('plant.index');
    }
}
