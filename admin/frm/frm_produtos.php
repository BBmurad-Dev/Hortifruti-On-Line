<?php
    include_once("./classes/dadosdoBanco.php");
    @$acao   = $_GET["acao"];
    @$id     = $_GET["id"];

    if ($acao!=""){       

        $dados = new DadosProduto();
        $dados->setIdProduto($id);
        $dados->mostrarDadosProduto();

        $idCategProd   = $dados->getIdCategProd();
        $idSetorProd   = $dados->getIdSetorProd();
        $nomeProd      = $dados->getNomeProd();
        $slugProd      = $dados->getSlugProd();
        $descricaoProd = $dados->getDescricaoProd();
        $idMedidaProd  = $dados->getIdMedidaProd();
        $precoProd     = $dados->getPrecoProd();
        $promocaoProd  = $dados->getPromocaoProd();
        $imagemPProd   = $dados->getImagemPProd();
        $imagemGProd   = $dados->getImagemGProd();
        $ativoProd     = $dados->getAtivoProd();
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
        ?> de Produtos
    </h2>
    <form action="./op/op_produtos.php" method="post" enctype="multipart/form-data">
        <div class="dois-campos">
            <label for="">
                <span class="titulo">Nome do Produto</span>
                <input type="text" name="txt_nome_prod" id="txt_nome_prod" value="<?php if ($acao!="") { echo $nomeProd; } ?>">
            </label>
            <label for="">
                <span class="titulo">Slug do Produto</span>
                <input type="text" name="txt_slug_prod" id="txt_slug_prod" value="<?php if ($acao!="") { echo $slugProd; } ?>">
            </label>
        </div>
        <div class="tres-campos">
            <label for="">
                <span class="titulo">Selecione o Setor</span>
                <select name="txt_id_setorprod" id="txt_id_setorprod">
                    <?php 
                        $comboBox = new DadosSetor ();
                        $comboBox->comboBoxSetor($idSetorProd);
                    ?>
                </select>
            </label>
            <label for="">
                <span class="titulo">Selecione a Categoria</span>
                <select name="txt_id_categprod" id="txt_id_categprod">
                    <?php 
                        $comboBox = new DadosCategoria ();
                        $comboBox->comboBoxCateg($idCategProd);
                    ?>
                </select>

            </label>
            <label for="">
                <span class="titulo">Selecione a Medida</span>
                <select name="txt_id_medidaprod" id="txt_id_medidaprod">
                    <?php 
                        $comboBox = new DadosMedida ();
                        $comboBox->comboBoxMedida($idMedidaProd);
                    ?>
                </select>
            </label>        
        </div>
        <div class="dois-campos">
            <label class="imagem">
                <span class="titulo"><?php if ($acao!="") { 
                    echo "Imagem Pequena atual: ".$imagemPProd; 
                    } else echo "Selecione a Imagem Pequena (90x140)"; ?>
                </span>
                <input type="file" name="imgP">
            </label>
            <label class="imagem">
                <span class="titulo"><?php if ($acao!="") { 
                    echo "Imagem Grande atual: ".$imagemGProd; 
                    } else echo "Selecione a Imagem Grande (300x300)"; ?>
                </span>
                <input type="file" name="imgG">
            </label>
        </div>
        <div class="tres-campos">
            <label for="">
                <span class="titulo">Preço do Produto</span>
                <input type="text" name="txt_preco_prod" id="txt_preco_prod" value="<?php if ($acao!="") { echo $precoProd; } ?>">
            </label>
            <label for="">
                <span class="titulo">Protudo encontra-se em Promoção</span>
                <select name="txt_promocao_prod" id="txt_promocao_prod">
                    <option value="NÃO" <?php if ($acao!="" && $promocaoProd=="NÃO") echo "selected"; ?>>NÃO</option>
                    <option value="SIM" <?php if ($acao!="" && $promocaoProd=="SIM") echo "selected"; ?>>SIM</option>                    
                </select>
            </label>
            <label for="">
                <span class="titulo">Produto Ativo</span>
                <select name="txt_ativo_prod" id="txt_ativo_prod">
                    <option value="SIM" <?php if ($acao!="" && $ativoProd=="SIM") echo "selected"; ?>>SIM</option>
                    <option value="NÃO" <?php if ($acao!="" && $ativoProd=="NÃO") echo "selected"; ?>>NÃO</option>
                </select>
            </label>
        </div>
        <label for="">
            <span class="titulo">Descrição do Produto</span>
            <textarea name="txt_descricao_prod" id="txt_descricao_prod" rows=5><?php if ($acao!="") { echo htmlspecialchars($descricaoProd); } ?></textarea>
        </label>
        
        <input type="hidden" name="imagemPProd" value="<?php echo $imagemPProd; ?>">
        <input type="hidden" name="imagemGProd" value="<?php echo $imagemGProd; ?>">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="hidden" name="acao" value="<?php if ($acao!="") {echo $acao;} else {echo "Inserir";}?>">
        <input type="submit" value="<?php if ($acao!="") {echo $acao;} else {echo "Inserir";}?>" class="botao">
    </form>
</div>