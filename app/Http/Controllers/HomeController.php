<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Visit;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class HomeController extends Controller
{
    public function index()
    {
        $tasks = Permission::all();

        $visits = Visit::all();

        $rooms = Room::all();



        return view('dashboard',compact('visits','rooms'));
    }
}
