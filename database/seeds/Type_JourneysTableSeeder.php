<?php

use Illuminate\Database\Seeder;

class Type_JourneysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Type_Journeys')->insert(['name' => 'Simple']);
        DB::table('Type_Journeys')->insert(['name' => 'Completa']);
    }
}
