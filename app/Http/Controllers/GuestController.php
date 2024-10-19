<?php

namespace App\Http\Controllers;

use App\Models\Beds;
use App\Models\Citizenship;
use App\Models\Guest;
use App\Http\Requests\StoreGuestRequest;
use App\Http\Requests\UpdateGuestRequest;
use App\Models\Room;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guests = Guest::all();

        $rooms = Beds::where('status','no')->get();

        return view('guests.index', compact('guests','rooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $citizenships = Citizenship::all();

        return view('guests.add', compact('citizenships'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGuestRequest $request)
    {
        $guest = Guest::create([
            'fullname' => $request->name,
            'citizenship_id' => $request->citizenship,
            'passport_number' => $request->passport
        ]);

        return redirect()->route('guests.index')->with('success', 'Mehmon muvaffaqiyatli qo`shildi');
    }

    /**
     * Display the specified resource.
     */
    public function show(Guest $guest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $citizenships = Citizenship::all();

        $guest = Guest::find($id);

        return view('guests.edit', compact('citizenships', 'guest'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGuestRequest $request, $id)
    {
        $guest = Guest::find($id);

        $guest->update([
            'fullname' => $request->name,
            'citizenship_id' => $request->citizenship,
            'passport_number' => $request->passport
        ]);

        return redirect()->route('guests.index')->with('success', 'Mehmon muvaffaqiyatli tahrirlandi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $guest = Guest::find($id);

        $guest->delete();

        return redirect()->route('guests.index')->with('success', 'Mehmon muvaffaqiyatli o`chirildi');

    }
}
