<?php
    include_once("conexaoMySQL.php");

    class manipulaDados extends conexaoMySQL {
        protected $sql;
        protected $tabela;
        protected $campos;
        protected $dados;
        protected $msg;
        protected $campoTabela;
        protected $valorPesquisa;

        public function setTabela($tbl) {
            $this->tabela   = $tbl;
        }

        public function setCampos($campo) {
            $this->campos   = $campo;
        }

        public function setDados($dado) {
            $this->dados    = $dado;
        }

        public function setCampoTabela($campoTab) {
            $this->campoTabela  = $campoTab;
        }

        public function setValorPesquisa($valorPesq) {
            $this->valorPesquisa = $valorPesq;
        }

        public function getMsg() {
            return $this->msg;
        }

        public function inserir() {
            $this->sql  = "INSERT INTO $this->tabela ($this->campos) VALUES ($this->dados)";
            self::executarSQL($this->sql);
        }

        public function excluir() {
            $this->sql  = "DELETE FROM $this->tabela WHERE $this->campoTabela = '$this->valorPesquisa'";
            self::executarSQL($this->sql);
        }

        public function alterar() {
            $this->sql  = "UPDATE $this->tabela SET $this->campos WHERE $this->campoTabela = '$this->valorPesquisa'";
            self::executarSQL($this->sql);
        }
    }


?>
