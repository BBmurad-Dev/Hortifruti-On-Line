<?php 
    include_once("../classes/manipulaDados.php");
    include_once("../classes/dadosdoBanco.php");

    $carrinho = new DadosCarrinho();
    $cadastro = new manipulaDados ();

    session_start();

    $id_prodCarro   = $_POST['txt_idProd'];
    $qtdeCarro      = $_POST['txt_qtde'];
    $valorProdCarro = $_POST['txt_valorProd'];

    echo "Id produto: " . $id_prodCarro . " - Quantidade: " . $qtdeCarro . " - Valor do Produto: " . $valorProdCarro;

    if (@$_SESSION["idPedidoHorti"] == "" || @$_SESSION["idPedidoHorti"] == 0 ) {
        
        $dataAtual = date("Y-m-d");

        if (@$_SESSION['cliente_horti']['ID'] != "") {
            $idClienteHorti = $_SESSION['cliente_horti']['ID'];
        } else {
            $idClienteHorti = "0";
        }
        $cadastro->setTabela("pedido");
        $cadastro->setCampos("id_cliepedido, data_pedido, status_pedido");
        $cadastro->setDados("'$idClienteHorti', '$dataAtual', 'Pedido Iniciado'");
        $cadastro->inserir();
        
        // Pega o último código gerado

        $ultimoReg = $cadastro->ultimoRegistro("id_pedido","pedido"); 

        if ($ultimoReg != "" && $ultimoReg != 0 ) {
            $_SESSION['idPedidoHorti'] = $ultimoReg; 
        } else {
            // Trata o erro que pode ocorrer 
        }
    }

    @$id_pedidoCarro = $_SESSION['idPedidoHorti'];

    $sql       = "SELECT * FROM carrinho WHERE id_prodcarro = '$id_prodCarro' AND id_pedidocarro = '$id_pedidoCarro'";
    $totalReg  = $carrinho->totalRegistrosCarro($sql);
    $cadastro->setTabela("carrinho");

   if ($totalReg > 0) {
        $cadastro->setCampoTabela("id_pedidocarro");
        $cadastro->setValorPesquisa("'$id_pedidoCarro' AND id_prodcarro = '$id_prodCarro'");
        $cadastro->setCampos("quantidade_carro = quantidade_carro + 1");
        $cadastro->setDados("'$id_pedidoCarro', '$id_prodCarro', '$qtdeCarro', '$valorProdCarro'");
        $cadastro->alterar();
   } else {
        $cadastro->setCampos("id_pedidocarro, id_prodcarro, quantidade_carro, valor_carro");
        $cadastro->setDados("'$id_pedidoCarro', '$id_prodCarro', '$qtdeCarro', '$valorProdCarro'");
        $cadastro->inserir();
   }

?>
