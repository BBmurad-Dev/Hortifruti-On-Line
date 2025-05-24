<?php
    include_once("../classes/manipulaDados.php");

    $acao = $_POST["acao"];
    $id   = $_POST["id"];

    $setor = new manipulaDados ();
    $setor->setTabela("setor");

    $nome_setor  = $_POST["txt_nome_setor"];
    $slug_setor  = $_POST["txt_slug_setor"];
    $ordem_setor = $_POST["txt_ordem_setor"];
    $ativo_setor = $_POST["txt_ativo_setor"];

    if ($acao=="Inserir") {
    $setor->setCampos("nome_setor, slug_setor, ordem_setor, ativo_setor");
    $setor->setDados("'$nome_setor', '$slug_setor','$ordem_setor', '$ativo_setor'");
    $setor->inserir();
    echo "<script type='text/javascript'>location.href='../index.php?link=10'</script>";
    }

    if ($acao=="Alterar") {
        $setor->setCampoTabela("id_setor");
        $setor->setValorPesquisa("$id");
        $setor->setCampos  ("nome_setor  = '$nome_setor', 
                                 slug_setor  = '$slug_setor',
                                 ordem_setor = '$ordem_setor',
                                 ativo_setor = '$ativo_setor'");        
        $setor->alterar();
        echo "<script type='text/javascript'>location.href='../index.php?link=10'</script>";
    }

    if ($acao=="Excluir") {
        $setor->setCampoTabela("id_setor");
        $setor->setValorPesquisa("$id");
        $setor->excluir();
        echo "<script type='text/javascript'>location.href='../index.php?link=10'</script>";
    }
?>