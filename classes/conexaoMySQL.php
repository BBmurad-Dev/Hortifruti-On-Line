<?php
    class conexaoMySQL {
        protected $servidor;
        protected $usuario;
        protected $senha;
        protected $banco;
        protected $conexao;
        protected $qry;
        protected $dados;
    }

    public function __construct() {
        $this->usuario  ="root";
        $this->senha    ="";
        $this->servidor ="localhost";
        $this->banco    ="NomedoBancoAqui";
        self::conectar();
    }

    function conectar() {
        $this->conexao  = @mysqli_connect($this->servidor, $this->usuario, $this->senha) or die ("Não foi possível conectar com o SERVIDOR do banco de dados".mysqli_error());
        $this->banco    = @mysqli_select_db($this->banco) or die ("Não foi possível conectar ao Banco de Dados".mysqli_error());
    }

    function executarSQL($sql) {
        $this->qry  = @mysqli_query($this->conexao, $sql) or die ("Erro ao executar o comando MySQL: $sql <br>".mysqli_error());
        return $this->qry;
    }

    function listar($qr) {
        $this->dados    = @mysqli_fetch_assoc($qr);
        return $this->dados;
    }



?>
