<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Section::create([
            'name'   => 'Bolalar maydonchasi',
            'parent' => 'object',
        ]);

        Section::create([
            'name'   => 'Pog`ona',
            'parent' => 'floor',
        ]);

        Section::create([
            'name'   => 'Hammom',
            'parent' => 'flat',
        ]);
    }
}
