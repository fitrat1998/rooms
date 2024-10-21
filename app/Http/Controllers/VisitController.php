<?php

namespace App\Http\Controllers;

use App\Models\Beds;
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
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $guest = Guest::find($id);

        $beds = Beds::where('status','no')->get();

//        return $guest;

        return view('guests.create', compact('guest', 'beds'));
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
            'visa_period' => $request->visa_period ?? 'empty',
            'registration' => $request->reg ?? 'no',
            'registration_period' => $request->reg_period ?? 'empty',
            'bed_id' => $request->bed,
            'comment' => $request->comment,
            'arrive' => $request->arrive,
            'leave' => $request->leave,
            'status' => $request->order,
        ]);

        $bed = Beds::find($visit->bed_id);

        $bed->update([
            'status' => $visit->status,
        ]);

        return redirect()->route('guests.index')->with('success', 'Tashrif muvaffaqiyatli qo`shildi');
    }

     public function accept(UpdateVisitRequest $request,$id)
    {
       $visit = Visit::find($id);

       $visit->update([
           'status' => 'archived'
       ]);

       return redirect()->route('guests.index')->with('success','Tashrif muvaffaqiyatli arxivga olindi');
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

        return view('guests.visit', compact('visit', 'rooms'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVisitRequest $request,$id)
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

        $visit->delete();

        return redirect()->route('guests.index')->with('success','Tashrif muvaffaqiyatli o`chirildi');
    }
}
