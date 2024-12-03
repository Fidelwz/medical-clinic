<?php

namespace App\Http\Controllers;

use App\Models\Office;
use Gate;
use Illuminate\Http\Request;

class OfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $offices = Office::all();
        return view("office.index",compact('offices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('haveaccess', 'office.create');
        return view('office.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        Office::create($request->all());
        return redirect()->route('office.index')->with('status_success', 'Consultorio creado correctamente');
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
        Gate::authorize('haveaccess', 'office.edit');
        $office = Office::findOrFail($id);
        return view('office.edit', compact('office'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        Office::findOrFail($id)->update($request->all());
        return redirect()->route('office.index')->with('status_success', 'Consultorio actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        Gate::authorize('haveaccess', 'office.delete');
        Office::destroy($id);
        return redirect()->route('office.index')->with('status_success', 'Consultorio eliminado correctamente');
    }
}
