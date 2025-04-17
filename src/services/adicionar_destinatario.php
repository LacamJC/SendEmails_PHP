<?php
session_start();
$email = trim($_POST['destinatario'] ?? '');

// Verificação correta
if (empty($email)) {
    $_SESSION['error'] = "Email não pode ser vazio";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['error'] = "Email inválido";
} else {
    // Sanitiza e armazena
    $_SESSION['array'][] = filter_var($email, FILTER_SANITIZE_EMAIL);
}

header('Location:../../index.php');