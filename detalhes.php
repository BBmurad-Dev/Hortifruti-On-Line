<?php 
    $idProduto = $_GET['idProd']; 
    $produto->setIdProduto($idProduto);
    $produto->mostrarDadosProduto();
    $idMedidaProd = $produto->getIdMedidaProd($idProduto);
    $idSetorProd = $produto->getIdSetorProd($idProduto);
    $idCategProd = $produto->getIdCategProd($idProduto);
?>

<div id="detalhe">
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
        
        <section class="vitrine-detalhe">
            <div id="cx-img-prod">
                <a href="#"><img src="admin/imagens/produtos/<?= $produto->getImagemGProd();?>" alt="<?php $produto->getSlugProd();?>"></a>
            </div>
            <div id="titulo-prod">
                <h1><a href="#"><?= $produto->getNomeProd();?></a></h1>
            </div>
            <div id="preco-prod">
                <spain>Preço/</spain><span class="abrevMedida2">(<?= $medida->verLinkMedida($idMedidaProd);?>):</span><strong> R$ <?php echo number_format($produto->getPrecoProd(), 2, ',', '.');?></strong>          
            </div>
            <div class="set-grp">
                <h3>Setor: </h3><h3 class="set-grp2"> <?= $setor->verLinkSetor($idSetorProd); ?> </h3>
            </div>
            <div class="set-grp cx2">
                <h3>Categoria: </h3> <h3 class="set-grp2"><?= $categoria->verLinkCateg($idCategProd); ?></h3> 
            </div>
            <div id="descricao">
                <h2>Descrição Rápida</h2>
                <p><?= $produto->getDescricaoProd();?> </p>             
            </div>
            <div id="comprar-prod">
                    <form action="">
                        <input type="submit" value="">
                    </form>
            </div>
        </section>
        <section class="vitrine">
            <h3 class="cor1 sugestao"> Sugestões de Compras </h3>
            <ul>
                <?php
                $sugestoes = $produto->verSugestoes($idCategProd);
                
                // Limita a exibição a 5 produtos ou ao total disponível
                $totalExibir = min(5, count($sugestoes));
                
                for ($i = 0; $i < $totalExibir; $i++) {
                    $prod = $sugestoes[$i];
                ?>
                <li>
                    <a href="index.php?link=2&idProd=<?= $prod['id_prod']; ?>"> 
                        <figure>
                            <img src="admin/imagens/produtos/<?php echo $prod['imagemp_prod'];?>" alt="<?php echo $prod['slug_prod'];?>">
                            <figcaption><?php echo $prod['nome_prod'];?></figcaption>
                        </figure>
                        <span> R$ <?php echo number_format($prod['preco_prod'], 2, ',', '.');?> </span> <span class="abrevMedida"> (<?= $medida->verLinkMedida($prod['id_medidaprod']);?>)</span>
                            <form action="admin/op/op_carrinho.php" method="post">
                                <input type="hidden" name="txt_idProd" value="<?= $produto->getIdProduto();?>">
                                <input type="hidden" name="txt_qtde" value="1">
                                <input type="hidden" name="txt_valorProd" value="<?= $produto->getPrecoProd(); ?>">
                                <input type="submit" value="">
                            </form>
                    </a>
                </li> 
                <?php } ?>           
            </ul>
        </section>
    </div>
</div>