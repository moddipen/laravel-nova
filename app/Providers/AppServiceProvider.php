<?php

namespace App\Providers;

use Spatie\BladeX\ViewModel;
use Spatie\BladeX\Facades\BladeX;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Http\ViewModels\TableDataViewModel;
use App\Http\ViewModels\SelectFieldViewModel;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        BladeX::component('components.*');
        BladeX::component('components.select-fields')->viewModel(SelectFieldViewModel::class);
        BladeX::component('components.table-data')->viewModel(TableDataViewModel::class);
    }
}
