<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 1)->create([
            'email' => 'sean@seankoole.com',
            'password' => Hash::make('sean@seankoole.com'),
        ]);

        factory(User::class, 10)->create();
        /*
         * Assigned role to random users
         */

        $adminUsers = collect([3, 4, 5, 6, 8]);
        $adminUsers->each(function ($value) {
            $user = User::find($value);
            $user->assignRole(config('fanbox.roles.admin'));
            $user->save();
        });

        $superAdmins = collect([1, 2]);
        $superAdmins->each(function ($value) {
            $user = User::find($value);
            $user->assignRole(config('fanbox.roles.super_admin'));
            $user->save();
        });
    }
}
