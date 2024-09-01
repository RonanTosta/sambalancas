<?php
require 'conexao.php';

$id = $_POST['id'] ?? null;
$nome_servico = $_POST['servicoTitulo'];
$descricao = $_POST['servicoDescricao'];
$imagem = $_FILES['servicoImagem']['name'];
$ativo = isset($_POST['ativo']) ? 1 : 0;

if ($id) {
    if ($imagem) {
        move_uploaded_file($_FILES['servicoImagem']['tmp_name'], 'uploads/' . $imagem);
        $stmt = $pdo->prepare("UPDATE servicos SET nome_servico = ?, descricao = ?, imagem = ?, ativo = ? WHERE id = ?");
        $stmt->execute([$nome_servico, $descricao, $imagem, $ativo, $id]);
    } else {
        $stmt = $pdo->prepare("UPDATE servicos SET nome_servico = ?, descricao = ?, ativo = ? WHERE id = ?");
        $stmt->execute([$nome_servico, $descricao, $ativo, $id]);
    }
} else {
    move_uploaded_file($_FILES['servicoImagem']['tmp_name'], 'uploads/' . $imagem);
    $stmt = $pdo->prepare("INSERT INTO servicos (nome_servico, descricao, imagem, ativo) VALUES (?, ?, ?, ?)");
    $stmt->execute([$nome_servico, $descricao, $imagem, $ativo]);
}

header('Location: adm.html');
?>
