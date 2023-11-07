<?php
 $servername = "localhost";
 $username = "root"; // Credenciais do banco de dados
 $password = "123";
 $database = "larpets";
 
 // Criando conexão
 $conn = new mysqli($servername, $username, $password, $database);
 
 // Verificando conexão
 if ($conn->connect_error) {
   die("Erro de conexão: " . $conn->connect_error);
 }
 echo "Conexão com o banco de dados feita!<br>";
// Fechar a conexão com o banco de dados quando terminar
//$mysqli->close();
?>
