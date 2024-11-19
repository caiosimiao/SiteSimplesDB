<?php
// Incluir o arquivo de conexão com o banco de dados
include('db_connection.php');

// Verifique se os dados foram enviados via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $ra = $_POST['ra'];
    $senha = $_POST['senha'];

    // Validação simples para garantir que todos os campos sejam preenchidos
    if (empty($nome) || empty($ra) || empty($senha)) {
        echo "Todos os campos são obrigatórios.";
        exit;
    }

    // Verificar se o RA tem exatamente 8 números
    if (!preg_match('/^\d{8}$/', $ra)) {
        echo "O RA deve conter exatamente 8 números.";
        exit;
    }

    // Verificar se o RA já existe no banco de dados
    $sql_check_ra = "SELECT * FROM usuarios WHERE ra = ?";
    if ($stmt_check_ra = $conn->prepare($sql_check_ra)) {
        // Bind o parâmetro do RA
        $stmt_check_ra->bind_param("s", $ra);
        
        // Execute a consulta
        $stmt_check_ra->execute();
        
        // Armazene o resultado
        $stmt_check_ra->store_result();

        // Verifique se o RA já existe
        if ($stmt_check_ra->num_rows > 0) {
            echo "O RA informado já está cadastrado. Por favor, insira um RA diferente.";
            $stmt_check_ra->close();
            $conn->close();
            exit; // Interrompe a execução do código
        }

        // Feche a declaração
        $stmt_check_ra->close();
    }

    // Gerar o hash MD5 da senha
    $senha_hash = md5($senha);

    // Prepare a consulta SQL para inserir os dados
    $sql = "INSERT INTO usuarios (ra, nome, senha, senha_md5) VALUES (?, ?, ?, ?)";

    if ($stmt = $conn->prepare($sql)) {
        // Bind os parâmetros
        $stmt->bind_param("ssss", $ra, $nome, $senha, $senha_hash);

        // Execute a consulta
        if ($stmt->execute()) {
            // Cadastro realizado com sucesso, redireciona para listar_usuarios.php
            header("Location: listar_usuarios.php");
            exit; // Termina o script para evitar que o código continue sendo executado
        } else {
            echo "Erro ao cadastrar: " . $stmt->error;
        }

        // Feche a declaração
        $stmt->close();
    } else {
        echo "Erro ao preparar a consulta: " . $conn->error;
    }
}

// Feche a conexão com o banco de dados
$conn->close();
?>