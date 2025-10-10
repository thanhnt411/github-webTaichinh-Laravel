<?php

namespace App\Http\Controllers\Admin;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreServiceRequest;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::all();
        return view('admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreServiceRequest $request)
    {
        $data = $request->all();
        if ($request->hasFile('icon')) {
            $file = $request->file('icon');
            $fileName = time() . '-' . $file->getClientOriginalName();
            $path = $file->storeAs('icons', $fileName);
        }
        $data['icon'] = $path;
        $services = Service::create($data);
        return redirect()->route('admin.services.index')->with('message', 'Create successful');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $services = Service::findOrFail($id);
        return view('admin.services.edit', compact('services'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreServiceRequest $request, string $id)
    {
        $services = Service::findOrFail($id);
        $data = $request->validated();
        if ($request->hasFile('icon')) {
            Storage::delete('icon');
            $file = $request->file('icon');
            $fileName = time() . '-' . $file->getClientOriginalName();
            $path = $file->storeAs('icons', $fileName);
        }
        $data['icon'] = $path;
        $services->update($data);
        return redirect()->route('admin.services.index')->with('message', 'Update successful!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $services = Service::findOrFail($id);
        if ($services->image && Storage::exists($services->image)) {
            Storage::delete($services->image);
        }
        $services->delete();
        return back()->with('message', 'Delete successful!');
    }
}
