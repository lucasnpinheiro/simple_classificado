<?php

use Cake\Routing\Router;

Router::plugin('Blogs', function ($routes) {
    $routes->fallbacks('InflectedRoute');
});

Router::prefix('admin', function ($routes) {
    $routes->plugin('Blogs', function ($routes) {
        $routes->fallbacks('InflectedRoute');
    });
});
