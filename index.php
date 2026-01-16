<?php
require_once 'config/Database.php';
require_once 'app/controller/CategoriesController.php';
require_once 'app/controller/VehiculesController.php';
spl_autoload_register();

$pdo = Database::getInstance();

$request = $_SERVER['REQUEST_URI'];
$path = trim(parse_url($request, PHP_URL_PATH), '/');

switch (true) {

    case $path === 'categories':
        $controller = new CategoriesController($pdo);
        $controller->listAction($pdo);
        break;

    case preg_match('#^vehicles/(\d+)$#', $path, $matches):
        $controller = new VehiclesController($pdo);
        $controller->showAction($pdo);
        break;

    default:
        echo "404 - Page not found";
}

?>