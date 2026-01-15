<?php

require_once '../config/Database.php';
require_once '../app/Model/CategoryManager.php';


$pdo = Database::getInstance();

$catManager = new CategoryManager($pdo);
$categories = $catManager->getAllWithVehicules();

var_dump($categories);
