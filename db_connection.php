<?php
// Defina as credenciais do banco de dados
$host = "localhost";    // O host do banco de dados
$dbname = "faculdade"; // O nome do banco de dados
$username = "root";     // O usuário do banco de dados
$password = "vertrigo";         // A senha do banco de dados


// Criar a conexão com o banco de dados
$conn = new mysqli($host, $username, $password, $dbname);

// Verifique a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
?>