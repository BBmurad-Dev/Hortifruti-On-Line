<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="estilos/style.css">
        <title>Hortifruti On Line</title>
    </head>
    <body>
        <div id="principal">
            <div id="cabecalho">
                <?php include_once ('cabecalho.php'); ?>
            </div> <!-- fim da section  cabeçalho-->
            <div id="corpo-adm">
                <nav id="lado-esquerdo">
                    <?php include_once ('menu.php'); ?>
                </nav>
                <div id="lado-direito">
                    <?php
                        $link = $_GET["link"];

                        $pag[1] = "home.php";
                        $pag[2] = "lst/lst_categorias.php";
                        $pag[3] = "frm/frm.php";
                        $pag[4] = "vendas.php";
                        $pag[5] = "promocao.php";
                        $pag[6] = "setores.php";
                        $pag[7] = "grupos.php";
                        $pag[8] = "medidas.php";
                        $pag[9] = "banners.php";

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
                </div>
            </div>
        </div>
    </body>
</html>
