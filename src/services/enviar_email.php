<?php
session_start();
require_once '../Models/Controller.php';
require_once '../Models/Destinatario.php';
require_once '../Models/Message.php';

echo "<div class='spinner-border' role='status'>
  <span class='sr-only'>Loading...</span>
</div>";
try {
    $destinatarios = [];
    $message = new Message($_POST['assunto'], $_POST['corpo']);
    $controller = new Controller;
    foreach ($_SESSION['array'] as $email) {
        $destinatarios[] = new Destinatario($email);
    }

    foreach ($destinatarios as $destinatario) {
        $controller->add($destinatario);
    }

    $controller->setMessage($message);

    echo "<pre>";
    print_r($controller);
    echo "</pre>";

    $controller->send();

    $_SESSION['array'] = [];

    $_SESSION['success'] = "Emails enviados com sucesso";
    header('Location:../../index.php');
} catch (Exception $e) {
     $_SESSION['error'] = $e->getMessage();

     header('Location:../../index.php');
}
