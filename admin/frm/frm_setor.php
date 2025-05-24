<?php
    include_once("./classes/dadosdoBanco.php");
    @$acao   = $_GET["acao"];
    @$id     = $_GET["id"];

    if ($acao!=""){ 
        
        $dados = new DadosSetor();
        $dados->setIdSetor($id);
        $dados->mostrarDadosSetor();

        $nomeSetor  = $dados->getNomeSetor();
        $slugSetor  = $dados->getSlugSetor();
        $ordemSetor = $dados->getOrdemSetor();
        $ativoSetor = $dados->getAtivoSetor();
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
        ?> de Setores
    </h2>
    <form action="./op/op_setor.php" method="post" enctype="multipart/form-data">
        <div class="dois-campos">
            <label for="">
                <span class="titulo">Nome do Setor</span>
                <input type="text" name="txt_nome_setor" id="txt_nome_setor" value="<?php if ($acao!="") { echo $nomeSetor; } ?>">
            </label>
            <label for="">
                <span class="titulo">Slug do Setor</span>
                <input type="text" name="txt_slug_setor" id="txt_slug_setor" value="<?php if ($acao!="") { echo $slugSetor; } ?>">
            </label>
        </div>
        <div class="dois-campos">
            <label for="">
                <span class="titulo">Ordem do Setor</span>
                <input type="text" name="txt_ordem_setor" id="txt_ordem_setor" value="<?php if ($acao!="") { echo $ordemSetor; } ?>">
            </label>
            <label for="">
                <span class="titulo">Ativo</span>
                <select name="txt_ativo_setor" id="txt_ativo_setor">
                    <option value="SIM" <?php if ($acao!="" && $ativoSetor=="SIM") echo "selected"; ?>>SIM</option>
                    <option value="NÃO" <?php if ($acao!="" && $ativoSetor=="NÃO") echo "selected"; ?>>NÃO</option>
                </select>
            </label>
        </div>
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="hidden" name="acao" value="<?php if ($acao!="") {echo $acao;} else {echo "Inserir";}?>">
        <input type="submit" value="<?php if ($acao!="") {echo $acao;} else {echo "Inserir";}?>" class="botao">
    </form>
</div>