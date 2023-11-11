<?php
//Iniciar sessão, verificar se o usuário é tutor e pegar o ID aqui
session_start();
$user_type = $_SESSION["user_type"];
$user_id = $_SESSION["user_id"];

require 'conexao_db.php';

// Receber dados do formulário
$nome = $_POST['nome'];
$especie = $_POST['especie'];
$raca = $_POST['raca'];
$genero = $_POST['genero'];
$data_nascimento = $_POST['data-nascimento'];
$descricao = $_POST['descricao'];

// Pegando e guardando imagem
if (isset($_FILES["arq"]) && $_FILES["arq"]["error"] == 0) {
    $nome_foto = strtolower(str_replace(' ', '_', $nome)) . '_' . strtolower($especie) . '_' . time(); // Nome gerado pra foto

    // Diretório para salvar as imagens
    $diretorio_destino = '../arq/pets/';

    // Nome do arquivo
    $nome_arquivo = $nome_foto . '.jpg';

    // Caminho completo do arquivo
    $caminho_arquivo = $diretorio_destino . $nome_arquivo;

    // Mover o arquivo para o diretório de destino
    if (!move_uploaded_file($_FILES["arq"]["tmp_name"], $caminho_arquivo)) {
        header("Location: ../formulario_pet.php?msg1=Erro&mgs2=Erro no upload da imagem. Por favor, tente novamente.");
        exit;
    }
} else {
    header("Location: ../formulario_pet.php?msg1=Erro&mgs2=Erro no upload da imagem. Por favor, tente novamente.");
    exit;
}

$query = "INSERT INTO pets (id_tutor, nome, especie, raca, genero, data_nascimento, descricao, url_foto) VALUES ('$user_id', '$nome', '$especie', '$raca', '$genero', '$data_nascimento', '$descricao', '$caminho_arquivo')";

// Executar a consulta
$result = mysqli_query($conn, $query);

// Verificar se a inserção foi bem-sucedida
if ($result) {
    header("Location: ../formulario_pet.php?msg1=Sucesso!&msg2=Seu pet foi cadastrado!.");
} else {
    header("Location: ../formulario_pet.php?msg1=Erro&msg2=Erro ao cadastrar o pet: " . mysqli_error($conn));
}

?>
