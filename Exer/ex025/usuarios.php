<?php
// Caminho do arquivo onde os dados estão armazenados
$arquivo = "usuarios.txt";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuários Cadastrados</title>
</head>
<body>
    <h1>Lista de Usuários</h1>
    <table border="1">
        <tr>
            <th>Nome</th>
            <th>Senha</th>
        </tr>
        <?php
        if (file_exists($arquivo)) {
            $linhas = file($arquivo, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            foreach ($linhas as $linha) {
                list($nome, $senha) = explode(";", $linha);
                echo "<tr><td>" . htmlspecialchars($nome) . "</td><td>" . htmlspecialchars($senha) . "</td></tr>";
            }
        } else {
            echo "<tr><td colspan='2'>Nenhum usuário cadastrado.</td></tr>";
        }
        ?>
    </table>
    <br><br>
    <a href="formulario.html">Voltar ao formulário</a>
</body>
</html>
