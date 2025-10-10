<?php

namespace App\Http\Controllers\Admin;

use App\Models\Introduce;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreIntroduceRequest;

class IntroduceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $introduces = Introduce::all();
        return view('admin.introduces.index', compact('introduces'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.introduces.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreIntroduceRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '-' . $file->getClientOriginalName();
            $path  = $file->storeAs('images', $fileName);
        }
        $data['image'] = $path;

        if ($request->hasFile('video')) {
            $fileV = $request->file('video');
            $fileVName = time() . '-' . $file->getClientOriginalName();
            $pathV = $fileV->storeAs('videos', $fileVName);
        }
        $data['video'] = $pathV;

        $introduce = Introduce::create($data);
        return redirect()->route('admin.introduces.index')->with('message', 'Create successful!');
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
        $introduce = Introduce::findOrFail($id);
        return view('admin.introduces.edit', compact('introduce'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreIntroduceRequest $request, string $id)
    {
        $introduce = Introduce::findOrFail($id);
        $data = $request->validated();
        if ($request->hasFile('image')) {
            Storage::delete('image');
            $file = $request->file('image');
            $fileName = time() . '-' . $file->getClientOriginalName();
            $path  = $file->storeAs('images', $fileName);
        }
        $data['image'] = $path;

        if ($request->hasFile('video')) {
            Storage::delete('video');
            $fileV = $request->file('video');
            $fileVName = time() . '-' . $file->getClientOriginalName();
            $pathV = $fileV->storeAs('videos', $fileVName);
        }
        $data['video'] = $pathV;

        $introduce->update($data);
        return redirect()->route('admin.introduces.index')->with('message', 'Update successful!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $introduce = Introduce::findOrFail($id);
        if ($introduce->image && Storage::exists($introduce->image)) {
            Storage::delete($introduce->image);
        }
        if ($introduce->video && Storage::exists($introduce->video)) {
            Storage::delete($introduce->video);
        }
        $introduce->delete();
        return back()->with('message', 'Delete successful!');
    }
}
