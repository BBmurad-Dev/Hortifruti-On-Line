<?php 
    include_once('./classes/Lista.php');

    $lista = new Lista();
    @$lista-> setNumPagina($_GET["pg"]);
    $lista-> setUrl("index.php?link=12");
?>

<h2>Lista de Categorias</h2>

<table cellpadding="0" cellspacing="0" border="1">
    <thead>
        <tr>
            <th>ID Categ</th>
            <th>Categoria</th>
            <th>Slug Categ</th>
            <th>Setor da Categ</th>
            <th>Exibição</th>
            <th>Ativo</th>
            <th>Editar</th>
            <th>Excluir</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $lista->listaCategoria();        
        ?>        
        <tr>
            <td colspan="8"> <?php $lista->geraNumeros(); ?> </td>
        </tr>
    </tbody>
</table>