<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function userIndex(){
        $services = Service::all();
        return view('user.services', compact('services'));
    }

    public function index() {
        $services = Service::all();
        return view('admin.service.view', compact('services'));

    }

    public function create() {
        return view('admin.service.create');

    }

    public function store(Request $request) {
        $validated = $request->validate([
            'name'=> 'required',
            'description' => 'required',
            'price' => 'required'
        ]);

        $service = Service::create($validated);
        return redirect()->route('admin.viewServices')
                ->with('success', 'Admin Service created successfully.');

    }

    public function edit(string $id) {
        $service = Service::findOrFail($id);
        return view('admin.service.edit', compact('service'));

    }

    public function update(Request $request, string $id) {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required'
        ]);

        $service = Service::findOrFail($id);
        $service->update($validated);

        return redirect()->route('admin.viewServices')
                ->with('success', 'Admin Service updated successfully.');

    }

    public function destroy(string $id) {
        $service = Service::findOrFail($id);
        $service->delete();
        return redirect()->route('admin.viewServices')
                ->with('success', 'Admin Service deleted successfully.');


    }
}
