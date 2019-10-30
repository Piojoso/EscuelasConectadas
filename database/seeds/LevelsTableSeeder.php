<?php

use Illuminate\Database\Seeder;

class LevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Levels')->insert(['name' => 'Inicial']);
        DB::table('Levels')->insert(['name' => 'Primario']);
        DB::table('Levels')->insert(['name' => 'Secundario']);
    }
}
