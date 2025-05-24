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
                        $pag[2] = "home.php";
                        $pag[3] = "home.php";
                        $pag[4] = "home.php";
                        $pag[5] = "home.php";
                        $pag[6] = "frm/frm_produtos.php";
                        $pag[7] = "lst/lst_produtos.php";
                        $pag[8] = "home.php";
                        $pag[9] = "frm/frm_setor.php";
                        $pag[10] = "lst/lst_setor.php";
                        $pag[11] = "frm/frm_categorias.php";
                        $pag[12] = "lst/lst_categorias.php";
                        $pag[13] = "frm/frm_medida.php";
                        $pag[14] = "lst/lst_medida.php";
                        $pag[15] = "frm/frm_banner.php";
                        $pag[16] = "lst/lst_banner.php";
                        

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
