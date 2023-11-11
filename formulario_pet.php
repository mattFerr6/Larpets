<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/configuracoes.css">
    <title>Larpets | Cadastro de Pet</title>
</head>

<body>
    <?php
    session_start();
    if (session_status() === PHP_SESSION_ACTIVE && isset($_SESSION['user_type'])) {
        // Obtém variáveis de sessão
        $user_type = $_SESSION['user_type'];
        $user_id = $_SESSION['user_id'];
        // Apenas tutores permitidos
        if ($user_type == "tutor") {
            require 'header_tutor.php';
        } elseif ($user_type == "petsitter") {
            header("Location: dashboard.php");
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
            <h2>Cadastro de Pet</h2>
            <form action="php/cadastrar_pet.php" method="post" enctype="multipart/form-data">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" placeholder="Nome" required>

                <label for="especie">Espécie:</label>
                <input type="text" id="especie" name="especie" placeholder="Espécie" required>

                <label for="raca">Raça:</label>
                <input type="text" id="raca" name="raca" placeholder="Raça" required>

                <select name="genero" id="genero">
                    <option value="selecione">Selecione o Gênero</option>
                    <option value="macho">Macho</option>
                    <option value="femea">Fêmea</option>
                </select>

                <label for='data-nascimento'>Data de Nascimento:</label>
                <input type='date' id='data-nascimento' name='data-nascimento' placeholder='Data de Nascimento (Aprox.)' required>

                <label for="descricao">Descrição:</label>
                <input type="text" id="descricao" name="descricao" placeholder="Descrição" required>

                <label for="arq">Foto do Pet:</label>
                <input type="file" name="arq" id="arq" accept="image/*">

                <button type="submit">Cadastrar</button>
            </form>
    </section>

    <footer>
        <p>&copy; 2023 Larpets</p>
    </footer>
</body>
