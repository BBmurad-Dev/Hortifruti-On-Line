<?php 
    @session_start();

    include_once('admin/classes/dadosdoBanco.php');
    include_once('admin/classes/manipulaDados.php');

    $carrinho = new DadosCarrinho();
    $cadastro = new manipulaDados();
    
    $idPedido  = $_SESSION['idPedidoHorti'];
    $idCliente = $_SESSION['cliente_horti']['IDCLIENTE'];

    date_default_timezone_set('America/Sao_Paulo');
    $data = date('Y-m-d');

    // Inserir a informação para a tabela de vendas //

    $cadastro->setTabela('venda');
    $cadastro->setCampos('  id_clientevenda, 
                            data_venda, 
                            pago_venda, 
                            total_venda, 
                            formapgto_venda, 
                            status_venda, 
                            rastreamento_venda');
    $cadastro->setDados("   '$idCliente',
                            '$data',
                            'NÃO',
                            ' ',
                            'Trans/Dep/Pix',
                            'Aguardando Pgto',
                            ' '");
    $cadastro->inserir();

?>