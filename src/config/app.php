<?php
// config/app.php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/database.php';

define("BASE_URL", "/nhongar/src/views/");

