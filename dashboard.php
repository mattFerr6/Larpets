<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;300;400;600;700;800&family=Noto+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,400;1,500&family=Red+Hat+Display:ital,wght@0,300;0,400;0,700;1,900&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/dashboard.css">
    <title>Larpets | Dashboard</title>
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

    <section class="main-content">
        <!-- Conteúdo principal da página vai aqui -->
        <?php // Se for tutor, mostre os pets cadastrados
            if ($user_type == "tutor") {
                require 'php/mostrar_pets.php';
            }
        ?>
    </section>

    <footer>
        <p>&copy; 2023 Larpets</p>
    </footer>

</body>
</html>
