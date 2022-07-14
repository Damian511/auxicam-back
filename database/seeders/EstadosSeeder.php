<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estados')->insert([
            'estadoid' => 0,
            'descripcion' => 'INACTIVO',
            'activo' => true,
        ]);
        DB::table('estados')->insert([
            'estadoid' => 1,
            'descripcion' => 'ACTIVO',
            'activo' => true,
        ]);
    }
}
