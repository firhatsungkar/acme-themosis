<?php

namespace Us\Storyware\Donations\Services;

use Themosis\Facades\Route;
use Themosis\Foundation\ServiceProvider;

class RoutingService extends ServiceProvider
{
    /**
     * Register plugin routes.
     * Define a custom namespace.
     */
    public function register()
    {
        Route::group([
            'namespace' => 'Us\Storyware\Donations\Controllers'
        ], function () {
            require themosis_path('plugin.us.storyware.donations.resources').'routes.php';
        });
    }
}