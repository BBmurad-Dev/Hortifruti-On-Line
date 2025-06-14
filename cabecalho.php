<?php
    @$mostrarCliente     = $_SESSION['cliente_horti']['NOME'];
    if ($mostrarCliente == "" || $mostrarCliente == null) {
        $mostrarCliente = "Visitante";
        $txtLog         = "Logar";
        $txtLink        = "5";
    } else {
        $txtLog         = "Logoff";
        $txtLink        = "9";
    }

?>

<div id="cabecalho-superior">
    <nav id="menu-superior">
        <span class="bemvindo"><?php echo "Olá $mostrarCliente, seja bem vindo à nossa loja !"; ?></span>
        <ul>
            <li> <a href="#">Minha Conta</a></li>
            <li> <a href="index.php?link=3">Meu Carrinho</a></li>
            <li> <a href="index.php?link=5">Logar</a></li>
            <li> <a href="index.php?link=4">Cadastrar</a></li>
        </ul>
    </nav>

</div>
<div id="cabecalho-meio" class="cor1">
    <h1>HORTIFRUTI ONLINE - O melhor site de compras de frutas e legumes do Rio !</h1>
    <p class="sacola">Nenhum item no seu carrinho de compras
    </p>
    <section class="busca">
        <form action="">
            <label>
                <span> buscar </span>
                <input type="search" name="pesquisa" id="pesquisa">
                <button type="submit" class="botao-lupa">
                <img src="imagens/lupa.png" alt="Buscar">
            </button>
            </label>
        </form>
    </section>
</div>
<div id="cabecalho-inferior" class="cor2">
    <nav id="menu-principal">
        <ul>
            <li class="linha-vertical"> <a href="index.php?link=1">Home</a> </li>
            <li class="linha-vertical"> <a href="#">Produtos</a></li>
            <li class="linha-vertical"> <a href="#">Fale Conosco</a> </li>
            <li> <a href="#">Quem Somos</a> </li>
        </ul>
    </nav>
</div>