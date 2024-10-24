<?php

namespace App\Http\Controllers;

use App\Models\admin\Faculty;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        abort_if_forbidden('user.show');

        $users = User::where('id', '!=', auth()->user()->id)->get();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        abort_if_forbidden('user.add');

//        if (auth()->user()->hasRole('Super Admin'))
//            $roles = Role::all();
//        else
//        $faculties = Faculty::all();
        $roles = Role::where('name', '!=', 'Super Admin')->get();

        return view('admin.users.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        abort_if_forbidden('user.add');

        $this->validate($request, [
        'name' => ['required', 'string', 'max:255'],
        'login' => ['required', 'string', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
    ], [
        'login.unique' => 'Kiritilgan login allaqachon mavjud. Iltimos, boshqa login tanlang.',
        'password.min' => 'Parol kamida 8 ta belgidan iborat bo‘lishi kerak.',
        'password.confirmed' => 'Parol tasdiqlanishi mos kelmadi.',
    ]);


        $user = User::create([
            'name' => $request->name,
            'login' => $request->login,
            'email' => 'test@gmail.com',
            'worker_id' => 0,
            'password' => Hash::make($request->get('password')),
        ]);

        if (!Role::where('name', 'user')->exists()) {
            Role::create([
                'name'          => 'user',
                'guard_name'    => 'web',
                'title'         => 'Foydalanuvchi'
            ]);
        }

        $user->assignRole('user');

        return redirect()->route('users.index')->with('success', 'Foydalanuvchi muvaffaqiyatli qo‘shildi');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        abort_if((!auth()->user()->can('user.edit') && auth()->id() != $id), 403);
        $user = User::find($id);


        if ($user->hasRole('Super Admin') && !auth()->user()->hasRole('Super Admin')) {
            message_set("У вас нет разрешения на редактирование администратора", 'error', 5);
            return redirect()->back();
        }


        $roles = Role::where('name', '!=', 'Super Admin')->get();

        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        abort_if((!auth()->user()->can('user.edit') && auth()->id() != $id), 403);

        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'login' => ['required', 'string', 'max:255', 'unique:users,login,' . $id],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::find($id);

        if ($request->filled('password')) {
            $user->update([
                'name' => $request->input('name'),
                'login' => $request->input('login'),
                'password' => Hash::make($request->input('password')),
                'worker_id' => 0,
                'updated_at' => now()
            ]);
        } else {
            $user->update([
                'name' => $request->input('name'),
                'login' => $request->input('login'),
                'worker_id' => 0,
                'updated_at' => now()
            ]);
        }
//
//        unset($request['password']);


        return redirect()->route('users.index')->with('success', 'Foydalanuvchi muvaffaqiyatli tahrirlandi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        abort_if_forbidden('user.delete');

        $user = User::destroy($id);

        if (auth()->user()->roles[0]->name == "Super Admin") {
            return redirect()->back()->with('error', 'Siz bu foydalanuvchini o`chira olmaysiz');
        }
        DB::table('model_has_roles')->where('model_id', $id)->delete();
        DB::table('model_has_permissions')->where('model_id', $id)->delete();


        return redirect()->route('users.index')->with('success', 'Foydalanuvchi muvaffaqiyatli o`chirildi');
    }
}
