<?php
    session_start();

    include_once("admin/classes/dadosdoBanco.php"); 
    include_once("admin/classes/biblio.php");

    $cliente    = new DadosCliente();

    @$txtEmail   = strip_tags($_POST["txt_email"]);
    @$txtSenha   = strip_tags($_POST["txt_senha"]);

    $sql        = "SELECT * FROM cliente WHERE email_cliente = '".anti_sql_injection($txtEmail)."' AND senha_cliente = '".anti_sql_injection($txtSenha)."' ";

    $totalRegistros = $cliente->totalRegistrosClientes($sql);

    if ($totalRegistros > 0) {
        $cliente->verClientes($sql, 0);

        $sessionCliente['IDCLIENTE']    = $cliente->getIdCliente();
        $sessionCliente['NOME']         = $cliente->getNomeCliente();
        $sessionCliente['EMAIL']        = $cliente->getEmailCliente();
        $sessionCliente['SENHA']        = $cliente->getSenhaCliente();
        
        $_SESSION['cliente_horti'] =  $sessionCliente;

        echo "<script type='text/javascript'> location.href='index.php?link=1' </script>";

    } else { 
        unset($_SESSION['cliente_horti']['IDCLIENTE']);
        unset($_SESSION['cliente_horti']['NOME']);
        unset($_SESSION['cliente_horti']['EMAIL']);

        echo "
            <<script type=\"text/javascript\">
            alert('Login não encontrado, tente novamente');
            window.location.href = 'index.php?link=5'; // Redireciona somente após o alerta
            </script>
            ";
    }

    ?>