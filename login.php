<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    // Lê o arquivo de texto e verifica as credenciais
    $linhas = file('dados_usuarios.txt', FILE_IGNORE_NEW_LINES);

    foreach ($linhas as $linha) {
        list($nome, $emailArmazenado, $senhaArmazenada) = explode('|', $linha);
        if ($email === $emailArmazenado && $senha === $senhaArmazenada) {
            $_SESSION["email"] = $email;
            $_SESSION["nome"] = $nome;
            header("Location: dados_usuario.php");
            exit;
        }
    }

}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type= "text/css" href="todososcss.css">
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

<div class="card">
    <div class="card-body">
    <h1 class="card-title text-center">LOGIN OU SENHA INCORRETO</h1>
    <a href="index.html"><button type="button" class="btn btn-outline-primary">Voltar</button></a>
    </form>
    </div>
</div>

    
</body>
</html>