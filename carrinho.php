<?php
    include_once('admin/classes/dadosdoBanco.php');
    @$id_pedidoCarro  = $_SESSION['idPedidoHorti'];
?> 

<div id="base-carrinho">
    <h2><img src="imagens/barra-carrinho1.png" alt="Carrinho Pagina Inicial"></h2>
    <h3><img src="imagens/meu-carrinho.png" alt="Carrinho Pagina Inicial"></h3>
    <div class="dados-carrinho">
        <form name="frm-carrinho" action="admin/op/op_carrinho.php" method="POST">
            <table cellpadding="0" cellspacing="0" border="1">
                <thead>
                    <tr>
                        <th>PRODUTOS</th>
                        <th>QUANTIDADE</th>
                        <th>MEDIDA</th>
                        <th>PREÇO</th>
                        <th>SUBTOTAL</th>
                        <th>ATUALIZAR</th>
                        <th>EXCLUIR</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql        = "SELECT c.*, p.* FROM carrinho c, produto p WHERE c.id_prodcarro = p.id_prod AND c.id_pedidocarro = '$id_pedidoCarro'";
                        $totalReg   = $carrinho->totalRegistrosCarro($sql);
                        $valorTotal = 0;
                        
                        for ($iCarro = 0; $iCarro < $totalReg; $iCarro++) {
                            $carrinho->verCarrinho($sql, $iCarro);
                            $idMedidaCarro = $carrinho->getIdMedidaProd();
                            $subTotal      = $carrinho->getPrecoProd() * $carrinho->getQtdeCarro();
                            $valorTotal    += $subTotal; 
                            $txt_qtde[$iCarro] = $carrinho->getIdProduto();
                    ?>
                        <tr>
                            <td>
                                <img class="img-carrinho" src="admin/imagens/produtos/<?= $carrinho->getImagemGProd();?>" alt="<?= $carrinho->getNomeProd() ?>">
                                <strong class="nome-produto"><?= $carrinho->getNomeProd();?></strong>
                            </td>
                            <td> 
                                <input type="number" id="txt_qtde" name="txt_qtde[<?= $iCarro ?>][QTDE]" class="qtdeCarro" value=<?= $carrinho->getQtdeCarro();?> size="3" maxlength="3" min="1" max="20" step="1" /> 
                            </td>
                            <td><?= $medida->verLinkMedida($idMedidaCarro);?></td>
                            <td>R$ <?= number_format($carrinho->getPrecoProd(), 2, ',', '.'); ?></td>
                            
                            <td>R$ <?= number_format($carrinho->getPrecoProd() * $carrinho->getQtdeCarro(), 2, ',', '.'); ?> </a></td>
                            <td>
                                <input type="hidden" name="acao" value="ALTERAR">
                                <input type="hidden" name="txt_qtde[<?= $iCarro ?>][IDPRODUTO]" value="<?= $carrinho->getIdProduto(); ?>">
                                <input type="submit" name="alterar" value="Atualizar">
                            </td>
                            <td>
                                <input type="hidden" name="acao2" value="EXCLUIR">
                                <input type="hidden" name="txt_qtde[<?= $iCarro ?>][IDPRODUTO]" value="<?= $carrinho->getIdProduto(); ?>">
                                <input type="submit" name="excluir_<?= $iCarro ?>" value="Excluir">
                            </td>
                        </tr>                        
                    <?php } ?> 
                    <tr>
                        <td colspan="7"> Valor Total dos Produtos: <strong>R$ <?= number_format($valorTotal, 2, ',', '.'); ?></strong></td>                        
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
    <div id="linha-botoes">
        <a href="index.php?link=1"><img src="imagens/continuar-comprando.png" alt=""></a>
        <img src="imagens/finalizar-compra.png" alt="">
    </div>
    <section class="vitrine">
            <h3 class="cor1 sugestao"> Sugestões de Compras </h3>
            <ul>
                <?php
                $sugestoes = $produto->verSugestoesCarrinho();
                
                // Limita a exibição a 5 produtos ou ao total disponível
                $totalExibir = min(7, count($sugestoes));
                
                for ($i = 0; $i < $totalExibir; $i++) {
                    $prod = $sugestoes[$i];
                ?>
                <li class="carrinho-vitrine">
                    <a href="index.php?link=2&idProd=<?= $prod['id_prod']; ?>"> 
                        <figure>
                            <img src="admin/imagens/produtos/<?php echo $prod['imagemp_prod'];?>" alt="<?php echo $prod['slug_prod'];?>">
                            <figcaption><?php echo $prod['nome_prod'];?></figcaption>
                        </figure>
                        <span> R$ <?= number_format($prod['preco_prod'], 2, ',', '.');?> </span> <span class="abrevMedida"> (<?= $medida->verLinkMedida($prod['id_medidaprod']);?>)</span>
                        <form action="">
                            <input type="submit" value="">
                        </form>
                    </a>
                </li> 
                <?php } ?>           
            </ul>
        </section>
</div>