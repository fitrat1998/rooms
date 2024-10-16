<?php

namespace App\Http\Controllers;

use App\Models\Flat;
use App\Models\Floor;
use App\Models\Objects;
use App\Http\Requests\StoreObjectsRequest;
use App\Http\Requests\UpdateObjectsRequest;
use App\Models\ObjectSection;
use App\Models\Section;
use Illuminate\Support\Facades\DB;

class ObjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $objects = Objects::all();

        $sections = Section::all();

        return view('admin.objects.index', compact('objects', 'sections'));
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
    public function store(StoreObjectsRequest $request)
    {
        $validated = $request->validated();
        $existsobjects = Objects::where('name', $validated['object_name'])->first();

//        dd($request);
        if (empty($existsobjects)) {
            $objects = Objects::create([
                'name' => $validated['object_name']
            ]);
            foreach ($request->ob_sec as $k => $ob) {
                $sec_ob = DB::table('object_has_section')
                    ->where('objects_id', $objects->id)
                    ->where('sections_id', $ob)
                    ->first();
                if (!$sec_ob) {
                    DB::table('object_has_section')->insert([
                        'objects_id' => $objects->id,
                        'sections_id' => $ob
                    ]);
                }
            }
        }
        $parsedfloors = explode('/', $request->get('floors'));
        $parsedflats = explode('/', $request->get('rooms'));

        $floors_end = $parsedfloors[1] ?? 0;
        $floors_start = $parsedfloors[0] ?? 0;

        $floors_s = $floors_end - $floors_start + 1;

        $floors_room = ($parsedflats[1] ?? 0) / $floors_s;
        $c = 0;

        for ($i = $floors_start; $i <= $floors_end; $i++) {
            if (($existsobjects)) {
                $floor = Floor::where('objects_id', $existsobjects->id)
                    ->where('number', $i)
                    ->first();
            }

            $floor = [];
            if (!$floor) {
//                dd($existsobjects->id);
                $floor = Floor::create([
                    'objects_id' => $objects->id ?? $existsobjects->id,
                    'number' => $i,
//                    'surface' => 0,
                ]);

                foreach ($request->floor_sec as $k => $ob) {
                    $sec_floor = DB::table('floor_has_section')
                        ->where('floors_id', $floor->id)
                        ->where('sections_id', $ob)
                        ->first();
                    if (!$sec_floor) {
                        DB::table('floor_has_section')->insert([
                            'floors_id' => $floor->id,
                            'sections_id' => $ob
                        ]);
                    }
                }

                for ($j = ($i - 1) * $floors_room; $j < abs($i) * $floors_room; $j++) {
                    $flat = Flat::create([
                        'object_id' => $objects->id ?? $existsobjects->id,
                        'floor_id' => $floor->id,
                        'number' => $j + 1,
                        'surface' => $i
                    ]);

                    foreach ($request->flat_sec as $k => $ob) {
                        $sec_flat = DB::table('flat_has_section')
                            ->where('flats_id', $flat->id)
                            ->where('sections_id', $ob)
                            ->first();
                        if (!$sec_flat) {
                            DB::table('flat_has_section')->insert([
                                'flats_id' => $flat->id,
                                'sections_id' => $ob
                            ]);
                        }
                    }
                }
                $c++;

            } else {
                return redirect()->back()->with('danger', 'Malumotlar allaqachon mavjud');
            }
        }
//        return  $c;
        return redirect()->route('objects.index')->with('success', 'Obyekt muvaffaqiyatli qo`shildi');

    }

    /**
     * Display the specified resource.
     */
    public function show(Objects $objects)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Objects $objects)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateObjectsRequest $request, Objects $objects)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Objects::find($id)->delete();
        return redirect()->route('objects.index')->with('success', 'Obyekt muvaffaqiyatli o`chirildi');

    }
}
