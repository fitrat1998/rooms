<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */

    protected $redirectTo = RouteServiceProvider::HOME;

    public function create(): View
    {
        return view('auth.register');
    }


    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $cnt = User::count();

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'login' => ['required', 'string', 'max:255', 'unique:' . User::class],
//            'email' => ['required', 'string',  'max:255','email', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
//        dd($request);


        $user = User::create([
            'name' => $request->name,
            'login' => $request->login,
            'password' => Hash::make($request->password),
        ]);

        if ($cnt > 0) {
                Role::create([
                    'name' => 'user',
                    'title' => 'Korigar',
                    'guard_name' => 'web'
                ]);
            $user->assignRole('user');
        }

        if ($cnt === 0) {
            $perms_cnt = Permission::count();

            if ($perms_cnt === 0) {
                Permission::insert([
                    ["name" => 'permission.show', "title" => 'Ruxsatlarni ko`rish', "guard_name" => 'web'],
                    ["name" => 'permission.edit', "title" => 'Ruxsatlarni o`zgartirish', "guard_name" => 'web'],
                    ["name" => 'permission.add', "title" => 'Yangi ruxsat qo`shish', "guard_name" => 'web'],
                    ["name" => 'permission.delete', "title" => 'Ruxsatlarni o`chirish', "guard_name" => 'web'],

                    ["name" => 'roles.show', "title" => 'Rollarni ko`rish', "guard_name" => 'web'],
                    ["name" => 'roles.edit', "title" => 'Rollarni o`zgartirish', "guard_name" => 'web'],
                    ["name" => 'roles.add', "title" => 'Rollar qo`shish', "guard_name" => 'web'],
                    ["name" => 'roles.delete', "title" => 'Rollarni o`chirish', "guard_name" => 'web'],

                    ["name" => 'user.show', "title" => 'Userlarni ko`rish', "guard_name" => 'web'],
                    ["name" => 'user.edit', "title" => 'Userlarni o`zgartirish', "guard_name" => 'web'],
                    ["name" => 'user.add', "title" => 'Yangi Userlarni qo`shish', "guard_name" => 'web'],
                    ["name" => 'user.delete', "title" => 'Userlarni o`chirish', "guard_name" => 'web'],
                    ["name" => 'api-user.add', "title" => 'ApiUser Add', "guard_name" => 'web'],
                    ["name" => 'api-user.view', "title" => 'ApiUser View', "guard_name" => 'web'],
                    ["name" => 'api-user.edit', "title" => 'ApiUser Edit', "guard_name" => 'web'],
                    ["name" => 'api-user-passport.view', "title" => 'ApiUser Password view', "guard_name" => 'web'],
                ]);
            }

            $role_cnt = Role::count();

            if ($role_cnt === 0) {
                Role::create([
                    'name' => 'Super Admin',
                    'title' => 'Super Admin',
                    'guard_name' => 'web'
                ]);
            }

            $user->assignRole('Super admin');
        }

        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('index');
    }
}
