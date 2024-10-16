<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Worker;
use App\Http\Requests\StoreWorkerRequest;
use App\Http\Requests\UpdateWorkerRequest;
use Database\Seeders\WorkerSeeder;
use Illuminate\Support\Facades\Hash;

class WorkerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $workers = Worker::all();

        return view('admin.workers.index', compact('workers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.workers.add');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWorkerRequest $request)
    {
        $validated = $request->validated();
//        dd($validated);
        $worker = Worker::create([
            'fullname' => $validated['name'],
            'phone' => $validated['phone']
        ]);

        $user = User::create([
            'name'          => $validated['name'],
            'login'         => $request->login,
            'password'      => $request->password,
            'worker_id'    => $worker->id,
        ]);

        if($user){
         return redirect()->route('workers.index')->with('success', 'Ishchi muvvafaqiyatli qo`shildi');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Worker $worker)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $worker = Worker::find($id);
        $user = User::where('worker_id',$id)->first();

        return view('admin.workers.edit',compact('worker','user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWorkerRequest $request, $id)
    {
        $worker = Worker::find($id);

        $validated = $request->validated();

        $worker->update([
            'fullname' => $validated['name'],
            'phone'    => $validated['phone']
        ]);

        $user = User::where('worker_id',$worker->id)->first();

        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'login' => ['required', 'string', 'max:255', 'unique:users,login,' . $user->id],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ]);

        if ($request->filled('password')) {
            $user->update([
                'name' => $request->input('name'),
                'login' => $request->input('login'),
                'password' => Hash::make($request->input('password')),
                'updated_at' => now()
            ]);
        }
        else {
            $user->update([
                'name' => $request->input('name'),
                'login' => $request->input('login'),
                'updated_at' => now()
            ]);
        }
        return redirect()->route('workers.index')->with('success', 'Ishchi muvvafaqiyatli tahrirlandi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
//        $worker = User::where('faculty_id',$id)->first();
        User::where('worker_id',$id)->delete();
        Worker::find($id)->delete();

        return redirect()->route('workers.index')->with('success', 'Ishchi muvvafaqiyatli o`chirildi');

    }
}
