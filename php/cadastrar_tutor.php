<?php
require 'conexao_db.php';

// Pegando variáveis
$name = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["password"];
$phone = $_POST["phone"];

// Conexão com o banco de dados
$sql = "INSERT INTO tutores VALUES (null, '".$name."', '".$email."', '".$password."', '".$phone."')";
try {
  if ($conn->query($sql)) {
      echo 'criou conta!';   // Retornando pro index.php com uma variável GET.
  }                                               // Exibir pro usuário que a conta foi criada
} catch(Exception $e) {
  $msgErro = $e->getMessage();
  echo 'erro: '.$msgErro; // Exibir que ocorreu um erro
}

$conn->close();
?>
