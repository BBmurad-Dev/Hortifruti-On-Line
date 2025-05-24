<?php
    include_once("../classes/manipulaDados.php");

    $acao = $_POST["acao"];
    $id   = $_POST["id"];

    $medida = new manipulaDados ();
    $medida->setTabela("medida");

    $nome_medida  = $_POST["txt_nome_medida"];
    $slug_medida  = $_POST["txt_slug_medida"];
    $ordem_medida = $_POST["txt_ordem_medida"];
    $ativo_medida = $_POST["txt_ativo_medida"];

    if ($acao=="Inserir") {
    $medida->setCampos("nome_medida, slug_medida, ordem_medida, ativo_medida");
    $medida->setDados("'$nome_medida', '$slug_medida','$ordem_medida', '$ativo_medida'");
    $medida->inserir();
    echo "<script type='text/javascript'>location.href='../index.php?link=14'</script>";
    }

    if ($acao=="Alterar") {
        $medida->setCampoTabela("id_medida");
        $medida->setValorPesquisa("$id");
        $medida->setCampos  ("   nome_medida  = '$nome_medida', 
                                 slug_medida  = '$slug_medida',
                                 ordem_medida = '$ordem_medida',
                                 ativo_medida = '$ativo_medida'");        
        $medida->alterar();
        echo "<script type='text/javascript'>location.href='../index.php?link=14'</script>";
    }

    if ($acao=="Excluir") {
        $medida->setCampoTabela("id_medida");
        $medida->setValorPesquisa("$id");
        $medida->excluir();
        echo "<script type='text/javascript'>location.href='../index.php?link=14'</script>";
    }
?>