<?php
require 'conexao.php';

try {
    $parceiros = $pdo->query("SELECT * FROM parceiros")->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($parceiros);
} catch (PDOException $e) {
    echo json_encode(['error' => 'Erro ao listar parceiros: ' . $e->getMessage()]);
}
?>
