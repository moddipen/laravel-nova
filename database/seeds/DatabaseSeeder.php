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
        // $this->call(UsersTableSeeder::class);
//        $this->call(EventsTableSeeder::class);
//        $this->call(PostsSeeder::class);
//        $this->call(BusinessCategoriesSeeder::class);

        /*
         * Correctly named
         */
        $this->call(CountriesTableSeeder::class);
        $this->call(GendersTableSeeder::class);
        $this->call(CompaniesTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(BusinessCategoriesSeeder::class);
        $this->call(EventsTableSeeder::class);
        $this->call(PostsSeeder::class);
        $this->call(LanguageTableSeeder::class);
        $this->call(ClientTableSeeder::class);
    }
}
