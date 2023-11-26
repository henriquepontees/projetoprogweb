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


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="todososcss.css">
    <title>Login</title>
</head>
<body>
      <nav class="navbar navbar-expand-lg navbar-light bg-light" style="border: 1px solid black;" >
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item me-2">
                        <button type="button" class="btn btn-outline-dark"><a class="nav-link active"
                                aria-current="page" href="cadastro_alunos.php">Cadastro de aluno</a></button>
                    </li>
                    <li class="nav-item me-2">
                        <button type="button" class="btn btn-outline-dark"><a class="nav-link active"
                                aria-current="page" href="cadastro.html">Cadastro de usuário</a></button>
                    </li>
                    <li class="nav-item me-2">
                        <button type="button" class="btn btn-outline-dark"><a class="nav-link active"
                                aria-current="page" href="dados_usuario.php">Dados do usuário</a></button>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="btn btn-outline-dark"><a class="nav-link active"
                                aria-current="page" href="lista_alunos.php">Lista de alunos</a></button>
                    </li>
                    <li class="nav-item ms-auto">
                        <button type="button" class="btn btn-outline-dark"><a class="nav-link active"
                                aria-current="page" href="index.html">Login</a></button>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="btn btn-outline-dark"><a class="nav-link active"
                                aria-current="page" href="logout.php">Logout</a></button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <div class="teste">
    <div class="card">
    <div class="card-body">
    <h1 class="card-title text-center">Cadastro de Alunos</h1>
    <form action="dados_usuario.php" method="POST" id="formcadastroaluno" >
    <div class="form-floating mb-3">
    <input type="text" class="form-control" name="nome" id="nome" placeholder="Digite seu nome">
    <label for="nome">Nome</label>
</div>
<div class="form-floating mb-3">
    <input type="text" class="form-control" id="matricula" name="matricula" placeholder="Digite a matricula do aluno">
    <label for="matricula">Matricula</label>
</div>
<div class="form-floating mb-3">
    <input type="text" class="form-control" id="nota1" name="nota1" placeholder="Digite a primeira nota">
    <label for="nota1">Nota 1</label>
</div>
<div class="form-floating mb-3">
    <input type="text" class="form-control" id="nota2" name="nota2" placeholder="Digite a segunda nota">
    <label for="nota2">Nota 2</label>
</div>
    <button type="submit" class="btn btn-outline-success">Cadastrar</button>
    <a href="dados_usuario.php"><button type="button" class="btn btn-outline-primary">Voltar</button></a>
    </form>
    </div>
</div>
</div>
<script src="validacaocadastro_alunos.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
