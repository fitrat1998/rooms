<?php

namespace App\Http\Controllers;

use App\Models\Beds;
use App\Models\Building;
use App\Models\Guest;
use App\Models\Visit;
use App\Http\Requests\StoreVisitRequest;
use App\Http\Requests\UpdateVisitRequest;

class VisitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guest = Guest::all();

        $beds = Beds::where('status', 'no')->get();

        $visits = Visit::where('status','!=','archived')->get();

        return view('visits.index', compact('guest', 'beds', 'visits'));
    }

    public function archived()
    {
        $guests = Guest::all();
        $beds = Beds::where('status', 'no')->get(); // Ikkilamchi: `Beds` model nomini `Bed` deb tekshirib chiqing
        $visits = Visit::where('status', 'archived')->get();
        return view('visits.archived', compact('guests', 'beds', 'visits'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $guests = Guest::all();

        $beds = Beds::where('status', 'no')->get();

        $buildings = Building::all();

//        return $guest;

        return view('visits.create', compact('guests', 'buildings'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVisitRequest $request)
    {
//        dd($request);

        $visit = Visit::create([
            'guest_id' => $request->guest_id,
            'position' => $request->position,
            'reason' => $request->reason,
            'tarif' => $request->tarif,
            'visa' => $request->visa ?? 'no',
            'visa_start' => $request->visa_start ?? 'empty',
            'visa_end' => $request->visa_end ?? 'empty',
            'registration' => $request->reg ?? 'no',
            'registration_start' => $request->reg_start ?? 'empty',
            'registration_end' => $request->reg_end ?? 'empty',
//            'room_id' => $request->room_id,
            'bed_id' => $request->bed_id,
            'comment' => $request->comment ?? "null",
            'arrive' => $request->arrive,
            'leave' => $request->leave,
            'status' => 'empty',
        ]);

        $bed = Beds::find($visit->bed_id);

        $bed->update([
            'status' => $visit->status,
        ]);

        return redirect()->route('visits.index')->with('success', 'Tashrif muvaffaqiyatli qo`shildi');
    }

    public function accept(UpdateVisitRequest $request, $id)
    {
        $visit = Visit::find($id);

        $bed = Beds::find($visit->bed_id);

        $bed->update([
            'status' => 'no'
        ]);

        $visit->update([
            'status' => 'archived'
        ]);

        return redirect()->route('visits.index')->with('success', 'Tashrif muvaffaqiyatli arxivga olindi');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $visit = Visit::where('guest_id', $id)->latest()->first();

        $rooms = Beds::where('status', 'no')->get();

//        return $visits;

        return view('visits.index', compact('visit', 'rooms'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVisitRequest $request, $id)
    {
        $visit = Visit::find($id);

        return $visit;
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $visit = Visit::find($id);

        $bed = Beds::find($visit->bed_id);

        $bed->delete();

        $visit->delete();

        return redirect()->route('guests.index')->with('success', 'Tashrif muvaffaqiyatli o`chirildi');
    }
}
