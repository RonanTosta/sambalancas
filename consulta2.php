<?php
require 'conexao.php';

try {
    $servicos = $pdo->query("SELECT * FROM servicos")->fetchAll(PDO::FETCH_ASSOC);
    $parceiros = $pdo->query("SELECT * FROM parceiros")->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo 'Erro na consulta SQL: ' . $e->getMessage();
    $servicos = [];
    $parceiros = [];
}

echo "<pre>";
print_r($servicos);
print_r($parceiros);
echo "</pre>";
?>
