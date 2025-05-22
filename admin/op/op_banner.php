<?php
    include_once("../classes/manipulaDados.php");
    include_once("../classes/dadosdoBanco.php");
    include_once("../classes/biblio.php");

    $acao = $_POST["acao"];
    $id   = $_POST["id"];

    $banner = new manipulaDados ();
    $banner->setTabela("banner");

    $nome_banner    = $_POST["txt_nome_banner"];
    $alt_banner     = $_POST["txt_alt_banner"];  
    $url_banner     = $_POST["txt_url_banner"];
    $ativo_banner   = $_POST["txt_ativo_banner"];
    $imagem         = $_FILES["img"];
    $txt_nomeimagem = $_POST["imagemBanner"];

    /********** VERIFICA CONFIGURA E FAZ O UPLOAD DA IMAGEM **********/

    if ($imagem["name"]!="") {
        $pasta      = "../banners";
        $permitido  = array("image/jpg", "image/jpeg", "image/pjpeg");
        $tmp        = $imagem['tmp_name'];
        $name       = $imagem["name"];
        $type       = $imagem["type"];

        $ultReg = new DadosBanner();

        // Opção 1: Pegar o próximo ID disponível (RECOMENDADO)
        $proximoId = $ultReg->pegarProximoId();

        if (!empty($name) && in_array($type, $permitido)) {
            $txt_nomeimagem = "bn-" . $proximoId . ".jpg";
            upload_jpg($tmp, $txt_nomeimagem, 1200, $pasta);            
        }
        else if (!empty($name) && $type=="image/png") { 
            $txt_nomeimagem = "bn-" . $proximoId . ".png";
            upload_png($tmp, $txt_nomeimagem, 1200, $pasta);
        }
        else if (!empty($name) && $type=="image/gif") { 
            $txt_nomeimagem = "bn-" . $proximoId . ".gif";
            upload_gif($tmp, $txt_nomeimagem, 1200, $pasta);
        }
    }

    /*****************************************************************/

    if ($acao=="Inserir") {
    $banner->setCampos("nome_banner, alt_banner, url_banner, imagem_banner, ativo_banner");
    $banner->setDados("'$nome_banner', '$alt_banner','$url_banner', '$txt_nomeimagem', '$ativo_banner'");
    $banner->inserir();
    echo "<script type='text/javascript'>location.href='../index.php?link=16'</script>";
    }

    if ($acao=="Alterar") {
        $banner->setCampoTabela("id_banner");
        $banner->setValorPesquisa("$id");
        $banner->setCampos  ("  nome_banner   = '$nome_banner', 
                                alt_banner    = '$alt_banner',
                                url_banner    = '$url_banner',
                                imagem_banner = '$txt_nomeimagem',
                                ativo_banner  = '$ativo_banner'");        
        $banner->alterar();
        echo "<script type='text/javascript'>location.href='../index.php?link=16'</script>";
    }

    if ($acao=="Excluir") {
        $banner->setCampoTabela("id_banner");
        $banner->setValorPesquisa("$id");
        $banner->excluir();
        echo "<script type='text/javascript'>location.href='../index.php?link=16'</script>";
    }
?>