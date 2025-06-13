<?php
    include_once('admin/classes/dadosdoBanco.php');
    @$id_pedidoCarro  = $_SESSION['idPedidoHorti'];
?> 

<div id="base-carrinho">
    <h2><img src="imagens/barra-carrinho3.png" alt="Carrinho Pagina Inicial"></h2>
    <h3><img src="imagens/forma-pag.png" alt="Carrinho Pagina Inicial"></h3>
    <div class="dados-carrinho">
        <table cellpadding="0" cellspacing="0" border="1">
            <thead>
                <tr>
                    <th>PRODUTOS</th>
                    <th>QUANTIDADE</th>
                    <th>MEDIDA</th>
                    <th>PREÇO</th>
                    <th>SUBTOTAL</th>
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
                            <?= $carrinho->getQtdeCarro();?>
                        </td>
                        <td>
                            <?= $medida->verLinkMedida($idMedidaCarro);?>
                        </td>
                        <td>R$ <?= number_format($carrinho->getPrecoProd(), 2, ',', '.'); ?></td>
                        
                        <td>R$ <?= number_format($carrinho->getPrecoProd() * $carrinho->getQtdeCarro(), 2, ',', '.'); ?> </a></td>                       
                    </tr>                        
                <?php } ?> 
                <tr>
                    <td colspan="7"> Valor Total dos Produtos: <strong>R$ <?= number_format($valorTotal, 2, ',', '.'); ?></strong></td>                        
                </tr>
            </tbody>
        </table>
    </div>
    <div id="linha-botoes">
        <a href="index.php?link=1"><img src="imagens/continuar-comprando.png" alt=""></a>
        <img src="imagens/finalizar-compra.png" alt="">
    </div>