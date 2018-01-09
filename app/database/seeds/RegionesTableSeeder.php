<?php

use Illuminate\Database\Seeder;

class RegionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('regiones')->insert([
            'id' => 1,
            'pais_id' => 1,
            'nombre' => 'Región de Tarapacá',
            'ISO_3166_2_CL'=> 'CL-TA'
        ]);
DB::table('regiones')->insert([
            'id' => 2,
            'pais_id' => 1,
            'nombre' => 'Región de Antofagasta',
            'ISO_3166_2_CL'=> 'CL-AN'
        ]);
DB::table('regiones')->insert([
            'id' => 3,
            'pais_id' => 1,
            'nombre' => 'Región de Atacama',
            'ISO_3166_2_CL'=> 'CL-AT'
        ]);
DB::table('regiones')->insert([
            'id' => 4,
            'pais_id' => 1,
            'nombre' => 'Región de Coquimbo',
            'ISO_3166_2_CL'=> 'CL-CO'
        ]);
DB::table('regiones')->insert([
            'id' => 5,
            'pais_id' => 1,
            'nombre' => 'Región de Valparaíso',
            'ISO_3166_2_CL'=> 'CL-VS'
        ]);
DB::table('regiones')->insert([
            'id' => 6,
            'pais_id' => 1,
            'nombre' => 'Región del Libertador Gral. Bernardo O\'Higgins',
            'ISO_3166_2_CL'=> 'CL-LI'
        ]);
DB::table('regiones')->insert([
            'id' => 7,
            'pais_id' => 1,
            'nombre' => 'Región del Maule',
            'ISO_3166_2_CL'=> 'CL-ML'
        ]);
DB::table('regiones')->insert([
            'id' => 8,
            'pais_id' => 1,
            'nombre' => 'Región del Biobío',
            'ISO_3166_2_CL'=> 'CL-BI'
        ]);
DB::table('regiones')->insert([
            'id' => 9,
            'pais_id' => 1,
            'nombre' => 'Región de la Araucanía',
            'ISO_3166_2_CL'=> 'CL-AR'
        ]);
DB::table('regiones')->insert([
            'id' => 10,
            'pais_id' => 1,
            'nombre' => 'Región de Los Lagos',
            'ISO_3166_2_CL'=> 'CL-LL'
        ]);
DB::table('regiones')->insert([
            'id' => 11,
            'pais_id' => 1,
            'nombre' => 'Región Aisén del Gral. Carlos Ibáñez del Campo',
            'ISO_3166_2_CL'=> 'CL-AI'
        ]);
DB::table('regiones')->insert([
            'id' => 12,
            'pais_id' => 1,
            'nombre' => 'Región de Magallanes y de la Antártica Chilena',
            'ISO_3166_2_CL'=> 'CL-MA'
        ]);
DB::table('regiones')->insert([
            'id' => 13,
            'pais_id' => 1,
            'nombre' => 'Región Metropolitana de Santiago',
            'ISO_3166_2_CL'=> 'CL-RM'
        ]);
DB::table('regiones')->insert([
            'id' => 14,
            'pais_id' => 1,
            'nombre' => 'Región de Los Ríos',
            'ISO_3166_2_CL'=> 'CL-LR'
        ]);
DB::table('regiones')->insert([
            'id' => 15,
            'pais_id' => 1,
            'nombre' => 'Arica y Parinacota',
            'ISO_3166_2_CL'=> 'CL-AP'
        ]);
    }
}
