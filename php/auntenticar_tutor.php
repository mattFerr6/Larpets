<?php
require 'conexao_db.php';

$username = $_POST["email"];
$password = $_POST["password"];

$sql = "SELECT * FROM tutores WHERE usuario = '$email' AND senha = '$password'";
$result = $conn->query($sql);

if ($resultado) {
    // Verifica se o query retornou algo
    if ($row = mysqli_fetch_assoc($resultado)) {
        // O e-mail e a senha são válidos, pegando id do usuário
        $id_do_usuario = $row['id'];

        // Iniciando a sessão do usuário
        session_start();
        $_SESSION['user_id'] = $id_do_usuario;
        echo "Login bem-sucedido! ID do usuário: $id_do_usuario";
    } else {
        echo "E-mail ou senha incorretos. Tente novamente.";
    }
} else {
    echo "Erro na consulta ao banco de dados. Por favor, tente novamente.";
}

$conn->close();
?>
