<?php

use Illuminate\Database\Seeder;

class SectorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Sectors')->insert(['name' => 'Publica']);
        DB::table('Sectors')->insert(['name' => 'Privada']);
        DB::table('Sectors')->insert(['name' => 'Autogestion']);
    }
}
