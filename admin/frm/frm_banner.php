<?php
    @$acao   = $_GET["acao"];
    @$id     = $_GET["id"];

    if ($acao!=""){ 
        include_once("./classes/dadosdoBanco.php");

        $dados = new DadosBanner();
        $dados->setIdBanner($id);
        $dados->mostrarDadosBanner();

        $nomeBanner    = $dados->getNomeBanner();
        $altBanner     = $dados->getAltBanner();
        $urlBanner     = $dados->getUrlBanner();
        $imagemBanner  = $dados->getImagemBanner();
        $ativoBanner   = $dados->getAtivoBanner();
    }   
?>

<div id="formulario">
    <h2><?php if ($acao!="") {
        if ($acao=="Alterar") { echo "Alteração";
        }
        else {
        if ($acao=="Excluir") { echo "Exclusão";
        } 
        }
        } else {echo "Cadastro";}
        ?> de Banners
    </h2>
    <form action="./op/op_banner.php" method="post" enctype="multipart/form-data">
        <label for="">
            <span class="titulo">Nome do Banner</span>
            <input type="text" name="txt_nome_banner" id="txt_nome_banner" value="<?php if ($acao!="") { echo $nomeBanner; } ?>">
        </label>
        <div class="dois-campos">
            <label for="">
                <span class="titulo">Alt do Banner</span>
                <input type="text" name="txt_alt_banner" id="txt_alt_banner" value="<?php if ($acao!="") { echo $altBanner; } ?>">
            </label>
            <label for="">
                <span class="titulo">Url do Banner</span>
                <input type="text" name="txt_url_banner" id="txt_url_banner" value="<?php if ($acao!="") { echo $urlBanner; } ?>">
            </label>
        </div>
        <div class="dois-campos">
            <label class="imagem">
                <span class="titulo"><?php if ($acao!="") { 
                    echo "Imagem atual: ".$imagemBanner; 
                    } else echo "Selecione uma imagem"; ?>
                </span>
                <input type="file" name="img">
            </label>
            <label for="">
                <span class="titulo">Ativo</span>
                <select name="txt_ativo_banner" id="txt_ativo_banner">
                    <option value="SIM" <?php if ($acao!="" && $ativoBanner=="SIM") echo "selected"; ?>>SIM</option>
                    <option value="NÃO" <?php if ($acao!="" && $ativoBanner=="NÃO") echo "selected"; ?>>NÃO</option>
                </select>
            </label>
        </div>
        <input type="hidden" name="imagemBanner" value="<?php echo $imagemBanner; ?>">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="hidden" name="acao" value="<?php if ($acao!="") {echo $acao;} else {echo "Inserir";}?>">
        <input type="submit" value="<?php if ($acao!="") {echo $acao;} else {echo "Inserir";}?>" class="botao">
    </form>
</div>