<?php

namespace App\Http\Controllers\Admin;

use App\Models\Training;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreTrainingRequest;

class TrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trainings = Training::all();
        return view('admin.trainings.index', compact('trainings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.trainings.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTrainingRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '-' . $file->getClientOriginalName();
            $path = $file->storeAs('images', $fileName);
        }
        $data['image'] = $path;
        $trainings = Training::create($data);
        return redirect()->route('admin.trainings.index')->with('message', 'Create successful');
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
        $training = Training::findOrFail($id);
        return view('admin.trainings.edit', compact('training'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreTrainingRequest $request, string $id)
    {
        $training = Training::findOrFail($id);
        $data = $request->validated();
        if ($request->hasFile('image')) {
            Storage::delete('image');
            $file = $request->file('image');
            $fileName = time() . '-' . $file->getClientOriginalName();
            $path = $file->storeAs('images', $fileName);
        }
        $data['image'] = $path;
        $training->update($data);
        return redirect()->route('admin.trainings.index')->with('message', 'Create successful');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $training = Training::findOrFail($id);
        if ($training->image && Storage::exists($training->image)) {
            Storage::delete($training->image);
        }
        $training->delete();
        return back()->with('message', 'Delete successful');
    }
}
