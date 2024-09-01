<?php
require 'conexao.php';

$id = $_GET['id'];

try {
    $stmt = $pdo->prepare("SELECT * FROM parceiros WHERE id = ?");
    $stmt->execute([$id]);
    $parceiro = $stmt->fetch(PDO::FETCH_ASSOC);
    echo json_encode($parceiro);
} catch (PDOException $e) {
    echo json_encode(['error' => 'Erro ao buscar parceiro: ' . $e->getMessage()]);
}
?>
