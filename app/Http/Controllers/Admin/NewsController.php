<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNewsRequest;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::all();
        return view('admin.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNewsRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '-' . $file->getClientOriginalName();
            $path = $file->storeAs('images', $fileName);
        }
        if ($request->hasFile('author')) {
            $file = $request->file('author');
            $fileName = time() . '-' . $file->getClientOriginalName();
            $pathA = $file->storeAs('authors', $fileName);
        }
        $data['image'] = $path;
        $data['author'] = $pathA;
        $news = News::create($data);
        return redirect()->route('admin.news.index')->with('message', 'Create successful!');
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
        $news = News::findOrFail($id);
        return view('admin.news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreNewsRequest $request, string $id)
    {
        $news = News::findOrFail($id);
        $data = $request->validated();
        if ($request->hasFile('image')) {
            Storage::delete('image');
            $file = $request->file('image');
            $fileName = time() . '-' . $file->getClientOriginalName();
            $path = $file->storeAs('images', $fileName);
        }
        if ($request->hasFile('author')) {
            Storage::delete('author');
            $file = $request->file('author');
            $fileName = time() . '-' . $file->getClientOriginalName();
            $pathA = $file->storeAs('authors', $fileName);
        }
        $data['image'] = $path;
        $data['author'] = $pathA;
        $news->update($data);
        return redirect()->route('admin.news.index')->with('message', 'Create successful!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $news = News::findOrFail($id);
        if ($news->image && Storage::exists($news->image)) {
            Storage::delete($news->image);
        }
        if ($news->author && Storage::exists($news->author)) {
            Storage::delete($news->author);
        }
        $news->delete();
        return back()->with('message', 'Delete successful!');
    }
}
