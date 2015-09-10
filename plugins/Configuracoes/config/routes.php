<?php

use Cake\Routing\Router;

Router::prefix('admin', function ($routes) {
    $routes->plugin('Configuracoes', function ($routes) {
        $routes->fallbacks('InflectedRoute');
    });
});
