<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'rolid' => 1,
            'descripcion' => 'ADM',
            'estadoid' => 1,
        ]);
        DB::table('roles')->insert([
            'rolid' => 2,
            'descripcion' => 'USER',
            'estadoid' => 1,
        ]);
    }
}
