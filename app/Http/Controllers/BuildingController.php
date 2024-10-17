<?php

namespace App\Http\Controllers;

use App\Models\Building;
use App\Http\Requests\StoreBuildingRequest;
use App\Http\Requests\UpdateBuildingRequest;
use App\Models\Floor;

class BuildingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $buildings = Building::all();

        return view('buildings.index', compact('buildings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('buildings.add');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBuildingRequest $request)
    {
//        dd($request);

        $execute = Building::create([
            'name' => $request->name,
        ]);

        $floors = intval($request->floors);

        for ($i = 1; $i <= $floors; $i++) {
            $floor = Floor::create([
                'building_id' => $execute->id,
                'number' => $i
            ]);
        }


        return redirect()->route('buildings.index')->with('success', 'Bino muvaffaqiyatli qo`shildi');
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
        $building = Building::find($id);

        $floor = Floor::where('building_id', $building->id)->count();


        return view('buildings.edit', compact('building', 'floor'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBuildingRequest $request, $id)
    {
        $building = Building::find($id);

        $floors = Floor::where('building_id', $building->id)->get();

        foreach ($floors as $floor) {
            $floor->delete();
        }

        $floors = intval($request->floors);

        for ($i = 1; $i <= $floors; $i++) {
            $floor = Floor::create([
                'building_id' => $building->id,
                'number' => $i
            ]);
        }


        $building->update([
            'name' => $request->name,
        ]);


        return redirect()->route('buildings.index')->with('success', 'Bino muvaffaqiyatli tahrirlandi');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $building = Building::find($id);

        $building->delete();

        return redirect()->route('buildings.index')->with('success', 'Bino muvaffaqiyatli o`chirildi');

    }
}
