<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            SectorsTableSeeder::class,
            TypesTableSeeder::class,
            LevelsTableSeeder::class,
            AreasTableSeeder::class,
            CategoriesTableSeeder::class,
            Type_JourneysTableSeeder::class,
            Type_High_SchoolsTableSeeder::class,
            ProvincesTableSeeder::class,
            DepartmentsTableSeeder::class,
            LocalitiesTableSeeder::class,
        ]);
    }
}
