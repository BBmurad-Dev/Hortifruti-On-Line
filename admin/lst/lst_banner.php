<?php 
    include_once('./classes/Lista.php');

    $lista = new Lista();
    @$lista-> setNumPagina($_GET["pg"]);
    $lista-> setUrl("index.php?link=16");
?>

<h2>Lista de Banners Cadastrados</h2>

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
            $lista->listaBanner();
        ?>
        <tr>
            <td colspan="8"> <?php $lista->geraNumeros(); ?> </td>
        </tr>
    </tbody>
</table>