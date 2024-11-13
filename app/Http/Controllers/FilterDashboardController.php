<?php

namespace App\Http\Controllers;

use App\Models\Building;
use App\Models\FilterDashboard;
use App\Http\Requests\StoreFilterDashboardRequest;
use App\Http\Requests\UpdateFilterDashboardRequest;
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

        if (empty($buildings)) {
            $buildings = Building::all();
        }

        $from = $request->filled('arrive') ? $request->arrive : null;
        $to = $request->filled('leave') ? $request->leave : null;



        if ($from && $to) {

            $from = Carbon::createFromFormat('d-m-Y', $from)->format('d-m-Y');
            $to = Carbon::createFromFormat('d-m-Y', $to)->format('d-m-Y');
            $visits = Visit::whereBetween('leave', [$from, $to])->get();
        } else {
            $visits = Visit::all();
        }

        $floor = $request->floor;

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
