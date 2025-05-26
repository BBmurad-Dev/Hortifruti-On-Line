<?php
    include_once ("paginacao.php");

    class Lista extends Paginacao {
        private $strNumPagina, $strPaginas, $strUrl;
        
        public function setNumPagina($valor) {
            $this->strNumPagina = $valor;
        }

        public function setUrl($valor) {
            $this->strUrl = $valor;
        }

        public function getPaginas() {
            return $this-> strPaginas;
        }

        public function listaSetor() {
            $sql = "SELECT * FROM setor";
            $this-> setParametro($this->strNumPagina);
            $this-> setFileName($this->strUrl);
            $this-> setInfoMaxPag(10);
            $this-> setMaximoLinks(50);
            $this-> setSQL($sql);   

            self::iniciaPaginacao();
            
            $cont = 0;
            while ($linha = self::results()) {
                $cont++;
                echo "
                <tr>
                    <td> $linha[id_setor]    </td>
                    <td> $linha[nome_setor]  </td>
                    <td> $linha[slug_setor]  </td>
                    <td> $linha[ordem_setor] </td>
                    <td> $linha[ativo_setor] </td>
                    <td><a href='./index.php?link=9&acao=Alterar&id=$linha[id_setor]'><img src='./imagens/alterar.gif' alt='Alterar' border='0'></a></td>
                    <td><a href='./index.php?link=9&acao=Excluir&id=$linha[id_setor]'><img src='./imagens/excluir.gif' alt='Excluir' border='0'></a></td>
                </tr>
                ";
                self::setContador($cont);
            }
        }

        public function listaCategoria() {
            $sql = "SELECT * FROM categoria";
            $this-> setParametro($this->strNumPagina);
            $this-> setFileName($this->strUrl);
            $this-> setInfoMaxPag(10);
            $this-> setMaximoLinks(50);
            $this-> setSQL($sql);   

            self::iniciaPaginacao();
            
            $cont = 0;
            while ($linha = self::results()) {
                $cont++;

                $sqlSetor  = "SELECT * FROM setor  WHERE id_setor = '$linha[id_setorcateg]'";
                $result = self::executarSQL($sqlSetor);
                $setor  = mysqli_fetch_assoc($result);

                echo "
                <tr>
                    <td> $linha[id_categ]    </td>
                    <td> $linha[nome_categ]  </td>
                    <td> $linha[slug_categ]  </td>
                    <td> $setor[nome_setor] </td>
                    <td> $linha[ordem_categ] </td>
                    <td> $linha[ativo_categ] </td>
                    <td><a href='./index.php?link=11&acao=Alterar&id=$linha[id_categ]'><img src='./imagens/alterar.gif' alt='Alterar' border='0'></a></td>
                    <td><a href='./index.php?link=11&acao=Excluir&id=$linha[id_categ]'><img src='./imagens/excluir.gif' alt='Excluir' border='0'></a></td>
                </tr>
                ";
                self::setContador($cont);
            }
        }

        public function listaMedida() {
            $sql = "SELECT * FROM medida";
            $this-> setParametro($this->strNumPagina);
            $this-> setFileName($this->strUrl);
            $this-> setInfoMaxPag(10);
            $this-> setMaximoLinks(50);
            $this-> setSQL($sql);   

            self::iniciaPaginacao();
            
            $cont = 0;
            while ($linha = self::results()) {
                $cont++;
                echo "
                <tr>
                    <td> $linha[id_medida]    </td>
                    <td> $linha[nome_medida]  </td>
                    <td> $linha[slug_medida]  </td>
                    <td> $linha[ordem_medida] </td>
                    <td> $linha[ativo_medida] </td>
                    <td><a href='./index.php?link=13&acao=Alterar&id=$linha[id_medida]'><img src='./imagens/alterar.gif' alt='Alterar' border='0'></a></td>
                    <td><a href='./index.php?link=13&acao=Excluir&id=$linha[id_medida]'><img src='./imagens/excluir.gif' alt='Excluir' border='0'></a></td>
                </tr>
                ";
                self::setContador($cont);
            }
        }

        public function listaBanner() {
            $sql = "SELECT * FROM banner";
            $this-> setParametro($this->strNumPagina);
            $this-> setFileName($this->strUrl);
            $this-> setInfoMaxPag(10);
            $this-> setMaximoLinks(50);
            $this-> setSQL($sql);   

            self::iniciaPaginacao();
            
            $cont = 0;
            while ($linha = self::results()) {
                $cont++;
                echo "
                <tr>
                    <td> $linha[id_banner]    </td>
                    <td> $linha[nome_banner]  </td>
                    <td> $linha[alt_banner]  </td>
                    <td> $linha[url_banner] </td>
                    <td> $linha[imagem_banner] </td>
                    <td> $linha[ativo_banner] </td>
                    <td><a href='./index.php?link=15&acao=Alterar&id=$linha[id_banner]'><img src='./imagens/alterar.gif' alt='Alterar' border='0'></a></td>
                    <td><a href='./index.php?link=15&acao=Excluir&id=$linha[id_banner]'><img src='./imagens/excluir.gif' alt='Excluir' border='0'></a></td>
                </tr>
                ";
                self::setContador($cont);
            }
        }

        public function listaProduto() {
            $sql = "SELECT * FROM produto";             
            $this-> setParametro($this->strNumPagina);
            $this-> setFileName($this->strUrl);
            $this-> setInfoMaxPag(10);
            $this-> setMaximoLinks(50);
            $this-> setSQL($sql);   

            self::iniciaPaginacao();
            
            $cont = 0;
            while ($linha = self::results()) {
                $cont++;
                
                $sqlSetor   = "SELECT * FROM setor WHERE id_setor = '$linha[id_setorprod]'";
                $result = self::executarSQL($sqlSetor);
                $setor  = mysqli_fetch_assoc($result);

                $sqlCategoria  = "SELECT * FROM categoria  WHERE id_categ = '$linha[id_categprod]'";
                $result = self::executarSQL($sqlCategoria);
                $categoria  = mysqli_fetch_assoc($result);

                echo "
                <tr>
                    <td> $linha[id_prod] </td>
                    <td> $linha[nome_prod] </td>
                    <td> $setor[nome_setor] </td>
                    <td> $categoria[nome_categ] </td>
                    <td> $linha[preco_prod] </td>
                    <td> $linha[promocao_prod] </td>
                    <td> $linha[ativo_prod] </td>
                    
                    <td><a href='./index.php?link=6&acao=Alterar&id=$linha[id_prod]'><img src='./imagens/alterar.gif' alt='Alterar' border='0'></a></td>
                    <td><a href='./index.php?link=6&acao=Excluir&id=$linha[id_prod]'><img src='./imagens/excluir.gif' alt='Excluir' border='0'></a></td>
                
                </tr>
                ";
                self::setContador($cont);
            }
        }
    }
?>
