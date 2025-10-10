<?php

namespace App\Http\Controllers\Admin;

use App\Models\Partner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StorePartnerRequest;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $partners = Partner::all();
        return view('admin.partners.index', compact('partners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.partners.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePartnerRequest $request)
    {
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '-' . $file->getClientOriginalName();
            $path = $file->storeAs('images', $fileName);
        }
        $data['image'] = $path;
        $partners = Partner::create($data);
        return redirect()->route('admin.partners.index')->with('message', 'Create successful!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $partners = Partner::findOrFail($id);
        return view('admin.partners.edit', compact('partners'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorePartnerRequest $request, string $id)
    {
        $partners = Partner::findOrFail($id);
        $data = $request->validated();
        if ($request->hasFile('image')) {
            Storage::delete('image');
            $file = $request->file('image');
            $fileName = time() . '-' . $file->getClientOriginalName();
            $path = $file->storeAs('images', $fileName);
        }
        $data['image'] = $path;
        $partners->update($data);
        return redirect()->route('admin.partners.index')->with('message', 'Update successful!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $partners = Partner::findOrFail($id);
        if ($partners->image && Storage::exists($partners->image)) {
            Storage::delete($partners->image);
        }
        $partners->delete();
        return back()->with('message', 'Delete successful!');
    }
}
