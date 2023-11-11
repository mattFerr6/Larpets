<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/configuracoes.css">
    <title>Larpets | Perfil do Usuário</title>
</head>
<body>

    <?php
    session_start();
    if (session_status() === PHP_SESSION_ACTIVE && isset($_SESSION['user_type'])) {
        // Obtém variáveis de sessão
        $user_type = $_SESSION['user_type'];
        $user_id = $_SESSION['user_id'];
        // Verifica o tipo de usuário e inclui o cabeçalho correspondente
        if ($user_type == "tutor") {
            require 'header_tutor.php';
        } elseif ($user_type == "petsitter") {
            require 'header_petsitter.php';
        }
    } else {
        header("Location: index.php?msg1=Erro&msg2=Inicie sua sessão primeiro.");
    }  
    ?>

    <?php
        // Popup
        require "php/popup.php";
        if (isset($_GET['msg1']) && isset($_GET['msg2'])) {
            echo criarPopup(urldecode($_GET['msg1']), urldecode($_GET['msg2']));
        }
    ?>

    <section class="main-content">
        <h2>Meu Perfil</h2>

        <!-- Formulário para editar informações do usuário -->
        <form action="php/atualizar_perfil.php" method="post">
            <label for="email">E-mail:</label>
            <input type="text" id="email" name="email" placeholder="Seu novo e-mail" required>

            <label for="phone">Telefone:</label>
            <input type="text" id="phone" name="phone" placeholder="Seu novo nº de telefone" required>

            <label for="senha">Nova Senha:</label>
            <input type="password" id="password" name="password" placeholder="Sua nova senha" required>

            <label for='address'>Novo Endereço:</label>
            <input type='text' id='address' name='address' placeholder='Seu novo endereço' required>

            <button type="submit">Salvar Alterações</button>
        </form>
    </section>

    <footer>
        <p>&copy; 2023 Larpets</p>
    </footer>

</body>
</html>
