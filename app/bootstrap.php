<?php

// Start session (SATU KALI)
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Load env
require_once 'app/config/env.php';

// Error reporting (dev only)
error_reporting(E_ALL);
ini_set('display_errors', 1);
