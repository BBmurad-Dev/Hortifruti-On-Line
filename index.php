<?php
    include_once("admin/classes/dadosdoBanco.php");    
    $setor      = new DadosSetor();
    $categoria  = new DadosCategoria();
    $medida     = new DadosMedida();
    $produto    = new DadosProduto();
    $carrinho   = new DadosCarrinho();
    $cliente    = new DadosCliente();

    session_start();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos/css.css">
    <title>Hortifruti On Line</title>
</head>
<body>
    <div id="principal">
        <section id="cabecalho">
            <?php include_once ('cabecalho.php'); ?>
        </section> <!-- fim da section  cabeçalho-->
        <section id ="corpo">
            <?php
                        @$link = $_GET["link"];

                        $pag[1] = "home.php";
                        $pag[2] = "detalhes.php";
                        $pag[3] = "carrinho.php";
                        $pag[4] = "frm_clientes.php";
                        $pag[5] = "logarParaComprar.php";
                        $pag[6] = "formaPagamento.php";                       

                        if (!empty($link)) {
                            if (file_exists($pag[$link])) {
                                include $pag[$link];
                            }
                            else {
                                include "home.php";
                            }
                        }    
                            else {
                                include "home.php";
                            }                                                    
                    ?>   
        </section> <!-- fim da section corpo -->
        <footer>
            <?php include_once ('rodape.php'); ?>
        </footer> <!-- fim do rodapé -->
    </div> <!-- fim da div principal -->
</body>
</html>