<?php
require 'conexao.php';

if (!isset($_GET['id'])) {
    die("ID do aluno não informado!");
}

$id = (int) $_GET['id'];

// Buscar aluno
$stmt = $pdo->prepare("SELECT * FROM alunos WHERE id = ?");
$stmt->execute([$id]);
$aluno = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$aluno) {
    die("Aluno não encontrado!");
}

// Atualizar
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = htmlspecialchars(trim($_POST['nome']));
    $idade = (int) $_POST['idade'];
    $contato = htmlspecialchars(trim($_POST['contato']));

    if (!empty($nome) && $idade > 0 && !empty($contato)) {
        $stmt = $pdo->prepare("UPDATE alunos SET nome = ?, idade = ?, contato = ? WHERE id = ?");
        $stmt->execute([$nome, $idade, $contato, $id]);
        header("Location: index.php");
        exit;
    } else {
        echo "<p style='color:red;'>Preencha todos os campos corretamente!</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Aluno</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="text-center mb-4">Editar Aluno</h2>

    <form method="POST" class="p-4 bg-white border rounded shadow-sm">
        <div class="mb-3">
            <label>Nome:</label>
            <input type="text" name="nome" class="form-control" value="<?= htmlspecialchars($aluno['nome']) ?>" required>
        </div>
        <div class="mb-3">
            <label>Idade:</label>
            <input type="number" name="idade" class="form-control" value="<?= $aluno['idade'] ?>" required>
        </div>
        <div class="mb-3">
            <label>Contato:</label>
            <input type="text" name="contato" class="form-control" value="<?= htmlspecialchars($aluno['contato']) ?>" required>
        </div>
        <button class="btn btn-success">Salvar Alterações</button>
        <a href="index.php" class="btn btn-secondary">Voltar</a>
    </form>
</div>

</body>
</html>
