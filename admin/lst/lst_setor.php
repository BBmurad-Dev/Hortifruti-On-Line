<?php 
    include_once('./classes/Lista.php');

    $lista = new Lista();
    @$lista-> setNumPagina($_GET["pg"]);
    $lista-> setUrl("index.php?link=10");
?>

<h2>Lista de Setores</h2>

<table cellpadding="0" cellspacing="0" border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Setores</th>
            <th>Slug Setores</th>
            <th>Ordem de Exibição</th>
            <th>Ativo</th>
            <th>Editar</th>
            <th>Excluir</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $lista->listaSetor();        
        ?>        
        <tr>
            <td colspan="7"> <?php $lista->geraNumeros(); ?> </td>
        </tr>
    </tbody>
</table>