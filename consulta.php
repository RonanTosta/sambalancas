<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'conexao.php';

try {
    // Consultando os serviços e parceiros ativos
    $servicos = $pdo->query("SELECT * FROM servicos WHERE ativo = 1")->fetchAll(PDO::FETCH_ASSOC);
    $parceiros = $pdo->query("SELECT * FROM parceiros WHERE ativo = 1")->fetchAll(PDO::FETCH_ASSOC);

    // Debug: Verificando se as consultas retornam dados
    echo '<h2>Debug de Consultas</h2>';
    echo '<h3>Serviços</h3>';
    if (empty($servicos)) {
        echo '<p>Nenhum serviço ativo encontrado.</p>';
    } else {
        foreach ($servicos as $servico) {
            echo '<p>Nome: ' . htmlspecialchars($servico['nome_servico']) . '</p>';
            echo '<p>Descrição: ' . htmlspecialchars($servico['descricao']) . '</p>';
            echo '<p>Imagem: ' . htmlspecialchars($servico['imagem']) . '</p>';
            echo '<hr>';
        }
    }

    echo '<h3>Parceiros</h3>';
    if (empty($parceiros)) {
        echo '<p>Nenhum parceiro ativo encontrado.</p>';
    } else {
        foreach ($parceiros as $parceiro) {
            echo '<p>Nome: ' . htmlspecialchars($parceiro['nome_parceiro']) . '</p>';
            echo '<p>Logo: ' . htmlspecialchars($parceiro['logo']) . '</p>';
            echo '<hr>';
        }
    }
} catch (PDOException $e) {
    echo 'Erro na consulta SQL: ' . $e->getMessage();
    $servicos = [];
    $parceiros = [];
}
?>
