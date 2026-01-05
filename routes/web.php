<?php
require "lib/Routes.php";
require_once "controllers/HomeController.php";
require_once "controllers/AuthController.php";

$route = new Routes;

/** Define Routes */
$route->classify('/', [HomeController::class, 'index']);
$route->classify('/auth/login', [AuthController::class, 'view_login']);

/** Go Running. */
$route->run();
