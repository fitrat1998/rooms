<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'name' => 'admin',
            'guard_name' => 'web',

        ]);
        Role::create([
            'name' => 'writter',
            'guard_name' => 'web',

        ]);
        Role::create([
            'name' => 'lawyer',
            'guard_name' => 'web',

        ]);
        Role::create([
            'name' => 'office',
            'guard_name' => 'web',

        ]);
    }
}
