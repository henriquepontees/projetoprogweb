<?php
session_start();

// Ver se o usuário está autenticado (logado)
if (!isset($_SESSION["email"])) {
    header("Location: index.html");
    exit;
}

// Ver se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $matricula = $_POST["matricula"];
    $nota1 = floatval($_POST["nota1"]);
    $nota2 = floatval($_POST["nota2"]);

    // Formato para armazenar os dados no arquivo
    $dados_aluno = "$nome|$matricula|$nota1|$nota2" . PHP_EOL;

    // Abre o arquivo para escrita (ou cria se não existir)
    $arquivo_alunos = fopen('dados_alunos.txt', 'a');

    // Escreve os dados no arquivo
    fwrite($arquivo_alunos, $dados_aluno);

    // Fecha o arquivo
    fclose($arquivo_alunos);
}
?>
