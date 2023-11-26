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
    $nota1 = $_POST["nota1"];
    $nota2 = $_POST["nota2"];

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
    <title>Dados do Usuário</title>
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
    <div class="card" style="width: 18rem;">
        <h1 class="card-title text-center">Dados do Usuário</h1>
        <div class="d-flex flex-column align-items-center">
            <ul class="list-group list-group-flush mb-3">
                <?php
                echo "<li class='list-group-item'>Nome: " . $_SESSION["nome"] . "</li>";
                echo "<li class='list-group-item'>Email: " . $_SESSION["email"] . "</li>";
                ?>
            </ul>
        </div>
    </div>
</div>

</body>
</html>
