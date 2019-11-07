<?php

use Illuminate\Database\Seeder;

class ProvincesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        DB::table('Provinces')->insert(['name' =>'Buenos Aires']);
        DB::table('Provinces')->insert(['name' =>'Buenos Aires-GBA']);
        DB::table('Provinces')->insert(['name' =>'Capital Federal']);
        DB::table('Provinces')->insert(['name' =>'Catamarca']);
        DB::table('Provinces')->insert(['name' =>'Chaco']);
        DB::table('Provinces')->insert(['name' =>'Chubut']);
        DB::table('Provinces')->insert(['name' =>'Córdoba']);
        DB::table('Provinces')->insert(['name' =>'Corrientes']);
        DB::table('Provinces')->insert(['name' =>'Entre Ríos']);
        DB::table('Provinces')->insert(['name' => 'Formosa']);
        DB::table('Provinces')->insert(['name' => 'Jujuy']);
        DB::table('Provinces')->insert(['name' => 'La Pampa']);
        DB::table('Provinces')->insert(['name' => 'La Rioja']);
        DB::table('Provinces')->insert(['name' => 'Mendoza']);
        DB::table('Provinces')->insert(['name' => 'Misiones']);
        DB::table('Provinces')->insert(['name' => 'Neuquén']);
        DB::table('Provinces')->insert(['name' => 'Río Negro']);
        DB::table('Provinces')->insert(['name' => 'Salta']);
        DB::table('Provinces')->insert(['name' => 'San Juan']);
        */
        DB::table('Provinces')->insert(['name' => 'San Luis']);
        /*
        DB::table('Provinces')->insert(['name' => 'Santa Cruz']);
        DB::table('Provinces')->insert(['name' => 'Santa Fe']);
        DB::table('Provinces')->insert(['name' => 'Santiago del Estero']);
        DB::table('Provinces')->insert(['name' => 'Tierra del Fuego']);
        DB::table('Provinces')->insert(['name' => 'Tucumán']);
        */
    }
}
