<?php

namespace App\Providers;

use Carbon\Carbon;
use App\Models\Post;
use App\Models\Event;
use App\Models\Client;
use App\Models\Gender;
use App\Models\Company;
use App\Models\Country;
use App\Models\Language;
use App\Models\EventItem;
use App\Policies\PostPolicy;
use App\Policies\EventPolicy;
use App\Policies\ClientPolicy;
use App\Policies\GenderPolicy;
use Laravel\Passport\Passport;
use App\Policies\CompanyPolicy;
use App\Policies\CountryPolicy;
use App\Models\BusinessCategory;
use App\Policies\LanguagePolicy;
use App\Policies\EventItemPolicy;
use Illuminate\Support\Facades\Gate;
use App\Policies\BusinessCategoryPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',

        Post::class => PostPolicy::class,
        Event::class => EventPolicy::class,
        Company::class => CompanyPolicy::class,
        BusinessCategory::class => BusinessCategoryPolicy::class,

        Client::class => ClientPolicy::class,
        Country::class => CountryPolicy::class,
        Gender::class => GenderPolicy::class,
        Language::class => LanguagePolicy::class,
        EventItem::class => EventItemPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Passport::routes();

        Passport::tokensExpireIn(Carbon::now()->addMinutes(10000000));

        Passport::refreshTokensExpireIn(Carbon::now()->addMinutes(90));
    }
}
