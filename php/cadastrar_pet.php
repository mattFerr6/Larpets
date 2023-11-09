<?php
require 'conexao_db.php';

// Receber dados do formulário
$id_tutor = $_POST['id_tutor'];
$nome = $_POST['nome'];
$especie = $_POST['especie'];
$raca = $_POST['raca'];
$genero = $_POST['genero'];
$data_nascimento = $_POST['data_nascimento'];
$descricao = $_POST['descricao'];
$url_foto = $_POST['url_foto'];

// Inserir dados na tabela pets
$query = "INSERT INTO pets (id_tutor, nome, especie, raca, genero, data_nascimento, descricao, url_foto) VALUES ($id_tutor, '$nome', '$especie', '$raca', '$genero', '$data_nascimento', '$descricao', '$url_foto')";

if ($_FILES['url_foto']['error'] == 0) {
    // Diretório para salvar as imagens
    $diretorio_destino = '../fotos/pets/';

    // Nome do arquivo
    $nome_arquivo = $_FILES['url_foto']['name'];

    // Caminho completo do arquivo
    $caminho_arquivo = $diretorio_destino . $nome_arquivo;

    // Mover o arquivo para o diretório de destino
    move_uploaded_file($_FILES['url_foto']['tmp_name'], $caminho_arquivo);
} else {
    echo "Erro no upload da imagem. Por favor, tente novamente.";
}

// Verificar se a inserção foi bem-sucedida
if ($resultado) {
    echo "Pet cadastrado com sucesso!";
} else {
    echo "Erro ao cadastrar o pet. Por favor, tente novamente.";
}
?>
