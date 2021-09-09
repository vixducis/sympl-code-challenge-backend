<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projects')->insert(['name' => 'Project 1', 'color' => 'gray']);
        DB::table('projects')->insert(['name' => 'Another Project', 'color' => 'red']);
        DB::table('projects')->insert(['name' => 'Third Project', 'color' => 'yellow']);
    }
}
