<?php
require_once __DIR__ . '/vendor/autoload.php';

// Carrega variáveis de ambiente
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Configurações de email
define('EMAIL_HOST', $_ENV['EMAIL_HOST'] ?? 'smtp.gmail.com');
define('EMAIL_PORT', $_ENV['EMAIL_PORT'] ?? 587);
define('EMAIL_USERNAME', $_ENV['EMAIL_USERNAME'] ?? '');
define('EMAIL_PASSWORD', $_ENV['EMAIL_PASSWORD'] ?? '');
define('EMAIL_FROM_NAME', $_ENV['EMAIL_FROM_NAME'] ?? 'SendEmails System');

// Configurações de sessão
session_start([
    'cookie_httponly' => true,
    'cookie_secure' => isset($_SERVER['HTTPS']),
    'use_strict_mode' => true
]);