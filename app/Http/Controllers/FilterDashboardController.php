<?php

namespace App\Http\Controllers;

use App\Models\Beds;
use App\Models\Building;
use App\Models\FilterDashboard;
use App\Http\Requests\StoreFilterDashboardRequest;
use App\Http\Requests\UpdateFilterDashboardRequest;
use App\Models\Floor;
use App\Models\Room;
use App\Models\Visit;
use Carbon\Carbon;
use Illuminate\Http\Request;


class FilterDashboardController extends Controller
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFilterDashboardRequest $request)
    {
        //
    }

    public function filters(Request $request)
    {

        $from = $request->filled('arrive') ? $request->arrive : null;
        $to = $request->filled('leave') ? $request->leave : null;
        $building = $request->filled('building') ? $request->building : null;

        if (!$building) {

            $buildings = Building::all();

            $floors = Floor::where('building_id', $buildings)->pluck('id');

            $rooms = Room::whereIn('floor_id', $floors);

            if ($from && $to) {

                $from = Carbon::createFromFormat('d-m-Y', $from)->format('d-m-Y');
                $to = Carbon::createFromFormat('d-m-Y', $to)->format('d-m-Y');

                $visits = Visit::whereBetween('leave', [$from, $to])->get();

            } else {
                $visits = Visit::all();
            }

            $floor = $request->floor;

            $room_ids = $visits->pluck('room_id');

            $bed_ids = $visits->pluck('bed_id');

            $uniqueRoomIds = Beds::whereNotIn('id', $bed_ids)
                ->distinct()
                ->pluck('room_id');

            if (empty($floor)) {
                $rooms = Room::whereIn('id', $uniqueRoomIds)->get();
            } else {
                $rooms = Room::whereIn('id', $uniqueRoomIds)
                    ->where('floor_id', $floor)
                    ->get();
            }


        } elseif ($request->filled('floor')) {

            if ($floor = $request->floor) {
                $buildings = $request->filled('building') ? $request->building : null;

                $floors = Floor::where('building_id', $buildings)->pluck('id');

                $rooms = Room::whereIn('floor_id', $floors);

                if ($from && $to) {

                    $from = Carbon::createFromFormat('d-m-Y', $from)->format('d-m-Y');
                    $to = Carbon::createFromFormat('d-m-Y', $to)->format('d-m-Y');

                    $visits = Visit::whereBetween('leave', [$from, $to])->get();

                } else {
                    $visits = Visit::all();
                }


                $room_ids = $visits->pluck('room_id');

                $bed_ids = $visits->pluck('bed_id');

                $uniqueRoomIds = Beds::whereNotIn('id', $bed_ids)
                    ->distinct()
                    ->pluck('room_id');

                if (empty($floor)) {
                    $rooms = Room::whereIn('id', $uniqueRoomIds)->get();
                } else {
                    $rooms = Room::whereIn('id', $uniqueRoomIds)
                        ->where('floor_id', $floor)
                        ->get();
                }
            }

        } else {

            $building = $request->filled('building') ? $request->building : null;

            $buildings = Building::where('id',$building)->get();

            $buildings_id = $buildings->pluck('id');


            $floors = Floor::whereIn('building_id', $buildings_id )->pluck('id');

            $rooms = Room::whereIn('floor_id', $floors);

            if ($from && $to) {

                $from = Carbon::createFromFormat('d-m-Y', $from)->format('d-m-Y');
                $to = Carbon::createFromFormat('d-m-Y', $to)->format('d-m-Y');

                $visits = Visit::whereBetween('leave', [$from, $to])->get();

            } else {
                $visits = Visit::all();
            }


            $room_ids = $visits->pluck('room_id');

            $bed_ids = $visits->pluck('bed_id');

            $uniqueRoomIds = Beds::whereNotIn('id', $bed_ids)
                ->distinct()
                ->pluck('room_id');


                $rooms = Room::whereIn('id', $uniqueRoomIds)
                    ->whereIn('floor_id', $floors)
                    ->get();

//            dd(1);

        }


        $buildings = Building::all();

        return view('dashboard', compact('visits', 'rooms', 'buildings'));


//
//        if ($from && $to) {
//
//            $from = Carbon::createFromFormat('d-m-Y', $from)->format('d-m-Y');
//            $to = Carbon::createFromFormat('d-m-Y', $to)->format('d-m-Y');
//
//            $visits = Visit::whereBetween('leave', [$from, $to])->get();
//
//        } else {
//            $visits = Visit::all();
//        }
//
//        $floor = $request->floor;
//
//        $room_ids = $visits->pluck('room_id');
//
//        $bed_ids = $visits->pluck('bed_id');
//
//        $uniqueRoomIds = Beds::whereNotIn('id', $bed_ids)
//            ->distinct()
//            ->pluck('room_id');
//
//        if (empty($floor)) {
//            $rooms = Room::whereIn('id', $uniqueRoomIds)->get();
//        } else {
//            $rooms = Room::whereIn('id', $uniqueRoomIds)
//                ->where('floor_id', $floor)
//                ->get();
//        }


    }

    /**
     * Display the specified resource.
     */
    public function show(FilterDashboard $filterDashboard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FilterDashboard $filterDashboard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFilterDashboardRequest $request, FilterDashboard $filterDashboard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FilterDashboard $filterDashboard)
    {
        //
    }
}
