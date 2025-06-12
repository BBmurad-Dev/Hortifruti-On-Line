<?php
    include_once("../classes/biblio.php");
    include_once("../classes/manipulaDados.php");
    include_once("../classes/dadosdoBanco.php");

    $acao = $_POST["acaoCliente"];

    $cadastro = new manipulaDados();
    $cadastro->setTabela("cliente");

    @$idCliente       = strip_tags(trim($_POST["idCliente"]));
    @$emailCliente    = strip_tags(trim($_POST["txt_email"]));  
    @$senhaCliente    = strip_tags(trim($_POST["txt_senha"]));
    @$nomeCliente     = strip_tags(trim($_POST["txt_nome"]));
    @$nascCliente     = strip_tags(trim($_POST["txt_nascimento"]));
    @$celularCliente  = strip_tags(trim($_POST["txt_celular"]));
    @$enderecoCliente = strip_tags(trim($_POST["txt_endereco"]));
    @$bairroCliente   = strip_tags(trim($_POST["txt_bairro"]));
    @$cidadeCliente   = strip_tags(trim($_POST["txt_cidade"]));
    @$ufCliente       = strip_tags(trim($_POST["txt_uf"]));
    @$cepCliente      = strip_tags(trim($_POST["txt_cep"]));
    @$ativoCliente    = strip_tags(trim($_POST["txt_ativo"]));

    if ($acao == "Inserir") {
        $cadastro->setCampos("nome_cliente, nascimento_cliente, celular_cliente, endereco_cliente, bairro_cliente, cidade_cliente, uf_cliente, cep_cliente, email_cliente, senha_cliente, ativo_cliente");
        $cadastro->setDados("
                                '".anti_sql_injection($nomeCliente)."', 
                                '".anti_sql_injection($nascCliente)."',
                                '".anti_sql_injection($celularCliente)."', 
                                '".anti_sql_injection($enderecoCliente)."', 
                                '".anti_sql_injection($bairroCliente)."', 
                                '".anti_sql_injection($cidadeCliente)."', 
                                '".anti_sql_injection($ufCliente)."', 
                                '".anti_sql_injection($cepCliente)."',
                                '".anti_sql_injection($emailCliente)."', 
                                '".anti_sql_injection($senhaCliente)."', 
                                '".anti_sql_injection($ativoCliente)."'
                                                        ");
        $cadastro->inserir();
        echo "<script type='text/javascript'>location.href='../../index.php?link=1'</script>";
    }

    if ($acao=="Alterar") {
        $cadastro->setCampoTabela("id_cliente");
        $cadastro->setValorPesquisa("$idCliente");
        $cadastro->setCampos  ("nome_cliente       = '".anti_sql_injection($nomeCliente)."', 
                                nascimento_cliente = '".anti_sql_injection($nascCliente)."',
                                celular_cliente    = '".anti_sql_injection($celularCliente)."',
                                endereco_cliente   = '".anti_sql_injection($enderecoCliente)."',
                                bairro_cliente     = '".anti_sql_injection($bairroCliente)."',
                                cidade_cliente     = '".anti_sql_injection($cidadeCliente)."',
                                uf_cliente         = '".anti_sql_injection($ufCliente)."',
                                cep_cliente        = '".anti_sql_injection($cepCliente)."',
                                email_cliente      = '".anti_sql_injection($emailCliente)."',
                                senha_cliente      = '".anti_sql_injection($senhaCliente)."',
                                ativo_cliente      = '".anti_sql_injection($ativoCliente)."'");        
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