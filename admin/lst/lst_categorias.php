<?php 
    include_once('./classes/listar.php');

    $lista = new Lista();
    $lista-> setNumPagina($_GET["pag"]);
    $lista-> setUrl("index.php?link=2");

?>
<h2>Lista de Categorias</h2>

<table cellpadding="0" cellspacing="0" border="1">
    <thead>
        <tr>
            <th>ID Categ</th>
            <th>Categoria</th>
            <th>Slug Categ</th>
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
            <td colspan="5"> 1 2 3 4 5 6 7 8 9 </td>
        </tr>
    </tbody>
</table>