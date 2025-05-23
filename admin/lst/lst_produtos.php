<?php 
    include_once('./classes/Lista.php');

    $lista = new Lista();
    @$lista-> setNumPagina($_GET["pg"]);
    $lista-> setUrl("index.php?link=7");
?>

<h2>Lista de Produtos Cadastrados</h2>

<table cellpadding="0" cellspacing="0" border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome Banner</th>
            <th>Alt (HTML)</th>
            <th>Url (WWW)</th>
            <th>Imagem</th>
            <th>Ativo</th>
            <th>Editar</th>
            <th>Excluir</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $lista->listaProduto();
        ?>
        <tr>
            <td colspan="8"> <?php $lista->geraNumeros(); ?> </td>
        </tr>
    </tbody>
</table>