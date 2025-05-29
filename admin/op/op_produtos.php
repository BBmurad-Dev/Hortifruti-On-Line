<?php
    include_once("../classes/manipulaDados.php");
    include_once("../classes/dadosdoBanco.php");
    include_once("../classes/biblio.php");

    $acao = $_POST["acao"];
    $id   = $_POST["id"];

    $produto = new manipulaDados ();
    $produto->setTabela("produto");

    $idCategProd     = $_POST["txt_id_categprod"];
    $idSetorProd     = $_POST["txt_id_setorprod"];  
    $nomeProd        = $_POST["txt_nome_prod"];
    $slugProd        = $_POST["txt_slug_prod"];
    $descricaoProd   = $_POST["txt_descricao_prod"];
    $idMedidaProd    = $_POST["txt_id_medidaprod"];
    $precoProd       = $_POST["txt_preco_prod"];
    $promocaoProd    = $_POST["txt_promocao_prod"];
    $imagemPProd     = $_FILES["imgP"];
    $imagemGProd     = $_FILES["imgG"];
    $txt_nomeimagemP = $_POST["imagemPProd"];
    $txt_nomeimagemG = $_POST["imagemGProd"];
    $ativoProd       = $_POST["txt_ativo_prod"];

    /********** VERIFICA CONFIGURA E FAZ O UPLOAD DA IMAGEM P **********/

    if ($imagemPProd["name"]!="") {
        $pasta      = "../imagens/produtos/";
        $permitido  = array("image/jpg", "image/jpeg", "image/pjpeg");
        $tmp        = $imagemPProd['tmp_name'];
        $name       = $imagemPProd["name"];
        $type       = $imagemPProd["type"];

        $ultReg = new DadosProduto();

        // Opção 1: Pegar o próximo ID disponível (RECOMENDADO)
        $proximoId = $ultReg->pegarProximoId();

        if (!empty($name) && in_array($type, $permitido)) {
            $txt_nomeimagemP = "Prodp-" . $proximoId . ".jpg";
            upload_otimizado($tmp, $txt_nomeimagemP, $pasta);            
        }
        else if (!empty($name) && $type=="image/png") { 
            $txt_nomeimagemP = "Prodp-" . $proximoId . ".png";
            upload_otimizado($tmp, $txt_nomeimagemP, $pasta);
        }
        else if (!empty($name) && $type=="image/gif") { 
            $txt_nomeimagemP = "Prodp-" . $proximoId . ".gif";
            upload_otimizado($tmp, $txt_nomeimagemP, $pasta);
        }
    }

    /********** VERIFICA CONFIGURA E FAZ O UPLOAD DA IMAGEM g **********/

    if ($imagemGProd["name"]!="") {
        $pasta      = "../imagens/produtos/";
        $permitido  = array("image/jpg", "image/jpeg", "image/pjpeg");
        $tmp        = $imagemGProd['tmp_name'];
        $name       = $imagemGProd["name"];
        $type       = $imagemGProd["type"];

        $ultReg = new DadosProduto();

        // Opção 1: Pegar o próximo ID disponível (RECOMENDADO)
        $proximoId = $ultReg->pegarProximoId();

        if (!empty($name) && in_array($type, $permitido)) {
            $txt_nomeimagemG = "Prodg-" . $proximoId . ".jpg";
            upload_otimizado($tmp, $txt_nomeimagemG, $pasta);            
        }
        else if (!empty($name) && $type=="image/png") { 
            $txt_nomeimagemG = "Prodg-" . $proximoId . ".png";
            upload_otimizado($tmp, $txt_nomeimagemG, $pasta);
        }
        else if (!empty($name) && $type=="image/gif") { 
            $txt_nomeimagemG = "Prodg-" . $proximoId . ".gif";
            upload_otimizado($tmp, $txt_nomeimagemG, $pasta);
        }
    }

    /*****************************************************************/

    if ($acao=="Inserir") {
    $produto->setCampos("id_categprod, id_setorprod, nome_prod, slug_prod, descricao_prod, id_medidaprod, preco_prod, promocao_prod, imagemp_prod, imagemg_prod, ativo_prod");
    $produto->setDados("'$idCategProd', '$idSetorProd','$nomeProd', '$slugProd', '$descricaoProd', '$idMedidaProd', '$precoProd', '$promocaoProd','$txt_nomeimagemP', '$txt_nomeimagemG', '$ativoProd'");
    $produto->inserir();
    echo "<script type='text/javascript'>location.href='../index.php?link=7'</script>";
    }

    if ($acao=="Alterar") {
        $produto->setCampoTabela("id_prod");
        $produto->setValorPesquisa("$id");
        $produto->setCampos  (" id_categprod   = '$idCategProd', 
                                id_setorprod   = '$idSetorProd',
                                nome_prod      = '$nomeProd',
                                slug_prod      = '$slugProd',
                                descricao_prod = '$descricaoProd',
                                id_medidaprod  = '$idMedidaProd',
                                preco_prod     = '$precoProd',
                                promocao_prod  = '$promocaoProd',
                                imagemp_prod   = '$txt_nomeimagemP',
                                imagemg_prod   = '$txt_nomeimagemG',
                                ativo_prod     = '$ativoProd'");        
        $produto->alterar();
        echo "<script type='text/javascript'>location.href='../index.php?link=7'</script>";
    }

    if ($acao=="Excluir") {
        $produto->setCampoTabela("id_prod");
        $produto->setValorPesquisa("$id");
        $produto->excluir();
        unlink("../produtos/".$txt_nomeimagemP);
        unlink("../produtos/".$txt_nomeimagemG);
        echo "<script type='text/javascript'>location.href='../index.php?link=7'</script>";
    }
?>