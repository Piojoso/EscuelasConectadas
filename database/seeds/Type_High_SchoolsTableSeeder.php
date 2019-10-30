<?php

use Illuminate\Database\Seeder;

class Type_High_SchoolsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Type_High_Schools')->insert(['name' => 'EGB']);
        DB::table('Type_High_Schools')->insert(['name' => 'CB']);
        DB::table('Type_High_Schools')->insert(['name' => 'CO']);
        DB::table('Type_High_Schools')->insert(['name' => 'CBCO']);
        DB::table('Type_High_Schools')->insert(['name' => 'Otro']);
    }
}
