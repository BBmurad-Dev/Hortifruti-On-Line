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
                            <img src="admin/imagens/produtos/Prodg-1.jpg" alt="">
                            <strong>Nome do Produto</strong>
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
</div>