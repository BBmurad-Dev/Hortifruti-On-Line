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
                echo "
                <tr>
                    <td> $linha[id_categ]    </td>
                    <td> $linha[nome_categ]  </td>
                    <td> $linha[slug_categ]  </td>
                    <td> $linha[ordem_categ] </td>
                    <td> $linha[ativo_categ] </td>
                    <td><a href='./index.php?link=3&acao=Alterar&id=$linha[id_categ]'><img src='./imagens/alterar.gif' alt='Alterar' border='0'></a></td>
                    <td><a href='./index.php?link=3&acao=Excluir&id=$linha[id_categ]'><img src='./imagens/excluir.gif' alt='Excluir' border='0'></a></td>
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

   
    }
?>
