<?php

namespace App\Http\Controllers;

use App\Models\Beds;
use App\Http\Requests\StoreBedsRequest;
use App\Http\Requests\UpdateBedsRequest;

class BedsController extends Controller
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
    public function store(StoreBedsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $id = intval($id);

        $beds = Beds::where('room_id', $id)
            ->where('status','no')
            ->get();

        return response()->json($beds);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Beds $beds)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBedsRequest $request, Beds $beds)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Beds $beds)
    {
        //
    }
}
