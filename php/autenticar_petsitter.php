<?php
require 'conexao_db.php';

$email = $_POST["email"];
$password = $_POST["password"];

$sql = "SELECT * FROM petsitters WHERE usuario = '$email' AND senha = '$password'";
// A fazer:
// pegar id do petsitter e salvar na sessão
?>
