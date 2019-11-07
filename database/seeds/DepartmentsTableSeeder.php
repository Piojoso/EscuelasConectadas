<?php

use Illuminate\Database\Seeder;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Departments')->insert(['num_Region'=> '1', 'name' => 'Ayacucho', 'province_id' => '1']);
        DB::table('Departments')->insert(['num_Region'=> '2', 'name' => 'Belgrano', 'province_id' => '1']);
        DB::table('Departments')->insert(['num_Region'=> '3', 'name' => 'Chacabuco', 'province_id' => '1']);
        DB::table('Departments')->insert(['num_Region'=> '4', 'name' => 'Coronel Pringles', 'province_id' => '1']);
        DB::table('Departments')->insert(['num_Region'=> '5', 'name' => 'General Pedernera', 'province_id' => '1']);
        DB::table('Departments')->insert(['num_Region'=> '6', 'name' => 'Gobernador Dupuy', 'province_id' => '1']);
        DB::table('Departments')->insert(['num_Region'=> '7', 'name' => 'Junin', 'province_id' => '1']);
        DB::table('Departments')->insert(['num_Region'=> '8', 'name' => 'Juan Martin de Pueyrredon', 'province_id' => '1']);
        DB::table('Departments')->insert(['num_Region'=> '9', 'name' => 'Libertador General San Martin', 'province_id' => '1']);
    }
}
