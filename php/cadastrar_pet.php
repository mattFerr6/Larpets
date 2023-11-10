<?php
//Iniciar sessão, verificar se o usuário é tutor e pegar o ID aqui

require 'conexao_db.php';

// Receber dados do formulário
$nome = $_POST['nome'];
$especie = $_POST['especie'];
$raca = $_POST['raca'];
$genero = $_POST['genero'];
$data_nascimento = $_POST['data-nascimento'];
$descricao = $_POST['descricao'];

// Pegando e guardando imagem
if ($_FILES['foto']['error'] == 0) {
    $nome_foto = strtolower(str_replace(' ', '_', $nome)) . '_' . strtolower($especie) . '_' . time(); // Nome gerado pra foto

    // Diretório para salvar as imagens
    $diretorio_destino = '../arq/pets/';

    // Nome do arquivo
    $nome_arquivo = $nome_foto . '.jpg';

    // Caminho completo do arquivo
    $caminho_arquivo = $diretorio_destino . $nome_arquivo;

    // Mover o arquivo para o diretório de destino
    move_uploaded_file($_FILES['foto']['tmp_name'], $caminho_arquivo);
} else {
    echo "Erro no upload da imagem. Por favor, tente novamente.";
    exit;
}

$query = "INSERT INTO pets (id_tutor, nome, especie, raca, genero, data_nascimento, descricao, url_foto) VALUES (8, '$nome', '$especie', '$raca', '$genero', '$data_nascimento', '$descricao', '$caminho_arquivo')";

// Executar a consulta
$result = mysqli_query($conn, $query);

// Verificar se a inserção foi bem-sucedida
if ($result) {
    echo "Pet cadastrado com sucesso!";
} else {
    echo "Erro ao cadastrar o pet: " . mysqli_error($conn);
}

?>
