<?php 
    include_once('./classes/Lista.php');

    $lista = new Lista();
    @$lista-> setNumPagina($_GET["pg"]);
    $lista-> setUrl("index.php?link=14");
?>

<h2>Lista de Medidas</h2>

<table cellpadding="0" cellspacing="0" border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Medidas</th>
            <th>Slug Medidas</th>
            <th>Ordem de Exibição</th>
            <th>Ativo</th>
            <th>Editar</th>
            <th>Excluir</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $lista->listaMedida();        
        ?>        
        <tr>
            <td colspan="7"> <?php $lista->geraNumeros(); ?> </td>
        </tr>
    </tbody>
</table>