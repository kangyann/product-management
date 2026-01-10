<?php
require "app/lib/Routes.php";
require "app/controllers/HomeController.php";
require "app/controllers/AuthController.php";
require "app/controllers/DashboardController.php";
require_once "app/bootstrap.php";

$route = new Routes;

/** Define Routes */
$route->classify('/', [HomeController::class, 'index']);
$route->classify('/generate', [HomeController::class, 'generate']);

$route->classify('/auth/login', [AuthController::class, 'view_login']);
$route->classify('/auth/logout', [AuthController::class, "logout"]);

$route->classify('/dashboard', [DashboardController::class, 'view_index']);

$route->classify('/dashboard/products/add', [DashboardController::class, 'add_products']);
$route->classify('/dashboard/products/update', [DashboardController::class, 'update_products']);
$route->classify('/dashboard/products/delete', [DashboardController::class, 'delete_products']);

$route->classify('/dashboard/category/add', [DashboardController::class, 'add_categories']);
$route->classify('/dashboard/category/update', [DashboardController::class, 'update_categories']);
$route->classify('/dashboard/category/delete', [DashboardController::class, 'delete_categories']);


/** Go Running. */
$route->run();
