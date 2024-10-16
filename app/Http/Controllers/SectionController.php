<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Http\Requests\StoreSectionRequest;
use App\Http\Requests\UpdateSectionRequest;

class SectionController extends Controller
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
        return view('admin.sections.add');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSectionRequest $request)
    {
        $validated = $request->validated();

        $section = Section::create([
            'name' => $validated['name'],
            'parent' => $validated['parent'],
        ]);

        return redirect()->route('sections.index')->with('success', 'Qism muvvafaqiyatli qo`shildi');
    }

    /**
     * Display the specified resource.
     */
    public function show(Section $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $section = Section::find($id);

        return view('admin.sections.edit', compact('section'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSectionRequest $request, $id)
    {
        $validated = $request->validated();

        $section = Section::find($id);

        $section->update([
            'name' => $validated['name'],
            'parent' => $validated['parent'],
        ]);

        return redirect()->route('sections.index')->with('success', 'Qism muvvafaqiyatli tahrirlandi');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $section = Section::find($id)->delete();
        return redirect()->route('sections.index')->with('success', 'Qism muvvafaqiyatli o`chirildi');

    }
}
