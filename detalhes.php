<?php 
    $idProduto = $_GET['idProd']; 
    $produto->setIdProduto($idProduto);
    $produto->mostrarDadosProduto();
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
                <spain>Valor: </spain><strong> R$ <?= $produto->getPrecoProd();?></strong>
            </div>
            <div class="set-grp">
                <h3>Setor: Frutas</h3>
            </div>
            <div class="set-grp cx2">
                <h3>Grupo: Hortifruti</h3>
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

    </div>


</div>