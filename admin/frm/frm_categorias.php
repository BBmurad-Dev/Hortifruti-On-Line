<?php
    $acao   = $_GET["acao"];
    $id     = $_GET["id"];


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
        <div class="dois-campos">
            <label for="">
                <span class="titulo">Nome da Categoria</span>
                <input type="text" name="txt_nome_categ" id="txt_nome_categ">
            </label>
            <label for="">
                <span class="titulo">Slug da Categoria</span>
                <input type="text" name="txt_slug_categ" id="txt_slug_categ">
            </label>
        </div>
        <div class="dois-campos">
            <label for="">
                <span class="titulo">Ordem da Categoria</span>
                <input type="text" name="txt_ordem_categ" id="txt_ordem_categ">
            </label>
            <label for="">
                <span class="titulo">Ativo</span>
                <select name="txt_ativo_categ" id="txt_ativo_categ">
                    <option value="SIM">SIM</option>
                    <option value="NAO">NÃO</option>
                </select>
            </label>
        </div>
        <input type="submit" value="<?php if ($acao!="") {echo $acao;} else {echo "Inserir";}?>" class="botao">

    </form>

</div>