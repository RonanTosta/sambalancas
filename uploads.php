<?php
$diretorio = 'uploads';

if (!is_dir($diretorio)) {
    if (mkdir($diretorio, 0777, true)) {
        echo "Diretório '$diretorio' criado com sucesso.<br>";

        if (chmod($diretorio, 0777)) {
            echo "Permissões definidas para 0777 no diretório '$diretorio'.<br>";
        } else {
            echo "Falha ao definir permissões para o diretório '$diretorio'.<br>";
        }
    } else {
        echo "Falha ao criar o diretório '$diretorio'.<br>";
    }
} else {
    echo "O diretório '$diretorio' já existe.<br>";

    if (chmod($diretorio, 0777)) {
        echo "Permissões definidas para 0777 no diretório '$diretorio'.<br>";
    } else {
        echo "Falha ao definir permissões para o diretório '$diretorio'.<br>";
    }
}
?>
