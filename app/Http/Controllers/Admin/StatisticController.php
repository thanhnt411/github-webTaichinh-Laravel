<?php

namespace App\Http\Controllers\Admin;

use App\Models\Statistic;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStatisticRequest;

class StatisticController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $statistics = Statistic::all();
        return view('admin.statistics.index', compact('statistics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.statistics.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStatisticRequest $request)
    {
        $statistics = Statistic::create($request->validated());
        return redirect()->route('admin.statistics.index')->with('message', 'Create successful!');
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
        $statistics = Statistic::findOrFail($id);
        return view('admin.statistics.edit', compact('statistics'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreStatisticRequest $request, string $id)
    {
        $statistics = Statistic::findOrFail($id);
        $statistics->update($request->validated());
        return redirect()->route('admin.statistics.index')->with('message', 'Create successful!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $statistics = Statistic::findOrFail($id);
        $statistics->delete();
        return back()->with('message', 'Delete successful!');
    }
}
