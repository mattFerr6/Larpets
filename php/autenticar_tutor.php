<?php
require 'conexao_db.php';

$email = $_POST["email"];
$password = $_POST["password"];

$sql = "SELECT * FROM tutores WHERE email = '$email' AND senha = '$password'";
$resultado = $conn->query($sql);

if ($resultado) {
    // Verifica se o query retornou algo
    if ($row = mysqli_fetch_assoc($resultado)) {
        // O e-mail e a senha são válidos, pegando id do usuário
        $id_do_usuario = $row['id'];

        // Iniciando a sessão do usuário
        session_start();
        $_SESSION['user_id'] = $id_do_usuario;
        $_SESSION['user_type'] = 'tutor';
        header("Location: ../dashboard.php");
    } else {
        header("Location: ../index.php?msg1=Ocorreu um erro!&msg2=E-mail ou senha incorretos.");
    }
} else {
    header("Location: ../index.php?msg1=Ocorreu um erro!&msg2=Erro na consulta com o banco de dados.");
}

$conn->close();
?>
