<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PaisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET IDENTITY_INSERT pais ON');
        DB::table('pais')->insert([
            'id'=> 1,
            'codigo_pais' => 'CL',
            'nombre' => 'CHILE',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::statement('SET IDENTITY_INSERT pais OFF');

    }

}
