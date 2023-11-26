<?php
session_start();

// Ver se o usuário está autenticado (logado)
if (!isset($_SESSION["email"])) {
    header("Location: index.html");
    exit;
}


// Função para ler e retornar os dados dos alunos do arquivo
function obterDadosAlunos($arquivo) {
    $dados_alunos = [];
    if (file_exists($arquivo)) {
        $linhas = file($arquivo, FILE_IGNORE_NEW_LINES);
        foreach ($linhas as $linha) {
            $dados = explode('|', $linha);
            $nota1 = floatval($dados[2]);
            $nota2 = floatval($dados[3]);
            $dados_alunos[] = [
                'nome' => $dados[0],
                'matricula' => $dados[1],
                'nota1' => $nota1,
                'nota2' => $nota2
            ];
        }
    }
    return $dados_alunos;
}


$arquivo_alunos = 'dados_alunos.txt';
$alunos = obterDadosAlunos($arquivo_alunos);
?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="todososcss.css">
    <title>Lista de Alunos</title>
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
<div class="card custom-card-blue">
    <div class="card-body">
    <h1 class="card-title text-center">Lista de Alunos</h1>
    <table class="table table-bordered border-dark">
        <thead>
            <tr class="tabela">
                <th>Nome</th>
                <th>Matrícula</th>
                <th>Nota 1</th>
                <th>Nota 2</th>
                <th>Média</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($alunos as $aluno) : ?>
                <tr class="tabela">
                    <td><?php echo $aluno['nome']; ?></td>
                    <td><?php echo $aluno['matricula']; ?></td>
                    <td><?php echo $aluno['nota1']; ?></td>
                    <td><?php echo $aluno['nota2']; ?></td>
                    <td><?php echo ($aluno['nota1']+$aluno['nota2'])/2; ?></td>
                </tr>
            <?php endforeach; ?>


        </tbody>
    </table>
    <a href="dados_usuario.php"><button type="button" class="btn btn-outline-primary">Voltar</button></a>
    <a href="logout.php"><button type="button" class="btn btn-outline-danger a">Logout</button></a>
    </div>
</div>
</div>
</body>
</html>
