<?php
require 'conexao.php';

$id = $_GET['id'];

try {
    $stmt = $pdo->prepare("SELECT * FROM servicos WHERE id = ?");
    $stmt->execute([$id]);
    $servico = $stmt->fetch(PDO::FETCH_ASSOC);
    echo json_encode($servico);
} catch (PDOException $e) {
    echo json_encode(['error' => 'Erro ao buscar serviço: ' . $e->getMessage()]);
}
?>