    <div id="corpo-loja">
    <aside class="banner">
        <img src="imagens/banner01.png" alt="Imagem Hortifruti">
    </aside>

    <section class="categorias">
        <h2 class="cor1">Setores e Categorias</h2>
        <nav>
            <ul class="cor1">  
                <li><a href="?linkSetor=255">.: PROMOÇÕES</a></li>
                <ul>
                    <li><a href="?linkCateg=255">.: PROMOÇÕES DA SEMANA </a></li>
                </ul>              
                <?php 
                    $sqlSetor   = "SELECT * FROM setor";
                    $total = $setor->totalRegistrosSetor($sqlSetor);
                    for ($i=0; $i<$total; $i++) {  
                        $setor->verSetores($sqlSetor,$i);
                        $idLinkSetor = $setor->getIdSetor();                                   
                ?>
                    <li><a href="?linkSetor=<?= @$idLinkSetor; ?>"> .: <?php echo $setor->getNomeSetor(); ?></a></li>
                        <ul>
                            <?php 
                            $sqlCateg   = "SELECT * FROM categoria WHERE id_setorcateg = '$idLinkSetor'";
                            $totalCateg = $categoria->totalRegistrosCateg($sqlCateg);
                            for ($iCateg=0; $iCateg<$totalCateg; $iCateg++) {
                                $categoria->verCategorias($sqlCateg, $iCateg);
                                $idLinkCateg = $categoria->getIdCateg();
                            ?>
                            <li><a href="?linkCateg=<?= $idLinkCateg; ?>">.: <?= $categoria->getNomeCateg(); ?> </a></li>
                            <?php } ?>
                        </ul>
                <?php } ?>                
            </ul>
        </nav>
    </section>

    <div id="lado-direito">
        <h3 class="titulo-vitrine cor1">Lista de Produtos</h3>
        <section class="vitrine">
            <?php
                @$linkSetor = $_GET['linkSetor'];
                @$linkCateg = $_GET['linkCateg'];

                if ($linkSetor == null && $linkCateg == null){
                        $linkSetor = 255;
                }
             ?>
            <h2>
                <?php if ($linkSetor == 255 or $linkCateg == 255) { echo "PROMOÇÕES DA SEMANA"; } else
                    if ($linkCateg == null ) { echo "SETOR DE " . $setor->verLinkSetor($linkSetor); }
                    else echo "CATEGORIA DE ". $categoria->verLinkCateg($linkCateg); ?></h2>
            <ul>

                <?php if ($linkSetor == 255 or $linkCateg == 255) { 
                    $sqlPromo  = "SELECT * FROM produto WHERE promocao_prod='SIM' ORDER BY nome_prod ASC";
                    $totalPromo = $produto->totalRegistrosProd($sqlPromo);
                            for ($iPromo=0; $iPromo<$totalPromo; $iPromo++) {
                                $produto->verProdutos($sqlPromo, $iPromo);
                                $idProdPromo = $produto->getIdProduto();
                                $idMedidaProd = $produto->getIdMedidaProd(); ?>
                    <li>
                        <a href="index.php?link=2&idProd=<?= $idProdPromo; ?>"> 
                            <figure>
                                <img src="admin/imagens/produtos/<?php echo $produto->getImagemPProd();?>" alt="<?php echo $produto->getSlugProd();?>">
                                <figcaption><?php echo $produto->getNomeProd();?></figcaption>
                            </figure>
                            <span> R$ <?php echo number_format($produto->getPrecoProd(), 2, ',', '.');?> <span class="abrevMedida"> (<?= $medida->verLinkMedida($idMedidaProd);?>)</span>
                            <form action="admin/op/op_carrinho.php" method="post">
                                <input type="hidden" name="txt_idProd" value="<?= $produto->getIdProduto();?>">
                                <input type="hidden" name="txt_qtde" value="1">
                                <input type="hidden" name="txt_valorProd" value="<?= $produto->getPrecoProd(); ?>">
                                <input type="submit" value="">
                            </form>
                        </a>
                    </li>                 
                <?php } }?>
                <?php if ($linkCateg == null ) { 
                    $sqlProdSetor  = "SELECT * FROM produto WHERE id_setorprod='$linkSetor' ORDER BY nome_prod ASC";
                    $totalProdSetor = $produto->totalRegistrosProd($sqlProdSetor);
                            for ($iProdSetor=0; $iProdSetor<$totalProdSetor; $iProdSetor++) {
                                $produto->verProdutos($sqlProdSetor, $iProdSetor);
                                $idProdSetor = $produto->getIdProduto();
                                $idMedidaProd = $produto->getIdMedidaProd(); ?> 
                    <li>
                        <a href="index.php?link=2&idProd=<?= $idProdSetor; ?>"> 
                            <figure>
                                <img src="admin/imagens/produtos/<?php echo $produto->getImagemPProd();?>" alt="<?php echo $produto->getSlugProd();?>">
                                <figcaption><?php echo $produto->getNomeProd();?></figcaption>
                            </figure>
                            <span> R$ <?php echo number_format($produto->getPrecoProd(), 2, ',', '.');?> </span> <span class="abrevMedida"> (<?= $medida->verLinkMedida($idMedidaProd);?>)</span>
                            <form action="admin/op/op_carrinho.php" method="post">
                                <input type="hidden" name="txt_idProd" value="<?= $produto->getIdProduto();?>">
                                <input type="hidden" name="txt_qtde" value="1">
                                <input type="hidden" name="txt_valorProd" value="<?= $produto->getPrecoProd(); ?>">
                                <input type="submit" value="">
                            </form>
                        </a>
                    </li>                 
                <?php } } ?>
                <?php if ($linkSetor == null ) { 
                    $sqlProdCateg  = "SELECT * FROM produto WHERE id_categprod='$linkCateg' ORDER BY nome_prod ASC";
                    $totalProdCateg = $produto->totalRegistrosProd($sqlProdCateg);
                            for ($iProdCateg=0; $iProdCateg<$totalProdCateg; $iProdCateg++) {
                                $produto->verProdutos($sqlProdCateg, $iProdCateg);
                                $idProdCateg = $produto->getIdProduto();
                                $idMedidaProd = $produto->getIdMedidaProd(); ?>
                    <li>
                        <a href="index.php?link=2&idProd=<?= $idProdCateg; ?>"> 
                            <figure>
                                <img src="admin/imagens/produtos/<?php echo $produto->getImagemPProd();?>" alt="<?php echo $produto->getSlugProd();?>">
                                <figcaption><?php echo $produto->getNomeProd();?></figcaption>
                            </figure>
                            <span> R$ <?php echo number_format($produto->getPrecoProd(), 2, ',', '.');?> </span> <span class="abrevMedida"> (<?= $medida->verLinkMedida($idMedidaProd);?>)</span>
                            <form action="admin/op/op_carrinho.php" method="post">
                                <input type="hidden" name="txt_idProd" value="<?= $produto->getIdProduto();?>">
                                <input type="hidden" name="txt_qtde" value="1">
                                <input type="hidden" name="txt_valorProd" value="<?= $produto->getPrecoProd(); ?>">
                                <input type="submit" value="">
                            </form>
                        </a>
                    </li>                 
                <?php } } ?>
            </ul>
        </section>
    </div>
</div>