<?php 
    include_once("../classes/manipulaDados.php");
    include_once("../classes/dadosdoBanco.php");

    $carrinho = new DadosCarrinho();
    $cadastro = new manipulaDados ();

    session_start();

    @$id_prodCarro   = $_POST['txt_idProd'];
    @$qtdeCarro      = $_POST['txt_qtde'];
    @$valorProdCarro = $_POST['txt_valorProd'];
    @$acaoCarrinho   = $_POST['acao'];
    @$acaoCarrinho2  = $_POST['acao2'];

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
    $cadastro->setTabela("carrinho");

    if ($acaoCarrinho != 'ALTERAR') {

        $sql       = "SELECT * FROM carrinho WHERE id_prodcarro = '$id_prodCarro' AND id_pedidocarro = '$id_pedidoCarro'";
        $totalReg  = $carrinho->totalRegistrosCarro($sql);


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
    }

    if ($acaoCarrinho == 'ALTERAR') {
        @$v_atualiza     = $_POST['txt_qtde'];
        $chave      = array_keys($v_atualiza);
        for ($iloop = 0; $iloop < sizeof($chave); $iloop ++) {
            $indice        = $chave[$iloop];
            $txt_qtde      = $v_atualiza[$indice]['QTDE'];
            $id_prodCarro  = $v_atualiza[$indice]['IDPRODUTO'];

            $cadastro->setCampoTabela("id_pedidocarro");
            $cadastro->setValorPesquisa("'$id_pedidoCarro' AND id_prodcarro = '$id_prodCarro'");
            $cadastro->setCampos("quantidade_carro = '$txt_qtde' ");
            $cadastro->alterar();

        }

    }

    if ($acaoCarrinho2 == 'EXCLUIR') {
        $v_atualiza = $_POST['txt_qtde'];
        $chave = array_keys($v_atualiza);
        $cont = sizeof($chave);

        $id_prodCarro = $v_atualiza['IDPRODUTO'];

            $cadastro->setCampoTabela('id_pedidocarro');
            $cadastro->setValorPesquisa("'$id_pedidoCarro' AND id_prodcarro = '$id_prodCarro'");

            $cadastro->excluir();
            
        }
    
   
?>

<script type='text/javascript'> location.href='../../index.php?link=3' </script>

