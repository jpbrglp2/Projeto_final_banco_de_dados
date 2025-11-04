<?php
require 'conexao.php';

if (!isset($_GET['id'])) {
    die("ID não informado!");
}

$id = (int) $_GET['id'];

$stmt = $pdo->prepare("DELETE FROM alunos WHERE id = ?");
$stmt->execute([$id]);

header("Location: index.php");
exit;
?>
