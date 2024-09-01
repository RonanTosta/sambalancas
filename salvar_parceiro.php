<?php
include('conexao.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nomeParceiro = $_POST['parceiroNome'];
    $ativo = isset($_POST['ativo']) ? 1 : 0;
    $logoParceiro = '';

    if (isset($_FILES['parceiroLogo']) && $_FILES['parceiroLogo']['error'] == 0) {
        $extensao = strtolower(pathinfo($_FILES['parceiroLogo']['name'], PATHINFO_EXTENSION));
        $novoNome = uniqid() . '.' . $extensao;
        $diretorio = 'uploads/';

        if (move_uploaded_file($_FILES['parceiroLogo']['tmp_name'], $diretorio . $novoNome)) {
            $logoParceiro = $novoNome;
        }
    }

    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        $sql = "UPDATE parceiros SET nome_parceiro=?, logo=?, ativo=? WHERE id=?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$nomeParceiro, $logoParceiro, $ativo, $id]);
    } else {
        $sql = "INSERT INTO parceiros (nome_parceiro, logo, ativo) VALUES (?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$nomeParceiro, $logoParceiro, $ativo]);
    }

    header('Location: adm.html');
    exit();
}
?>
