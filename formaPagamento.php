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
    <h4 class="cor1">Opção 1 - Depósito / Transferência / Pix</h4>
    <div id="container-pagar">
        <div id="container-bancos-geral">
            <div id="container-bancos">
                <img src="imagens/bb.png" alt="Imagem Banco do Brasil">
                <p> Banco do Brasil    <br />
                    Agência: 1341-1 <br />
                    C/C: 12345-6    <br />
                    Four-System Technology <br />         
                </p>
                <img src="imagens/qr_code.jpg" alt="QR Code da Conta Bancaria">
            </div>    
            <div id="container-bancos">
                <img src="imagens/bradesco.png" alt="Imagem Banco Bradesco">
                <p> Banco Bradesco  <br />
                    Agência: 1341-1 <br />
                    C/C: 12345-6    <br />
                    Four-System Technology <br />
                </p>
                <img src="imagens/qr_code.jpg" alt="QR Code da Conta Bancaria">
            </div>                    
            <div id="container-bancos">
                <img src="imagens/itau.png" alt="Imagem Banco Itaú">
                <p> Banco Itaú     <br />
                    Agência: 1341-1 <br />
                    C/C: 12345-6    <br />
                    Four-System Technology <br />
                </p>
                <img src="imagens/qr_code.jpg" alt="QR Code da Conta Bancaria">
            </div>
            <div id="container-bancos">
                <img src="imagens/caixa.png" alt="Imagem Banco Caixa Econômica Federal">
                <p> Caixa Econômica Federal      <br />
                    Agência: 1341-1 <br />
                    C/C: 12345-6    <br />
                    Four-System Technology <br />
                </p>
                <img src="imagens/qr_code.jpg" alt="QR Code da Conta Bancaria">
            </div>
        </div>
    </div>
    <div id="linha-botoes">
        <a href="#"><img class="finalizar"   src="imagens/finalizar-pedido.gif" alt="Botão Finalizar Pedido"></a>
    </div>
</div>
