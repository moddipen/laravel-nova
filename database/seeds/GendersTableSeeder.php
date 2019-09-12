<?php

use Illuminate\Database\Seeder;

class GendersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genders')->insert([
            'name' => 'Female',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('genders')->insert([
            'name' => 'Male',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
