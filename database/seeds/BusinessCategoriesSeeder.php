<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\BusinessCategory;
use App\Models\BusinessCategoryUser;

class BusinessCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::pluck('id');

        factory(BusinessCategory::class, 20)->create([

        ])->each(function ($businessCategory) use ($users) {
            BusinessCategoryUser::firstOrCreate([
                'business_category_id' => $businessCategory->id,
                'user_id' => $users->random(),
            ]);
        });
    }
}
