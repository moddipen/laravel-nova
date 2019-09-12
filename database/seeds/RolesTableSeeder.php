<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = collect(config('fanbox.roles'));
        /*
        * Check roles exist or not in table
        */
        if (Role::count() == 0) {
            $roles->each(function ($value) {
                Role::create([
                    'name' => $value,
                    'guard_name' => 'web',
                ]);
            });
        }
    }
}
