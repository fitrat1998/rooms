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

        $visits = Visit::where('status', '!=', 'archived')->get();

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
        $visit = Visit::where('guest_id', $id)->latest()->first();

        $rooms = Beds::where('status', 'no')->get();

//        return $visits;

        return view('visits.index', compact('visit', 'rooms'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $visit = Visit::find($id);

        $rooms = Beds::where('status', 'no')->get();

        $guests = Guest::all();

        $buildings = Building::all();

        return view('visits.edit', compact('visit', 'rooms', 'guests', 'buildings'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVisitRequest $request, $id)
    {

        $visit = Visit::findOrFail($id);

// Prepare the data array
        $data = [
            'guest_id' => $request->guest_id,
            'position' => $request->position ?? null,
            'reason' => $request->reason ?? null,
            'tarif' => $request->tarif,
            'visa' => $request->visa,
            'visa_start' => $request->visa === 'yes' ? $request->visa_start : null,
            'visa_end' => $request->visa === 'yes' ? $request->visa_end : null,
            'registration' => $request->reg,
            'registration_start' => $request->reg === 'yes' ? $request->reg_start : null,
            'registration_end' => $request->reg === 'yes' ? $request->reg_end : null,
            'comment' => $request->comment ?? null,
            'arrive' => $request->arrive ?? null,
            'leave' => $request->leave ?? null,
            'building_id' => $request->building ?? null,
            'floor_id' => $request->floor_id ?? null,
            'room_id' => $request->room_id ?? null,
            'bed_id' => $request->bed_id ?? null,
        ];

        if ($request->visa !== 'yes') {
            $data['visa_start'] = 'empty';
            $data['visa_end'] = 'empty';
        }

        if ($request->reg !== 'yes') {
            $data['registration_start'] = 'empty';
            $data['registration_end'] = 'empty';
        }


        $data = array_filter($data, function ($value) {
            return !is_null($value);
        });

        $visit->update($data);

        return redirect()->route('visits.index')->with('success', 'Tashrif muvaffaqiyatli yangilandi.');


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
