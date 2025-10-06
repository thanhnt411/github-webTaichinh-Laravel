<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use App\Models\Introduce;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '-' . $file->getClientOriginalName();
            $path = $file->storeAs('images', $fileName);
        }
        $data['image'] = $path;
        $categories = Category::create($data);
        return redirect()->route('admin.categories.index')->with('message', 'Create successful');
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
        $categories = Category::findOrFail($id);
        return view('admin.categories.edit', compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreCategoryRequest $request, string $id)
    {
        $categories = Category::findOrFail($id);
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '-' . $file->getClientOriginalName();
            $path = $file->storeAs('images', $fileName);
        }
        $data['image'] = $path;
        $categories->update($data);
        return redirect()->route('admin.categories.index')->with('message', 'Update successful');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categories = Category::findOrFail($id);
        if ($categories->image && Storage::exists($categories->image)) {
            Storage::delete($categories->image);
        }
        $categories->delete();
        return back()->with('message', 'delete successful');
    }
}
