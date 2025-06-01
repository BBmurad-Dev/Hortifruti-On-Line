<div id="base-carrinho">
    <h2><img src="imagens/barra-carrinho1.png" alt="Carrinho Pagina Inicial"></h2>
    <h3><img src="imagens/meu-carrinho.png" alt="Carrinho Pagina Inicial"></h3>
    <div class="dados-carrinho">
        <form name="frm-carrinho" action="admin/op/op_carrinho.php">
            <table cellpadding="0" cellspacing="0" border="1">
                <thead>
                    <tr>
                        <th>Descrição do Produto</th>
                        <th>Quantidade</th>
                        <th>Preço Unitário</th>
                        <th>Subtotal</th>
                        <th>Atualizar</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <img class="img-carrinho" src="admin/imagens/produtos/Prodg-1.jpg" alt="">
                            <strong class="nome-produto">Nome do Produto</strong>
                        </td>
                        <td> 
                            <input type="number" id="qtdProd" name="qtdProd" value="1" size="3" maxlength="3" min="1" max="20" step="1" /> 
                        </td>
                        <td>R$ 3,89</td>
                        <td>R$ 3,89 </a></td>
                        <td>
                            <input type="submit" name="alterar" value="Atualizar">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5"> Valor Total dos Produtos: R$ </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
    <div id="linha-botoes">
        <img src="imagens/continuar-comprando.png" alt="">
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
                        <span> R$ <?php echo $prod['preco_prod'];?> </span> <span class="abrevMedida"> (<?= $medida->verLinkMedida($prod['id_medidaprod']);?>)</span>
                        <form action="">
                            <input type="submit" value="">
                        </form>
                    </a>
                </li> 
                <?php } ?>           
            </ul>
        </section>
</div>