<?php

use Illuminate\Database\Seeder;

class AreasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Areas')->insert(['name' => 'Comun']);
        DB::table('Areas')->insert(['name' => 'Rural']);
    }
}
