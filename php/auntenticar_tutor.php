<?php
require 'conexao_db.php';

$username = $_POST["email"];
$password = $_POST["password"];

$sql = "SELECT * FROM tutores WHERE usuario = '$email' AND senha = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // As credenciais são válidas, autenticar o usuário aqui
    echo "Senha correta. Usuário autenticado.";
} else {
    // Senha incorreta ou usuário não encontrado
    echo "Senha incorreta ou usuário não encontrado. Tente novamente.";
}

$conn->close();
?>