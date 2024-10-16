<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSendTaskRequest;
use App\Http\Requests\UpdateSendTaskRequest;
use App\Models\admin\Category;
use App\Models\admin\Faculty;
use App\Models\admin\SendTask;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SendTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faculties = Faculty::all();
        $tasks = SendTask::all();
        return view('admin.tasks.index', compact('tasks', 'faculties'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $faculties = Faculty::all();
        $categories = Category::all();

        return view('admin.tasks.send-task', compact('faculties', 'categories'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSendTaskRequest $request)
    {
        $validated = $request->validated();


        $user = auth()->user();

//        dd($user->roles[0]->title);

        $create = SendTask::create([
            'category_id' => intval($validated['category_id']),
            'user_id' => $user->id,
            'comment' => $validated['comment'],
            'deadline' => $validated['deadline'],
            'process' => $user->roles[0]->title,
        ]);

        foreach ($request->faculty_id as $f) {
            DB::table('tasks_has_faculties')->insert([
                'task_id' => $create->id,
                'faculty_id' => intval($f),
            ]);
        }

        foreach ($request->file('files') as $file) {
            $name = md5($file->getClientOriginalName()) . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('senduploads', $name);
            DB::table('tasks_has_files')->insert([
                'task_id' => $create->id,
                'name' => $name,
            ]);
        }

        return redirect()->route('sendtask.index')->with('success', 'Topshiriq muvaffaqiyatli yaratildi');
    }

    /**
     * Display the specified resource.
     */
    public function show($send_Task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $task = SendTask::find($id);
        $categories = Category::all();
        $faculties = Faculty::all();

        return view('admin.tasks.edit', compact('task', 'categories', 'faculties'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSendTaskRequest $request, $id)
    {
        $validated = $request->validated();


        $user = auth()->user();

        $update = SendTask::find($id);

        $faculties = DB::table('tasks_has_faculties')->where('task_id', $update->id)->get();


        $up = $update->update([
            'category_id' => intval($validated['category_id']),
            'user_id' => $user->id,
            'comment' => $validated['comment'],
            'deadline' => $validated['deadline'],
            'process' => $user->roles[0]->title,
        ]);

        if (!empty($request->faculty_id)) {
            foreach ($request->faculty_id as $f) {
                $faculties = DB::table('tasks_has_faculties')->update([
                    'faculty_id' => intval($f),
                ]);
            }
        }

        $existingFiles = DB::table('tasks_has_files')
            ->where('task_id', $update->id)
            ->get();

        foreach ($existingFiles as $existingFile) {
            Storage::delete('senduploads/' . $existingFile->name);
            $d = DB::table('tasks_has_files')
                ->where('task_id', $update->id)
                ->where('name', $existingFile->name)
                ->delete();
        }


        $category = Category::find($update->category_id);
        $files = $request->file('files.*');

        foreach ($files as $file) {

            $name = md5($file->getClientOriginalName()) . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('senduploads', $name);

            DB::table('tasks_has_files')->insert([
                'task_id' => $update->id,
                'name' => $name,
            ]);
        }


        return redirect()->route('sendtask.index')->with('success', 'Topshiriq muvaffaqiyatli tahrirlandi');


    }


    public function download(Request $request)
    {
        dd($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $deletes = DB::table('tasks_has_files')->where('task_id', $id)->get();
//        dd($deletes);
        foreach ($deletes as $d) {
            $f = Storage::delete('senduploads/' . $d->name);
            if ($f) {
                echo "Fayl muvaffaqiyatli o'chirildi: " . $d->name;
            } else {
                echo "Fayl o'chirishda xatolik yuz berdi: " . $d->name;
            }
        }

//        DB::table('tasks_has_files')->where('task_id', $id)->delete();
//
        SendTask::find($id)->delete();
//
//
        return redirect()->route('sendtask.index')->with('success', 'Topshiriq muvaffaqiyatli o`chirildi');


    }

}
