<?php
$host = 'localhost';
$dbname = 'alunos';
$username = 'root'; // altere conforme seu ambiente
$password = '';     // altere conforme seu ambiente

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro de conexão: " . $e->getMessage());
}
?>
