<?php
    include_once("../classes/manipulaDados.php");
    include_once("../classes/dadosdoBanco.php");

    $acao = $_POST["acaoCliente"];

    $cadastro = new manipulaDados();
    $cadastro->setTabela("cliente");

    @$idCliente       = $_POST["idCliente"];
    @$emailCliente    = $_POST["txt_email"];  
    @$senhaCliente    = $_POST["txt_senha"];
    @$nomeCliente     = $_POST["txt_nome"];
    @$nascCliente     = $_POST["txt_nascimento"];
    @$celularCliente  = $_POST["txt_celular"];
    @$enderecoCliente = $_POST["txt_endereco"];
    @$bairroCliente   = $_POST["txt_bairro"];
    @$cidadeCliente   = $_POST["txt_cidade"];
    @$ufCliente       = $_POST["txt_uf"];
    @$cepCliente      = $_POST["txt_cep"];
    @$ativoCliente    = $_POST["txt_ativo"];

    if ($acao == "Inserir") {
        $cadastro->setCampos("nome_cliente, nascimento_cliente, celular_cliente, endereco_cliente, bairro_cliente, cidade_cliente, uf_cliente, cep_cliente, email_cliente, senha_cliente, ativo_cliente");
        $cadastro->setDados("'$nomeCliente', '$nascCliente','$celularCliente', '$enderecoCliente', '$bairroCliente', '$cidadeCliente', '$ufCliente', '$cepCliente','$emailCliente', '$senhaCliente', '$ativoCliente'");
        $cadastro->inserir();
        echo "<script type='text/javascript'>location.href='../../index.php?link=1'</script>";
    }

    if ($acao=="Alterar") {
        $cadastro->setCampoTabela("id_cliente");
        $cadastro->setValorPesquisa("$idCliente");
        $cadastro->setCampos  ("nome_cliente       = '$nomeCliente', 
                                nascimento_cliente = '$nascCliente',
                                celular_cliente    = '$celularCliente',
                                endereco_cliente   = '$enderecoCliente',
                                bairro_cliente     = '$bairroCliente',
                                cidade_cliente     = '$cidadeCliente',
                                uf_cliente         = '$ufCliente',
                                cep_cliente        = '$cepCliente',
                                email_cliente      = '$emailCliente',
                                senha_cliente      = '$senhaCliente',
                                ativo_cliente      = '$ativoCliente'");        
        $cadastro->alterar();
        echo "<script type='text/javascript'>location.href='../../index.php?link=1'</script>";
    }

    if ($acao=="Excluir") {
        $cadastro->setCampoTabela("id_cliente");
        $cadastro->setValorPesquisa("$idCliente");
        $cadastro->excluir();
        echo "<script type='text/javascript'>location.href='../../index.php?link=7'</script>";
    }
?>