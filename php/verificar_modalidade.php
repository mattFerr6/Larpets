<?php
$modalidade = $_POST["modalidade"];

// Redirecionando para o script apropriado
switch($modalidade) {
    case "Tutor":
        echo "Redirecionando para autenticar_tutor.php... <br>";
        require 'autenticar_tutor.php';
        break;
    case "Petsitter":
        echo "Redirecionando para autenticar_petsitter.php... <br>";
        require 'autenticar_petsitter.php';
        break;
    default:
        echo "Modalidade desconhecida.";
}
