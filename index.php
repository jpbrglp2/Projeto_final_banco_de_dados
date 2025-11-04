<?php
require 'conexao.php';

// Cadastrar aluno
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nome'], $_POST['idade'], $_POST['contato'])) {
    $nome = htmlspecialchars(trim($_POST['nome']));
    $idade = (int) $_POST['idade'];
    $contato = htmlspecialchars(trim($_POST['contato']));

    if (!empty($nome) && $idade > 0 && !empty($contato)) {
        $stmt = $pdo->prepare("INSERT INTO alunos (nome, idade, contato) VALUES (?, ?, ?)");
        $stmt->execute([$nome, $idade, $contato]);
        header("Location: index.php");
        exit;
    } else {
        echo "<p style='color:red;'>Preencha todos os campos corretamente!</p>";
    }
}

// Buscar alunos
$stmt = $pdo->query("SELECT * FROM alunos ORDER BY id DESC");
$alunos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Gerenciamento de Alunos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="text-center mb-4">Cadastro de Alunos</h2>

    <form method="POST" class="mb-4 p-3 bg-white border rounded shadow-sm">
        <div class="row g-3">
            <div class="col-md-4">
                <input type="text" name="nome" class="form-control" placeholder="Nome" required>
            </div>
            <div class="col-md-2">
                <input type="number" name="idade" class="form-control" placeholder="Idade" required>
            </div>
            <div class="col-md-4">
                <input type="text" name="contato" class="form-control" placeholder="Contato (Telefone ou Email)" required>
            </div>
            <div class="col-md-2">
                <button class="btn btn-primary w-100">Cadastrar</button>
            </div>
        </div>
    </form>

    <h3 class="mb-3">Lista de Alunos</h3>
    <table class="table table-striped table-bordered table-hover bg-white">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Idade</th>
                <th>Contato</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
        <?php if (count($alunos) > 0): ?>
            <?php foreach ($alunos as $a): ?>
                <tr>
                    <td><?= $a['id'] ?></td>
                    <td><?= htmlspecialchars($a['nome']) ?></td>
                    <td><?= $a['idade'] ?></td>
                    <td><?= htmlspecialchars($a['contato']) ?></td>
                    <td>
                        <a href="editar.php?id=<?= $a['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                        <a href="excluir.php?id=<?= $a['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Deseja excluir este aluno?')">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="5" class="text-center">Nenhum aluno cadastrado.</td></tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>
</body>
</html>
