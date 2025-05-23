<?php
    include_once("../classes/manipulaDados.php");

    $acao = $_POST["acao"];
    $id   = $_POST["id"];

    $categoria = new manipulaDados ();
    $categoria->setTabela("categoria");

    $nome_categ  = $_POST["txt_nome_categ"];
    $slug_categ  = $_POST["txt_slug_categ"];
    $ordem_categ = $_POST["txt_ordem_categ"];
    $ativo_categ = $_POST["txt_ativo_categ"];

    if ($acao=="Inserir") {
    $categoria->setCampos("nome_categ, slug_categ, ordem_categ, ativo_categ");
    $categoria->setDados("'$nome_categ', '$slug_categ','$ordem_categ', '$ativo_categ'");
    $categoria->inserir();
    echo "<script type='text/javascript'>location.href='../index.php?link=11'</script>";
    }

    if ($acao=="Alterar") {
        $categoria->setCampoTabela("id_categ");
        $categoria->setValorPesquisa("$id");
        $categoria->setCampos  ("nome_categ  = '$nome_categ', 
                                 slug_categ  = '$slug_categ',
                                 ordem_categ = '$ordem_categ',
                                 ativo_categ = '$ativo_categ'");        
        $categoria->alterar();
        echo "<script type='text/javascript'>location.href='../index.php?link=11'</script>";
    }

    if ($acao=="Excluir") {
        $categoria->setCampoTabela("id_categ");
        $categoria->setValorPesquisa("$id");
        $categoria->excluir();
        echo "<script type='text/javascript'>location.href='../index.php?link=11'</script>";
    }
?>