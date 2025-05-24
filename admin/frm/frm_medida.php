<?php
    include_once("./classes/dadosdoBanco.php");
    @$acao   = $_GET["acao"];
    @$id     = $_GET["id"];

    if ($acao!=""){ 
       
        $dados = new DadosMedida();
        $dados->setIdMedida($id);
        $dados->mostrarDadosMedida();

        $nomeMedida  = $dados->getNomeMedida();
        $slugMedida  = $dados->getSlugMedida();
        $ordemMedida = $dados->getOrdemMedida();
        $ativoMedida = $dados->getAtivoMedida();
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
        ?> de Medidas
    </h2>
    <form action="./op/op_medida.php" method="post" enctype="multipart/form-data">
        <div class="dois-campos">
            <label for="">
                <span class="titulo">Nome da Medida</span>
                <input type="text" name="txt_nome_medida" id="txt_nome_medida" value="<?php if ($acao!="") { echo $nomeMedida; } ?>">
            </label>
            <label for="">
                <span class="titulo">Slug da Medida</span>
                <input type="text" name="txt_slug_medida" id="txt_slug_medida" value="<?php if ($acao!="") { echo $slugMedida; } ?>">
            </label>
        </div>
        <div class="dois-campos">
            <label for="">
                <span class="titulo">Ordem da Medida</span>
                <input type="text" name="txt_ordem_medida" id="txt_ordem_medida" value="<?php if ($acao!="") { echo $ordemMedida; } ?>">
            </label>
            <label for="">
                <span class="titulo">Ativo</span>
                <select name="txt_ativo_medida" id="txt_ativo_medida">
                    <option value="SIM" <?php if ($acao!="" && $ativoMedida=="SIM") echo "selected"; ?>>SIM</option>
                    <option value="NÃO" <?php if ($acao!="" && $ativoMedida=="NÃO") echo "selected"; ?>>NÃO</option>
                </select>
            </label>
        </div>
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="hidden" name="acao" value="<?php if ($acao!="") {echo $acao;} else {echo "Inserir";}?>">
        <input type="submit" value="<?php if ($acao!="") {echo $acao;} else {echo "Inserir";}?>" class="botao">
    </form>
</div>