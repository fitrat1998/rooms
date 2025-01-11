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
use Illuminate\Support\Facades\DB;


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
//            // Inputlar
//            $floorId = $request->input('floor');     // floor_id input
//            $buildingId = $request->input('building'); // building_id input
//            $startDate = $request->input('start_date');  // start_date input
//            $endDate = $request->input('end_date');      // end_date input
//
//            // Validatsiya
//            if (($startDate && !$endDate) || (!$startDate && $endDate)) {
//                return response()->json(['message' => 'Iltimos, har ikkala sana: boshlanish va tugash sanalarini kiriting.'], 400);
//            }
//
//            // So'rov
//            $visits = DB::table('beds')
//                ->join('rooms', 'beds.room_id', '=', 'rooms.id')
//                ->join('floors', 'rooms.floor_id', '=', 'floors.id')
//                ->leftJoin('visits', function ($join) use ($startDate, $endDate) {
//                    $join->on('beds.id', '=', 'visits.bed_id')
//                        ->where(function ($query) use ($startDate, $endDate) {
//                            if ($startDate && $endDate) {
//                                $query->whereBetween('visits.arrive', [$startDate, $endDate])
//                                    ->orWhereBetween('visits.leave', [$startDate, $endDate])
//                                    ->orWhere(function ($query) use ($startDate, $endDate) {
//                                        $query->where('arrive', '<=', $startDate)
//                                            ->where('leave', '>=', $endDate);
//                                    });
//                            }
//                        });
//                })
//                ->when($floorId, function ($query, $floorId) {
//                    return $query->where('rooms.floor_id', $floorId); // floor_id filtr
//                })
//                ->when($buildingId, function ($query, $buildingId) {
//                    return $query->where('floors.building_id', $buildingId); // building_id filtr
//                })
//                ->select(
//                    'rooms.id as id',
//                    'rooms.number as room_name',
//                    'rooms.floor_id as floor_id',
//                    'floors.building_id as building_id',
//                    'beds.id as bed_id',
//                    'beds.number as bed_name',
//                    DB::raw('CASE WHEN visits.id IS NULL THEN "Bo\'sh" ELSE "Band" END as status'),
//                    DB::raw('DATE_FORMAT(visits.arrive, "%Y-%m-%d") as arrive_date'),
//                    DB::raw('DATE_FORMAT(visits.leave, "%Y-%m-%d") as leave_date')
//                )
//                ->get();
//
//
//            if ($visits->isEmpty()) {
//                return response()->json(['message' => 'Hech qanday ma\'lumot topilmadi.'], 404);
//            }
//
//
//            $buildings = Building::all();
//
//            $buildings_id = Building::pluck('id');
//
//            $floors = Floor::whereIn('building_id', $buildings_id)->pluck('id');
//
//            $rooms = Room::whereIn('floor_id', $floors);

        // Inputlar
        $floorId = $request->input('floor');     // floor_id input
        $buildingId = $request->input('building'); // building_id input
        $startDate = $request->input('start_date');  // start_date input
        $endDate = $request->input('end_date');      // end_date input

        $visits = DB::table('beds')
            ->join('rooms', 'beds.room_id', '=', 'rooms.id')
            ->join('floors', 'rooms.floor_id', '=', 'floors.id')
            ->leftJoin('visits', function ($join) use ($startDate, $endDate) {
                $join->on('beds.id', '=', 'visits.bed_id')
                    ->where(function ($query) use ($startDate, $endDate) {
                        if ($startDate && $endDate) {
                            $query->whereBetween('visits.arrive', [$startDate, $endDate])
                                ->orWhereBetween('visits.leave', [$startDate, $endDate])
                                ->orWhere(function ($query) use ($startDate, $endDate) {
                                    $query->where('arrive', '<=', $startDate)
                                        ->where('leave', '>=', $endDate);
                                });
                        }
                    });
            })
            ->when($floorId, function ($query, $floorId) {
                return $query->where('rooms.floor_id', $floorId); // floor_id filtr
            })
            ->when($buildingId, function ($query, $buildingId) {
                return $query->where('floors.building_id', $buildingId); // building_id filtr
            })
            ->select(
                'rooms.id as room_id',
                'rooms.number as room_name',
                'rooms.floor_id as floor_id',
                'floors.building_id as building_id',
                'beds.id as bed_id',
                'beds.number as bed_name',
                'visits.id as visit_id',
                'visits.guest_id as guest_id',
                'visits.room_id as guest_room_id',
                'visits.bed_id as guest_room_id',
                'visits.arrive as guest_arrive',
                'visits.leave as guest_leave',
                DB::raw('CASE WHEN visits.id IS NULL THEN "Bo\'sh" ELSE "Band" END as status'),
            )
            ->get();

        $buildings = Building::all();

        $buildings_id = Building::pluck('id');

        $floors = Floor::whereIn('building_id', $buildings_id)->pluck('id');

        $rooms = Room::whereIn('floor_id', $floors);

        return view('dashboard', compact('visits', 'rooms', 'buildings'));


        dd($places);


        $from = $request->filled('arrive') ? $request->arrive : null;
        $to = $request->filled('leave') ? $request->leave : null;
        $building = $request->filled('building') ? $request->building : null;

//        dd($building);

        if ($building == null) {

            $visits = Visit::all();

            $rooms = Room::all();


            $buildings = Building::all();


            return view('dashboard', compact('visits', 'rooms', 'buildings'));
        }

        if (!$building && $building != null) {


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

            $buildings = Building::where('id', $building)->get();

            $buildings_id = $buildings->pluck('id');


            $floors = Floor::whereIn('building_id', $buildings_id)->pluck('id');

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


    }

    /**
     * Display the specified resource.
     */
    public
    function show(FilterDashboard $filterDashboard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public
    function edit(FilterDashboard $filterDashboard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public
    function update(UpdateFilterDashboardRequest $request, FilterDashboard $filterDashboard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public
    function destroy(FilterDashboard $filterDashboard)
    {
        //
    }
}
