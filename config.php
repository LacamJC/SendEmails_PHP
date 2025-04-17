<?php
require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Valide que as variáveis necessárias existam
$dotenv->required([

    'EMAIL_USER',
    'EMAIL_PASS',
]);