<?php
session_start();

// Verifica se há uma sessão ativa
if (session_status() === PHP_SESSION_ACTIVE) {
    // Obtém o ID do usuário a partir da sessão
    $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

    // Verifica se o ID do usuário é válido
    if ($user_id !== null) {
        require 'conexao_db.php';

        // Query para obter os pets do tutor atual
        $query = "SELECT * FROM pets WHERE id_tutor = $user_id";
        $result = $conn->query($query);

        // CSS e outras tags
        echo "
        <style>
        .pets-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
        }

        .pet {
            border: 1px solid #ccc;
            padding: 10px;
            border-radius: 8px;
            text-align: center;
            display: flex;
            flex-direction: column; /* Para garantir que a imagem fique abaixo do texto */
            align-items: center;
            justify-content: center;
        }

        .pet img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            margin-bottom: 10px;
        }

        .pet h3 {
            color: #333;
        }

        .pet p {
            color: #666;
            margin-bottom: 5px;
        }
        </style>
        ";
        echo "<h1>Pets</h1>";
        echo "<div class='pets-container'>";

        // Verifica se há pets cadastrados
        if ($result && $result->num_rows > 0) {
            // Exibe os pets
            while ($row = $result->fetch_assoc()) {
                $nome_pet = $row['nome'];
                $especie_pet = $row['especie'];
                $raca_pet = $row['raca'];
                $genero_pet = $row['genero'];
                $data_nascimento_pet = $row['data_nascimento'];
                $descricao_pet = $row['descricao'];
                $url_foto_pet = $row['url_foto'];

                // Pets
                echo '<div class="pet">';
                echo '<img src="' . substr($url_foto_pet, 3) . '" alt="' . $nome_pet . '">';    // tira os primeiros 3 dígitos da string
                echo '<h3>' . $nome_pet . '</h3>';                                              // para mostrar a imagem apropriadamente
                echo '<p>Espécie: ' . $especie_pet . '</p>';
                echo '<p>Raça: ' . $raca_pet . '</p>';
                echo '<p>Gênero: ' . $genero_pet . '</p>';
                echo '<p>Data de Nascimento: ' . $data_nascimento_pet . '</p>';
                echo '<p>Descrição: ' . $descricao_pet . '</p>';
                echo '</div>';
            }
        } else {
            // Não há pets cadastrados para este tutor
            echo '<p>Não há pets cadastrados.</p>';
        }

        // Fecha a conexão com o banco de dados
        $conn->close();
    } else {
        // ID do usuário não é válido
        header("Location: index.php?msg1=Ocorreu um erro!&msg2=Inicie sua sessão primeiro.");
    }
} else {
    // Sessão não iniciada
    header("Location: index.php?msg1=Ocorreu um erro!&msg2=Inicie sua sessão primeiro.");
}

// Fechando a div pets-container
echo "</div>";
?>
