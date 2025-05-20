<?php
    include_once("../classes/manipulaDados.php");

    $categoria = new manipulaDados ();
    $categoria->setTabela("categoria");

    $nome_categ  = $_POST["txt_nome_categ"];
    $slug_categ  = $_POST["txt_slug_categ"];
    $ordem_categ = $_POST["txt_ordem_categ"];
    $ativo_categ = $_POST["txt_ativo_categ"];

    $categoria->setCampos("nome_categ, slug_categ, ordem_categ, ativo_categ");

    $categoria->setDados("'$nome_categ', '$slug_categ','$ordem_categ', '$ativo_categ'");

    $categoria->inserir();
?>