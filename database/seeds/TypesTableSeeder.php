<?php

use Illuminate\Database\Seeder;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Types')->insert(['name' => 'Comun']);
        DB::table('Types')->insert(['name' => 'Adultos']);
        DB::table('Types')->insert(['name' => 'Tecnica']);
        DB::table('Types')->insert(['name' => 'Autogestionada']);
        DB::table('Types')->insert(['name' => 'Publica Digital']);
    }
}
