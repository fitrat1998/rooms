<?php

namespace App\Http\Controllers;

use App\Models\Building;
use App\Models\Floor;
use App\Models\Room;
use App\Http\Requests\StoreRoomRequest;
use App\Http\Requests\UpdateRoomRequest;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = Room::all();

        return view('rooms.index', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $buildings = Building::all();

        return view('rooms.add', compact('buildings'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoomRequest $request)
    {
//        dd($request);

        $room = Room::create([
            'floor_id' => $request->floors,
            'number'   => $request->rooms,
            'beds'     => $request->beds,
            'comment'  => $request->comment ?? 'mavjud emas',
        ]);


        return redirect()->route('rooms.index')->with('success','Xona muvaffaqiyatli qo`shildi');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $id = intval($id);

        $floors = Floor::where('building_id',$id)->get();

        return response()->json($floors);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $room = Room::find($id);

        $buildings = Building::all();

       $floors = Floor::where('building_id',$room->floor->building_id)->get();


       return view('rooms.edit', compact('room','buildings','floors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoomRequest $request,$id)
    {
//       dd($request);

       $room = Room::find($id);

       $room->update([
            'floor_id' => $request->floors,
            'number'   => $request->rooms,
            'beds'     => $request->beds,
            'comment'  => $request->comment ?? 'mavjud emas',
       ]);

       return redirect()->route('rooms.index')->with('success','Xona muvaffaqiyatli tahrirlandi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $room = Room::find($id);

        $room->delete();

        return redirect()->route('rooms.index')->with('success','Xona muvaffaqiyatli o`chirildi');
    }
}
