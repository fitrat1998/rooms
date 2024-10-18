<?php

namespace App\Http\Controllers;

use App\Models\Citizenship;
use App\Http\Requests\StoreCitizenshipRequest;
use App\Http\Requests\UpdateCitizenshipRequest;

class CitizenshipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $citizenships = Citizenship::all();

        return view('citizenships.index', compact('citizenships'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('citizenships.add');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCitizenshipRequest $request)
    {
//        dd($request);

        $citizenship = Citizenship::create([
            'name' => $request->name,
        ]);


        return redirect()->route('citizenships.index')->with('success', 'Davlar muvaffaqiyatli qo`shildi');
    }

    /**
     * Display the specified resource.
     */
    public function show(Citizenship $citizenship)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $citizenship = Citizenship::find($id);

        return view('citizenships.edit', compact('citizenship'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCitizenshipRequest $request, $id)
    {
        $citizenship = Citizenship::find($id);

        $citizenship->update([
             'name' => $request->name,
        ]);

        return redirect()->route('citizenships.index')->with('success', 'Davlar muvaffaqiyatli tahrirlandi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $citizenship = Citizenship::find($id);

        $citizenship->delete();

        return redirect()->route('citizenships.index')->with('success', 'Davlar muvaffaqiyatli o`chirildi');
    }
}
