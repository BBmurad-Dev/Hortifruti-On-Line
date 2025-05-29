<?php

    function upload_otimizado ($tmp, $nome, $pasta) {
    // Verifica se a pasta existe, se não, cria
    if (!file_exists($pasta)) {
        mkdir($pasta, 0755, true);
    }   
     
    // Monta o caminho completo do arquivo
    $caminho_completo = $pasta . '/' . $nome;
    
    // Move o arquivo temporário para o destino final
    if (move_uploaded_file($tmp, $caminho_completo)) {
        return $nome;
    } else {
        return false; // Retorna false em caso de falha
    }
}

   
?>