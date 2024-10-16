<?php

namespace App\Http\Controllers;

use App\Models\Floor;
use App\Models\FloorSection;
use App\Http\Requests\StoreFloorSectionRequest;
use App\Http\Requests\UpdateFloorSectionRequest;
use App\Models\Objects;
use App\Models\Section;
use Illuminate\Http\Request;


class FloorSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sections = Section::where('parent', 'floor')->get();
        $floors = Floor::all();
        $floors_id = Floor::pluck('object_id')->unique();
        $object = Objects::whereIn('id', $floors_id)->get();
        $count_f = count($floors);
        $floor_number = Floor::pluck('number');
//        dd($floor_number);

        return view('admin.floorsections.index', compact('floors', 'object', 'sections','count_f','floor_number'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFloorSectionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function excel(Request $request)
    {
        $floors = $request->get('floors');
        $floor_numbers = $request->get('floor_numbers');

        $floors_row = explode("$",$floors);

        $floors_col = [];

        foreach ($floors_row as $f) {
            $floors_col[] = explode('&',$f);
        }
        return response()->json($floor_numbers);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FloorSection $floorSection)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFloorSectionRequest $request, FloorSection $floorSection)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FloorSection $floorSection)
    {
        //
    }
}
