<?php

// namespace Tld\Domain\Plugin\Services;
namespace Com\Themosis\Documentation\Services;

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
            'namespace' => 'Com\Themosis\Documentation\Controllers'
        ], function () {
            require themosis_path('plugin.com.themosis.documentation.resources').'routes.php';
        });
    }
}