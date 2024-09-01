<?php
session_start();
require 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome_usuario = $_POST['login'];
    $senha = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE nome_usuario = :nome_usuario AND senha = :senha");
    $stmt->bindParam(':nome_usuario', $nome_usuario);
    $stmt->bindParam(':senha', $senha);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $_SESSION['usuario'] = $nome_usuario;
        header("Location: adm.html");
        exit();
    } else {
        echo "<script>alert('Nome de usuário ou senha inválidos!'); window.location.href = 'login.html';</script>";
    }
}
?>
