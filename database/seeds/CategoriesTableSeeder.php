<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Categories')->insert(['name' => '1']);
        DB::table('Categories')->insert(['name' => '2']);
        DB::table('Categories')->insert(['name' => '3']);
        DB::table('Categories')->insert(['name' => 'PU']);
    }
}
