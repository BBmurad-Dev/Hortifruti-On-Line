    <div id="corpo-loja">
    <aside class="banner">
        <img src="imagens/banner01.png" alt="Imagem Hortifruti">
    </aside>

    <section class="categorias">
        <h2 class="cor1">Categorias</h2>

        <nav>
            <ul class="cor1">
                <?php 
                    $sqlSetor   = "SELECT * FROM setor";
                    $total = $setor->totalRegistrosSetor($sqlSetor);
                    for ($i=0; $i<$total; $i++) {  
                        $setor->verSetores($sqlSetor,$i);
                        $idSetor = $setor->getIdSetor();                                   
                ?>
                    <li><a href="#"> .: <?php echo $setor->getNomeSetor(); ?></a></li>
                        <ul>
                            <?php 
                                
                            ?>
                            <li><a href="#">.: Produto 1</a></li>
                            <li><a href="#">.: Produto 2</a></li>
                            <li><a href="#">.: Produto 3</a></li>
                            <li><a href="#">.: Produto 4</a></li>
                        </ul>
                <?php } ?>
                
            </ul>
        </nav>
    </section>

    <div id="lado-direito">
        <h3 class="titulo-vitrine cor1">Lista de Produtos</h3>
        <section class="vitrine">
            <h2>Categoria do Produto</h2>
            <ul>
                <li>
                    <a href="#">
                        <figure>
                            <img src="imagens/produtos_p/abacate.jpg" alt="abacate">
                            <figcaption>Abacate</figcaption>
                        </figure>
                        <span> R$ 37,90 </span>
                        <form action="">
                            <input type="submit" value="">
                        </form>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <figure>
                            <img src="imagens/produtos_p/abacate.jpg" alt="abacate">
                            <figcaption>Abacate</figcaption>
                        </figure>
                        <span> R$ 37,90 </span>
                        <form action="">
                            <input type="submit" value="">
                        </form>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <figure>
                            <img src="imagens/produtos_p/abacate.jpg" alt="abacate">
                            <figcaption>Abacate</figcaption>
                        </figure>
                        <span> R$ 37,90 </span>
                        <form action="">
                            <input type="submit" value="">
                        </form>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <figure>
                            <img src="imagens/produtos_p/abacate.jpg" alt="abacate">
                            <figcaption>Abacate</figcaption>
                        </figure>
                        <span> R$ 37,90 </span>
                        <form action="">
                            <input type="submit" value="">
                        </form>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <figure>
                            <img src="imagens/produtos_p/abacate.jpg" alt="abacate">
                            <figcaption>Abacate</figcaption>
                        </figure>
                        <span> R$ 37,90 </span>
                        <form action="">
                            <input type="submit" value="">
                        </form>
                    </a>
                </li>
            </ul>
        </section>
    </div>
</div>