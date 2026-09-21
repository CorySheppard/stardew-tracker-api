<?php

declare(strict_types=1);
include './propelSetup.php';

spl_autoload_register(function ($class) {
    require __DIR__ . "/src/$class.php";
});

header("Content-type: application/json; charset=UTF-8");

$parts = explode('/', $_SERVER['REQUEST_URI']);

// Writing this only for users currently, this will change!
if ($parts[1] != "user") {
    http_response_code(404);
    exit;
}

$id = $parts[2] ?? null;

$controller = new UserController;

$controller->processRequest($_SERVER['REQUEST_METHOD'], $id);