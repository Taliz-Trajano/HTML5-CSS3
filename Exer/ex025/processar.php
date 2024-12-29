<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = htmlspecialchars($_POST['nome']);
    $senha = htmlspecialchars($_POST['senha']);

    // Caminho do arquivo onde os dados serão armazenados
    $arquivo = "usuarios.txt";

    // Verificar se o servidor tem permissão para gravar
    if (is_writable(dirname(__FILE__))) {
        // Formatar e salvar os dados
        $dados = $nome . ";" . $senha . PHP_EOL;
        file_put_contents($arquivo, $dados, FILE_APPEND | LOCK_EX);

        // Redirecionar para a página de confirmação
        header("Location: sucesso.html");
        exit;
    } else {
        echo "<h1>Erro: O servidor não tem permissão para gravar os dados.</h1>";
    }
} else {
    echo "<h1>Método inválido.</h1>";
}
?>
