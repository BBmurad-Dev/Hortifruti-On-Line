<?php
    class conexaoMySQL {
        protected $servidor;
        protected $usuario;
        protected $senha;
        protected $banco;
        protected $conexao;
        protected $qry;
        protected $dados;
        protected $totalDados;
    
    public function __construct() {
        $this->usuario  ="root";
        $this->senha    ="";
        $this->servidor ="localhost";
        $this->banco    ="bdhortifruti";
        $this->conectar();
    }

    function conectar() {
        $this->conexao  = @mysqli_connect($this->servidor, $this->usuario, $this->senha);
        if (!$this->conexao) {
            throw new Exception("Não foi possível conectar ao servidor do Banco de Dados:" . mysqli_connect_errno());
        }
        $this->banco    = mysqli_select_db($this->conexao, $this->banco);
        if (!$this->banco) {
            throw new Exception("Não foi possível selecionar o Banco de Dados" . mysqli_error($this->banco));
        }
    }

    function executarSQL($sql) {
        $this->qry  = @mysqli_query($this->conexao, $sql);
        return $this->qry;
    }

    function listar($qr) {
        $this->dados    = @mysqli_fetch_assoc($qr);
        return $this->dados;
    }

    function contaDados($qry) {
        $this->totalDados = mysqli_num_rows($qry);
        return $this->totalDados;
    }
    }
?>
