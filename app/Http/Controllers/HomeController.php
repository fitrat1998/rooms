<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class HomeController extends Controller
{
    public function index()
    {
        $tasks = Permission::all();

        return view('dashboard',compact('tasks'));
    }
}
