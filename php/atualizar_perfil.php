<?php
session_start();
require 'conexao_db.php';

$user_id = $_SESSION["user_id"];
$user_type = $_SESSION["user_type"];
$table = null;

if ($user_type == "petsitter") {
    $table = "petsitters";
} elseif ($user_type == "tutor") {
    $table = "tutores";
}

// Pegando variáveis
$email = $_POST["email"];
$password = $_POST["password"];
$phone = $_POST["phone"];
$address = $_POST["address"];

// Conexão com o banco de dados
$sql = "UPDATE ".$table." SET email = '".$email."', senha = '".$password."', telefone = '".$phone."', endereco = '".$address."' WHERE id = '".$user_id."'";

try {
    if ($conn->query($sql)) {
        header('location: ../configuracoes.php?msg1=Sucesso!&msg2=Seus dados foram alterados com sucesso');   // Retornando com uma variável GET.
    }
} catch(Exception $e) {
    $msgErro = $e->getMessage();
    header('location: ../configuracoes.php?msg1=Ocorreu um erro!&msg2='.$msgErro); // Exibir que ocorreu um erro
}

$conn->close();
?>
