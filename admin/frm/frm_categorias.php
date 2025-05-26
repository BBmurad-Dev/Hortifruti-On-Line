<?php
    include_once("./classes/dadosdoBanco.php");
    @$acao   = $_GET["acao"];
    @$id     = $_GET["id"];

    if ($acao!=""){ 
        
        $dados = new DadosCategoria();
        $dados->setIdCateg($id);
        $dados->mostrarDadosCateg();
        
        $idSetorCateg = $dados->getIdSetorCateg();
        $nomeCateg    = $dados->getNomeCateg();
        $slugCateg    = $dados->getSlugCateg();
        $ordemCateg   = $dados->getOrdemCateg();
        $ativoCateg   = $dados->getAtivoCateg();
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
        ?> de Categorias
    </h2>
    <form action="./op/op_categorias.php" method="post" enctype="multipart/form-data">
        <div class="tres-campos">
            <label for="">
                <span class="titulo">Nome da Categoria</span>
                <input type="text" name="txt_nome_categ" id="txt_nome_categ" value="<?php if ($acao!="") { echo $nomeCateg; } ?>">
            </label>
            <label for="">
                <span class="titulo">Slug da Categoria</span>
                <input type="text" name="txt_slug_categ" id="txt_slug_categ" value="<?php if ($acao!="") { echo $slugCateg; } ?>">
            </label>
            <label for="">
                <span class="titulo">Selecione o Setor</span>
                <select name="txt_id_setorcateg" id="txt_id_setorcateg">
                    <?php 
                        $comboBox = new DadosSetor ();
                        $comboBox->comboBoxSetor($idSetorProd);
                    ?>
                </select>
        </div>
        <div class="dois-campos">            
            <label for="">
                <span class="titulo">Ordem da Categoria</span>
                <input type="text" name="txt_ordem_categ" id="txt_ordem_categ" value="<?php if ($acao!="") { echo $ordemCateg; } ?>">
            </label>
            <label for="">
                <span class="titulo">Ativo</span>
                <select name="txt_ativo_categ" id="txt_ativo_categ">
                    <option value="SIM" <?php if ($acao!="" && $ativoCateg=="SIM") echo "selected"; ?>>SIM</option>
                    <option value="NÃO" <?php if ($acao!="" && $ativoCateg=="NÃO") echo "selected"; ?>>NÃO</option>
                </select>
            </label>
        </div>
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="hidden" name="acao" value="<?php if ($acao!="") {echo $acao;} else {echo "Inserir";}?>">
        <input type="submit" value="<?php if ($acao!="") {echo $acao;} else {echo "Inserir";}?>" class="botao">
    </form>
</div>