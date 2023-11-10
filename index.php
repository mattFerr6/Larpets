
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;300;400;600;700;800&family=Noto+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,400;1,500&family=Red+Hat+Display:ital,wght@0,300;0,400;0,700;1,900&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Larpets | Login</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="script.js" defer></script>
</head>

<?php
    // Popup
    require "php/popup.php";
    if (isset($_GET['msg1']) && isset($_GET['msg2'])) {
        echo criarPopup(urldecode($_GET['msg1']), urldecode($_GET['msg2']));
    }
?>

<body>
    <main>
        <div class="login-container">
            <div class="presentation-container">
                <img src="img/login-img.png" alt="">
                <p>O LarPets ajuda você a se conectar com cuidadores ideais para o seu amado pet</p>
            </div>

            <div class="box-login">
                <img src="img/larpets-black-icon.svg" alt="">
                <div class="box-form">
                    <form action="php/verificar_modalidade.php" method="post">
                        <div class="form-input-container">
                            <h3>Selecione a modalidade de conta:</h3>
                            <select name="modalidade" id="modalidade" style="padding: 5px; font-size: 16px; border-radius: 50px; border-style: none; width:150px; align-self: center;">
                                <option value="Tutor">Tutor 🐾</option>
                                <option value="Petsitter">Petsitter 🐶</option>
                            </select>
                            <input class="form-input" type="text" id="email" name= "email" placeholder="Email">

                            <input class="form-input" type="password" id="password" name="password" placeholder="Senha">
                        </div>
                        <button class="form-button">Entrar</button>
                    </form>
                    <a class="form-link" href="#">Esqueceu a senha?</a>
                    <div class="form-element">
                        <div class="text-element">Ou</div>
                    </div>
                    <p class="text-form">Ainda não tem uma conta? <a href="#" onclick="openModal()">Cadastre-se</a></p>
                </div>
            </div>
        </div>


        <div class="modal-window" contenteditable="false" id="modal-window">
            <div class="modal">
                <button class="close-modal" type="submit" id="close-modal">
                </button>
                <div class="modal-content">
                    <div class="choice-area">
                        <form action="formularios/cadastrar-petsitter.html">
                            <button class="btn-account-type-option btn-account-type-option-1"></button>
                        </form>
                        <h2>Pet Sitter</h2>
                    </div>
                    <div class="choice-area">
                        <form action="formularios/cadastrar-tutor.html">
                            <button class="btn-account-type-option btn-account-type-option-2"></button>
                        </form>
                        <h2>Tutor(a)</h2>
                    </div>
                </div>
                <div class="modal-text" >Escolha a modalidade da conta</div>
            </div>
        </div>
    </main>
</body>

</html>