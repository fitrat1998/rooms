<?php

namespace App\Http\Controllers;

use App\Models\Building;
use App\Models\FilterDashboard;
use App\Http\Requests\StoreFilterDashboardRequest;
use App\Http\Requests\UpdateFilterDashboardRequest;
use App\Models\Room;
use App\Models\Visit;
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

        if (empty($buildings)) {
            $buildings = Building::all();
        }

        $floor = $request->floor;

        $arrive = $request->filled('arrive') ? $request->arrive : null;
        $leave = $request->filled('leave') ? $request->leave : null;




        if ($arrive && $leave) {
            $visits = Visit::where(function ($query) use ($arrive, $leave) {
                $query->where('arrive', '>', $leave)
                    ->orWhere('leave', '<', $arrive);
            })->get();

            $bed_id = $visits->pluck('bed_id');
        } else {
            $visits = Visit::all();
        }


        if (empty($floor)) {
            $rooms = Room::all();
        } else {
            $rooms = Room::where('floor_id', $floor)->get();
        }


        return view('dashboard', compact('visits', 'rooms', 'buildings'));
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
