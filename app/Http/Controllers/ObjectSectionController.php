<?php

namespace App\Http\Controllers;

use App\Models\ObjectSection;
use App\Http\Requests\StoreObjectSectionRequest;
use App\Http\Requests\UpdateObjectSectionRequest;
use App\Models\Section;

class ObjectSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sections = Section::all();
        return view('admin.sections.index', compact('sections'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.objectsections.add');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreObjectSectionRequest $request)
    {
        $validated = $request->validated();

        $section = ObjectSection::create([
            'name' => $validated['name'],
            'parent' => $validated['parent'],
        ]);

        return redirect()->route('sections.index')->with('success','Qism muvvafaqiyatli qo`shildi');
    }

    /**
     * Display the specified resource.
     */
    public function show(ObjectSection $objectSection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ObjectSection $objectSection)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateObjectSectionRequest $request, ObjectSection $objectSection)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ObjectSection $objectSection)
    {
        //
    }
}
