<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Inscrição</title>
    <link rel="stylesheet" href="css/style.css">
    <script>
        // Validação no lado do cliente para senha
        function validarFormulario() {
            var senha = document.getElementsByName("senha")[0].value;
            var confirmacao = document.getElementsByName("senha-confirmacao")[0].value;
            if (senha !== confirmacao) {
                alert("As senhas não coincidem!");
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <div class="conteiner">
        <header>
            <h2>Formulário de Inscrição</h2>
        </header>

        <div id="form">
            <form method="post" id="form" action="salvar.php" onsubmit="return validarFormulario()">
                <div class="campo">
                    <label for="nome">Nome:</label>
                    <input type="text" name="nome" id="nome" class="nome" placeholder="Digite aqui seu Nome..." required>
                </div>

                <div class="campo">
                    <label for="ra">RA:</label>
                    <input type="text" name="ra" id="ra" pattern="^\d{8}$" class="ra" placeholder="Digite o seu RA..." required>
                </div>

                <div class="campo">
                    <label for="senha">Digite uma senha:</label>
                    <input type="password" name="senha" id="senha" class="senha" placeholder="Digite uma senha..." required>
                </div>

                <div class="campo">
                    <label for="senha-confirmacao">Confirme sua senha:</label>
                    <input type="password" name="senha-confirmacao" id="senha-confirmacao" class="senha-confirmacao" placeholder="Digite sua senha novamente..." required>
                </div>

                <button type="submit">Cadastrar</button>
            </form>
        </div>

        <footer>
            <p>&copy; Caio Simiao</p>
        </footer>
    </div>
</body>
</html>