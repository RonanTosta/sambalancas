<?php
require 'conexao.php';

try {
    $servicos = $pdo->query("SELECT * FROM servicos")->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($servicos);
} catch (PDOException $e) {
    echo json_encode(['error' => 'Erro ao buscar serviços: ' . $e->getMessage()]);
}
?>
