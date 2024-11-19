<?php
// Incluir o arquivo de conexão com o banco de dados
include('db_connection.php');

// Consulta para obter todos os usuários cadastrados
$sql = "SELECT ra, nome, senha, senha_md5 FROM usuarios";
$result = $conn->query($sql);

// Verifique se existem usuários cadastrados
if ($result->num_rows > 0) {
    // Exiba os dados em uma tabela HTML
    echo "<center><h1>Lista de Usuários Cadastrados</h1></center>";
    echo "<table border='1'>";
    echo "<tr><th>RA</th><th>Nome</th><th>Senha</th></tr>";

    // Saída de cada linha de dados
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["ra"] . "</td>";
        echo "<td>" . $row["nome"] . "</td>";
		echo "<td>********</td>";
        //echo "<td>" . $row["senha"] . "</td>";  // Exibe a senha em texto simples
        //echo "<td>" . $row["senha_md5"] . "</td>";  // Exibe a senha MD5
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Nenhum usuário encontrado.";
}

// Feche a conexão com o banco de dados
$conn->close();
?>
<head>
    <meta charset="UTF-8">
    <title>Lista de Usuários</title>
    <style>
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
    </style>
</head>