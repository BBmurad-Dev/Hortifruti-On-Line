<?php 
    session_start();
    
    if ($_SESSION['cliente_horti']['IDCLIENTE'] == "" || $_SESSION['cliente_horti']['IDCLIENTE'] == null ) {
        echo "<script type='text/javascript'> location.href='index.php?link=5' </script>";
    } else {
        echo "<script type='text/javascript'> location.href='index.php?link=6' </script>";
    }

?>