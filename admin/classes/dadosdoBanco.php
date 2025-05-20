<?php
    include_once("conexaoMySQL.php");

    class DadosCategoria extends conexaoMySQL {
        private $id_categ, $nome_categ, $slug_categ, $ordem_categ, $ativo_categ;
        
        public function setIdCateg($id_categ) {
            $this-> id_categ = $id_categ;
        }
        public function getIdCateg() {
            return $this-> id_categ;
        }
        public function getNomeCateg() {
            return $this-> nome_categ;
        }
        public function getSlugCateg() {
            return $this-> slug_categ;
        }
        public function getOrdemCateg() {
            return $this-> ordem_categ;
        }
        public function getAtivoCateg() {
            return $this-> ativo_categ;
        }

        public function mostrarDadosCateg() {
            $sql   = "SELECT * FROM categoria WHERE id_categ='$this->id_categ'";
            $qry   = self::executarSQL($sql);
            $linha = self::listar($qry);

            $this->id_categ    = $linha["id_categ"];
            $this->nome_categ  = $linha["nome_categ"];
            $this->slug_categ  = $linha["slug_categ"];
            $this->ordem_categ = $linha["ordem_categ"];
            $this->ativo_categ = $linha["ativo_categ"];

        }
    }



?>