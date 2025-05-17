<?php
    include_once ("paginacao.php");

    class listar extends Paginacao {
        private $strNumPagina, $strPaginas, $strUrl;
        
        public function setNumPagina($valor) {
            $this->strNumPagina = $valor;
        }

        public function setUrl($valor) {
            $this->strUrl = $valor;
        }

        public function getPaginas() {
            return $this-> strNumPagina;
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
                    <td> $linha[id_categ] </td>
                    <td> $linha[nome_categ] </td>
                    <td> $linha[slug_categ] </td>
                    <td> $linha[ordem_categ] </td>
                    <td> $linha[ativo_categ] </td>
                    <td><a href='../index.php?link=3&id=$linha[id_categ]'><img src='imagens/' alt='' border='0'></a></td>
                    <td><a href='../index.php?link=3&id=$linha[id_categ]'><img src='imagens/' alt='' border='0'></a></td>
                </tr>
                ";
                self::setContador($cont);
            }

        }
   
    }
?>
