<?php

namespace RegistrashunSystem\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Auth;


class BladeExtrasServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // 'hasrole' is the name that will be referenced in the view
        Blade::if('hasrole', function ($expression) {
            if (Auth::user()) {
                if (Auth::user()->hasAnyRole($expression)) {
                    return true;
                }
            }

            return false;
        });

        Blade::if('impersonate', function () {
            if (session()->get('impersonate')) {
                return true;
            }

            return false;
        });
    }
}
