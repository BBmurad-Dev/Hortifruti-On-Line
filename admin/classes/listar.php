<?php
    include_once ("paginacao.php");

    class listar extends Paginacao {
        private $strNumPagina, $strPaginas, $strUrl;
        
        public function setNumPagina($valor) {
            $this->strNumPagina = $valor;
        }

        public function setUrl($valor) {
            $this->setUrl = $valor;
        }

        public function getPaginas() {
            return $this-> strNumPagina;
        }

        public function listaCategoria() {
            $sql = "SELECT * FROM "
        }
   
    }
?>
