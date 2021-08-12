<?php

$controllers = [
    'pages' => ['home', 'error'],
    'route' => ['home', 'delete', 'create', 'store', 'edit', 'update_route'],
    'bus' => ['home', 'create', 'store', 'edit', 'update_bus', 'delete'],
];

if (!array_key_exists($controller, $controllers) || !in_array($action, $controllers[$controller])) {
    $controller = 'pages';
    $action = 'error';
}

include_once '../admin/controllers/'.$controller.'_controller.php';

$kclass = str_replace('_', '', ucwords($controller, '_')).'Controller';
$controller = new $kclass();
$controller->$action();
