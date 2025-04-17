<?php
session_start();

$_SESSION['array'][] = $_POST['destinatario'];

header('Location:../../index.php');