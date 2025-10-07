<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFeedbackRequest;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $feedbacks = Feedback::all();
        return view('admin.feedbacks.index', compact('feedbacks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.feedbacks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFeedbackRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $fileName = time() . '-' . $file->getClientOriginalName();
            $path = $file->storeAs('images', $fileName);
        }
        $data['avatar'] = $path;
        $feedbacks = Feedback::create($data);
        return redirect()->route('admin.feedbacks.index')->with('message', 'Create successful!');
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
        $feedbacks = Feedback::findOrFail($id);
        return view('admin.feedbacks.edit', compact('feedbacks'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreFeedbackRequest $request, string $id)
    {
        $feedbacks = Feedback::findOrFail($id);
        $data = $request->validated();
        if ($request->hasFile('avatar')) {
            Storage::delete('avatar');
            $file = $request->file('avatar');
            $fileName = time() . '-' . $file->getClientOriginalName();
            $path = $file->storeAs('images', $fileName);
        }
        $data['avatar'] = $path;
        $feedbacks->update($data);
        return redirect()->route('admin.feedbacks.index')->with('message', 'Update successful!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $feedbacks = Feedback::findOrFail($id);
        if ($feedbacks->avatar && Storage::exists($feedbacks->avatar)) {
            Storage::delete($feedbacks->avatar);
        }
        $feedbacks->delete();
        return back()->with('message', 'Delete successful!');
    }
}
