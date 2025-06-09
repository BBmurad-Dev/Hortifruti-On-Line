<?php
    include_once("conexaoMySQL.php");

    class DadosSetor extends conexaoMySQL {
        private $id_setor, $nome_setor, $slug_setor, $ordem_setor, $ativo_setor;
        
        public function setIdSetor($id_setor) {
            $this-> id_setor = $id_setor;
        }
        public function getIdSetor() {
            return $this-> id_setor;
        }
        public function getNomeSetor() {
            return $this-> nome_setor;
        }
        public function getSlugSetor() {
            return $this-> slug_setor;
        }
        public function getOrdemSetor() {
            return $this-> ordem_setor;
        }
        public function getAtivoSetor() {
            return $this-> ativo_setor;
        }

        public function mostrarDadosSetor() {
            $sql   = "SELECT * FROM setor WHERE id_setor='$this->id_setor'";
            $qry   = self::executarSQL($sql);
            $linha = self::listar($qry);

            $this->id_setor    = $linha["id_setor"];
            $this->nome_setor  = $linha["nome_setor"];
            $this->slug_setor  = $linha["slug_setor"];
            $this->ordem_setor = $linha["ordem_setor"];
            $this->ativo_setor = $linha["ativo_setor"];
        }

        public function comboBoxSetor($id) {
            $sql = "SELECT * FROM setor";
            $qry = self::executarSQL($sql);

            while ($linha = self::listar($qry)) {                
                $selecionado = ($id == $linha['id_setor']) ? "selected='selected'" : "";
                echo "<option value='{$linha['id_setor']}' $selecionado>{$linha['nome_setor']}</option>\n";
            }
        }

        public function totalRegistrosSetor($sql){
            $qry   = self::executarSQL($sql);
            $total = self::contaDados($qry);
            return $total; 
        }

        public function verSetores($sql, $i) {
            $qry = self::executarSQL($sql);
           
            // Mover o ponteiro para a linha desejada
            if (!mysqli_data_seek($qry, $i)) {
                return false; // Linha não encontrada
            }
            
            // Obter a linha como array associativo
            $row = mysqli_fetch_assoc($qry);
            
            if ($row) {
                $this->id_setor    = $row['id_setor'];
                $this->nome_setor  = $row['nome_setor'];
                $this->slug_setor  = $row['slug_setor'];
                $this->ordem_setor = $row['ordem_setor'];
                $this->ativo_setor = $row['ativo_setor'];
                return true;
            }            
                return false;
        }

        public function verLinkSetor ($valor) {
            $sql_verlink = "SELECT * FROM setor WHERE id_setor = '$valor'";
            $qry_verlink = self::executarSQL($sql_verlink);
            $linha_verlink = self::listar($qry_verlink);

            $linkSet = $linha_verlink['nome_setor'];

            return $linkSet;
        }
    }

    class DadosCategoria extends conexaoMySQL {
        private $id_categ, $id_setorcateg, $nome_categ, $slug_categ, $ordem_categ, $ativo_categ;
        
        public function setIdCateg($id_categ) {
            $this-> id_categ = $id_categ;
        }
        public function getIdCateg() {
            return $this-> id_categ;
        }
        public function getIdSetorCateg () {
            return $this-> id_setorcateg;
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

            $this->id_categ      = $linha["id_categ"];
            $this->id_setorcateg = $linha["id_setorcateg"];
            $this->nome_categ    = $linha["nome_categ"];
            $this->slug_categ    = $linha["slug_categ"];
            $this->ordem_categ   = $linha["ordem_categ"];
            $this->ativo_categ   = $linha["ativo_categ"];
        }

        public function comboBoxCateg($id) {
            $sql   = "SELECT * FROM categoria";
            $qry   = self::executarSQL($sql);

            while ($linha = self::listar($qry)) {
                if ($id==$linha["id_categ"]) {
                    $selecionado = "selected = 'selected'";
                } else {
                    $selecionado = "";
                }
                echo "<option value =$linha[id_categ] $selecionado>$linha[nome_categ]</option>\n";
            }
        }

        public function totalRegistrosCateg($sql){
            $qry   = self::executarSQL($sql);
            $total = self::contaDados($qry);
            return $total; 
        }

        public function verCategorias($sql, $i) {
            $qry = self::executarSQL($sql);
           
            // Mover o ponteiro para a linha desejada
            if (!mysqli_data_seek($qry, $i)) {
                return false; // Linha não encontrada
            }
            
            // Obter a linha como array associativo
            $row = mysqli_fetch_assoc($qry);
            
            if ($row) {
                $this->id_categ      = $row["id_categ"];
                $this->id_setorcateg = $row["id_setorcateg"];
                $this->nome_categ    = $row["nome_categ"];
                $this->slug_categ    = $row["slug_categ"];
                $this->ordem_categ   = $row["ordem_categ"];
                $this->ativo_categ   = $row["ativo_categ"];
                return true;
            }            
                return false;
        }

        public function verLinkCateg($valor) {
            $sql_verlink = "SELECT * FROM categoria WHERE id_categ = '$valor'";
            $qry_verlink = self::executarSQL($sql_verlink);
            $linha_verlink = self::listar($qry_verlink);

            $linkSet = $linha_verlink['nome_categ'];

            return $linkSet;
        }
    }

    class DadosMedida extends conexaoMySQL {
        private $id_medida, $nome_medida, $slug_medida, $ordem_medida, $ativo_medida;
        
        public function setIdMedida($id_medida) {
            $this-> id_medida = $id_medida;
        }
        public function getIdMedida() {
            return $this-> id_medida;
        }
        public function getNomeMedida() {
            return $this-> nome_medida;
        }
        public function getSlugMedida() {
            return $this-> slug_medida;
        }
        public function getOrdemMedida() {
            return $this-> ordem_medida;
        }
        public function getAtivoMedida() {
            return $this-> ativo_medida;
        }

        public function mostrarDadosMedida() {
            $sql   = "SELECT * FROM medida WHERE id_medida='$this->id_medida'";
            $qry   = self::executarSQL($sql);
            $linha = self::listar($qry);

            $this->id_medida    = $linha["id_medida"];
            $this->nome_medida  = $linha["nome_medida"];
            $this->slug_medida  = $linha["slug_medida"];
            $this->ordem_medida = $linha["ordem_medida"];
            $this->ativo_medida = $linha["ativo_medida"];
        }

        public function comboBoxMedida($id) {
            $sql   = "SELECT * FROM medida";
            $qry   = self::executarSQL($sql);

            while ($linha = self::listar($qry)) {
                if ($id==$linha["id_medida"]) {
                    $selecionado = "selected = 'selected'";
                } else {
                    $selecionado = "";
                }
                echo "<option value =$linha[id_medida] $selecionado>$linha[nome_medida]</option>\n";
            }
        }

        public function totalRegistrosMedida($sql){
            $qry   = self::executarSQL($sql);
            $total = self::contaDados($qry);
            return $total; 
        }

        public function verMedidas($sql, $i) {
            $qry = self::executarSQL($sql);
           
            // Mover o ponteiro para a linha desejada
            if (!mysqli_data_seek($qry, $i)) {
                return false; // Linha não encontrada
            }
            
            // Obter a linha como array associativo
            $row = mysqli_fetch_assoc($qry);
            
            if ($row) {
                $this->id_medida    = $row["id_medida"];
                $this->nome_medida  = $row["nome_medida"];
                $this->slug_medida  = $row["slug_medida"];
                $this->ordem_medida = $row["ordem_medida"];
                $this->ativo_medida = $row["ativo_medida"];
                return true;
            }            
                return false;
        }

        public function verLinkMedida($valor) {
            $sql_verlink = "SELECT * FROM medida WHERE id_medida = '$valor'";
            $qry_verlink = self::executarSQL($sql_verlink);
            $linha_verlink = self::listar($qry_verlink);

            $linkSet = $linha_verlink['slug_medida'];

            return $linkSet;
        }
    }

    class DadosBanner extends conexaoMySQL {
        private $id_banner, $nome_banner, $alt_banner, $url_banner, $imagem_banner, $ativo_banner;
        
        public function setIdBanner($id_banner) {
            $this-> id_banner = $id_banner;
        }
        public function getIdBanner() {
            return $this-> id_banner;
        }
        public function getNomeBanner() {
            return $this-> nome_banner;
        }
        public function getAltBanner() {
            return $this-> alt_banner;
        }
        public function getUrlBanner() {
            return $this-> url_banner;
        }
        public function getImagemBanner() {
            return $this-> imagem_banner;
        }
        public function getAtivoBanner() {
            return $this-> ativo_banner;
        }

        public function mostrarDadosBanner() {
            $sql   = "SELECT * FROM banner WHERE id_banner='$this->id_banner'";
            $qry   = self::executarSQL($sql);
            $linha = self::listar($qry);

            $this->id_banner     = $linha["id_banner"];
            $this->nome_banner   = $linha["nome_banner"];
            $this->alt_banner    = $linha["alt_banner"];
            $this->url_banner    = $linha["url_banner"];
            $this->imagem_banner = $linha["imagem_banner"];
            $this->ativo_banner  = $linha["ativo_banner"];
        }

        public function pegarProximoId() {
        $sql = "SELECT AUTO_INCREMENT 
                FROM information_schema.TABLES 
                WHERE TABLE_SCHEMA = DATABASE() 
                AND TABLE_NAME = 'banner'";
        $qry = self::executarSQL($sql);
        $linha = self::listar($qry);
        return $linha["AUTO_INCREMENT"]; // Retorna o próximo ID que será usado
        }
    }

    class DadosProduto extends conexaoMySQL {
        private $id_prod, $id_categprod, $id_setorprod, $nome_prod, $slug_prod, $descricao_prod, $id_medidaprod, $preco_prod, $promocao_prod, $imagemp_prod, $imagemg_prod, $ativo_prod;
        
        public function setIdProduto($id_prod) {
            $this-> id_prod = $id_prod;
        }
        public function getIdProduto() {
            return $this-> id_prod;
        }
        public function getIdCategProd() {
            return $this-> id_categprod;
        }
        public function getIdSetorProd() {
            return $this-> id_setorprod;
        }
        public function getNomeProd() {
            return $this-> nome_prod;
        }
        public function getSlugProd() {
            return $this-> slug_prod;
        }
        public function getDescricaoProd() {
            return $this-> descricao_prod;
        }
        public function getIdMedidaProd() {
            return $this-> id_medidaprod;
        }
        public function getPrecoProd() {
            return $this-> preco_prod;
        }
        public function getPromocaoProd() {
            return $this-> promocao_prod;
        }
        public function getImagemPProd() {
            return $this-> imagemp_prod;
        }
        public function getImagemGProd() {
            return $this-> imagemg_prod;
        }
        public function getAtivoProd() {
            return $this-> ativo_prod;
        }

        public function mostrarDadosProduto() {
            $sql   = "SELECT * FROM produto WHERE id_prod='$this->id_prod'";
            $qry   = self::executarSQL($sql);
            $linha = self::listar($qry);

            $this->id_prod         = $linha["id_prod"];
            $this->id_categprod    = $linha["id_categprod"];
            $this->id_setorprod    = $linha["id_setorprod"];
            $this->nome_prod       = $linha["nome_prod"];
            $this->slug_prod       = $linha["slug_prod"];
            $this->descricao_prod  = $linha["descricao_prod"];
            $this->id_medidaprod   = $linha["id_medidaprod"];
            $this->preco_prod      = $linha["preco_prod"];
            $this->promocao_prod   = $linha["promocao_prod"];
            $this->imagemp_prod    = $linha["imagemp_prod"];
            $this->imagemg_prod    = $linha["imagemg_prod"];
            $this->ativo_prod      = $linha["ativo_prod"];            
        }

        public function pegarProximoId() {
        $sql = "SELECT AUTO_INCREMENT 
                FROM information_schema.TABLES 
                WHERE TABLE_SCHEMA = DATABASE() 
                AND TABLE_NAME = 'produto'";
        $qry = self::executarSQL($sql);
        $linha = self::listar($qry);
        return $linha["AUTO_INCREMENT"]; // Retorna o próximo ID que será usado
        }

        public function totalRegistrosProd($sql){
            $qry   = self::executarSQL($sql);
            $total = self::contaDados($qry);
            return $total; 
        }

        public function verProdutos($sql, $i) {
            $qry = self::executarSQL($sql);
           
            // Mover o ponteiro para a linha desejada
            if (!mysqli_data_seek($qry, $i)) {
                return false; // Linha não encontrada
            }            
            // Obter a linha como array associativo
            $row = mysqli_fetch_assoc($qry);
            
            if ($row) {
                $this->id_prod         = $row["id_prod"];
                $this->id_categprod    = $row["id_categprod"];
                $this->id_setorprod    = $row["id_setorprod"];
                $this->nome_prod       = $row["nome_prod"];
                $this->slug_prod       = $row["slug_prod"];
                $this->descricao_prod  = $row["descricao_prod"];
                $this->id_medidaprod   = $row["id_medidaprod"];
                $this->preco_prod      = $row["preco_prod"];
                $this->promocao_prod   = $row["promocao_prod"];
                $this->imagemp_prod    = $row["imagemp_prod"];
                $this->imagemg_prod    = $row["imagemg_prod"];
                $this->ativo_prod      = $row["ativo_prod"];
                return true;
            }            
                return false;
        }

        public function verSugestoes($idCateg) {
            $sql_sugestao = "SELECT * FROM produto WHERE id_categprod = '$idCateg' AND ativo_prod='SIM'"; 
            $qry_sugestao = self::executarSQL($sql_sugestao);
            $produtoSugestao = array();            
            while ($linha = self::listar($qry_sugestao)) {
                $produtoSugestao[] = $linha; // Armazena todos os produtos encontrados
            }            
            // Embaralha o array para ordem aleatória
            shuffle($produtoSugestao);            
            return $produtoSugestao; // Retorna o array completo (já randomizado)
        }
        
        public function verSugestoesCarrinho () {
            $sql_sc = "SELECT * FROM produto WHERE ativo_prod='SIM'"; 
            $qry_sc = self::executarSQL($sql_sc);
            $produtoSC = array();
            
            while ($linhaSC = self::listar($qry_sc)) {
                $produtoSC[] = $linhaSC; // Armazena todos os produtos encontrados
            }            
            // Embaralha o array para ordem aleatória
            shuffle($produtoSC);            
            return $produtoSC; // Retorna o array completo (já randomizado)
        } 
    }

    class DadosCarrinho extends conexaoMySQL {

        private $id_carro, $id_pedidocarro, $id_prodcarro, $quantidade_carro, $valor_carro;

        private $id_prod, $id_categprod, $id_setorprod, $nome_prod, $slug_prod, $descricao_prod, $id_medidaprod, $preco_prod, $promocao_prod, $imagemp_prod, $imagemg_prod, $ativo_prod;

        public function getIdCarro() {
            return $this-> id_carro;
        }
        public function getIdPedidoCarro() {
            return $this-> id_pedidocarro;
        }
        public function getIdProdCarro () {
            return $this-> id_prodcarro;
        }
        public function getQtdeCarro () {
            return $this-> quantidade_carro;
        }        
        public function getValorCarro () {
            return $this-> valor_carro;
        }        
        public function setIdProduto($id_prod) {
            return $this-> id_prod = $id_prod;
        }
        public function getIdProduto() {
            return $this-> id_prod;
        }
        public function getIdCategProd() {
            return $this-> id_categprod;
        }
        public function getIdSetorProd() {
            return $this-> id_setorprod;
        }
        public function getNomeProd() {
            return $this-> nome_prod;
        }
        public function getSlugProd() {
            return $this-> slug_prod;
        }
        public function getDescricaoProd() {
            return $this-> descricao_prod;
        }
        public function getIdMedidaProd() {
            return $this-> id_medidaprod;
        }
        public function getPrecoProd() {
            return $this-> preco_prod;
        }
        public function getPromocaoProd() {
            return $this-> promocao_prod;
        }
        public function getImagemPProd() {
            return $this-> imagemp_prod;
        }
        public function getImagemGProd() {
            return $this-> imagemg_prod;
        }
        public function getAtivoProd() {
            return $this-> ativo_prod;
        }

        public function mostrarDadosCarrinho() {
            $sql   = "SELECT c.*, p.* FROM carrinho c, produto p WHERE c.id_prodcarro = p.id_prod AND c.id_pedidocarro = '$this->id_pedidocarro'";
            $qry   = self::executarSQL($sql);
            $linha = self::listar($qry);

            /* Tabela Produtos */
            $this->id_prod          = $linha["id_prod"];
            $this->id_categprod     = $linha["id_categprod"];
            $this->id_setorprod     = $linha["id_setorprod"];
            $this->nome_prod        = $linha["nome_prod"];
            $this->slug_prod        = $linha["slug_prod"];
            $this->descricao_prod   = $linha["descricao_prod"];
            $this->id_medidaprod    = $linha["id_medidaprod"];
            $this->preco_prod       = $linha["preco_prod"];
            $this->promocao_prod    = $linha["promocao_prod"];
            $this->imagemp_prod     = $linha["imagemp_prod"];
            $this->imagemg_prod     = $linha["imagemg_prod"];
            $this->ativo_prod       = $linha["ativo_prod"];  
            /* Tabela Pedidos*/  
            $this->id_carro         = $linha["id_carro"]; 
            $this->id_pedidocarro   = $linha["id_pedidocarro"]; 
            $this->id_prodcarro     = $linha["id_prodcarro"]; 
            $this->quantidade_carro = $linha["quantidade_carro"]; 
            $this->valor_carro      = $linha["valor_carro"];                       
        }

        public function pegarProximoId() {
        $sql = "SELECT AUTO_INCREMENT 
                FROM information_schema.TABLES 
                WHERE TABLE_SCHEMA = DATABASE() 
                AND TABLE_NAME = 'carrinho'";
        $qry = self::executarSQL($sql);
        $linha = self::listar($qry);
        return $linha["AUTO_INCREMENT"]; // Retorna o próximo ID que será usado
        }

        public function totalRegistrosCarro($sql){
            $qry   = self::executarSQL($sql);
            $total = self::contaDados($qry);
            return $total; 
        }

        public function verCarrinho($sql, $i) {
            $qry = self::executarSQL($sql);           

            if (!mysqli_data_seek($qry, $i)) {
                return false; // Linha não encontrada
            }            
            // Obter a linha como array associativo
            $row = mysqli_fetch_assoc($qry);
            
            if ($row) {
                /* Tabela Produtos */
                $this->id_prod         = $row["id_prod"];
                $this->id_categprod    = $row["id_categprod"];
                $this->id_setorprod    = $row["id_setorprod"];
                $this->nome_prod       = $row["nome_prod"];
                $this->slug_prod       = $row["slug_prod"];
                $this->descricao_prod  = $row["descricao_prod"];
                $this->id_medidaprod   = $row["id_medidaprod"];
                $this->preco_prod      = $row["preco_prod"];
                $this->promocao_prod   = $row["promocao_prod"];
                $this->imagemp_prod    = $row["imagemp_prod"];
                $this->imagemg_prod    = $row["imagemg_prod"];
                $this->ativo_prod      = $row["ativo_prod"];
                /*Tabela Carrinho-*/
                $this->id_carro        = $row["id_carro"];
                $this->id_pedidocarro  = $row["id_pedidocarro"];
                $this->id_prodcarro    = $row["id_prodcarro"];
                $this->quantidade_carro= $row["quantidade_carro"];
                $this->valor_carro     = $row["valor_carro"];
                return true;
            }            
                return false;
        }
    }

    class DadosCliente extends conexaoMySQL {
        private $id_cliente , $nome_cliente, $nascimento_cliente, $celular_cliente, $endereco_cliente, $bairro_cliente, $cidade_cliente, $uf_cliente, $cep_cliente, $email_cliente, $senha_cliente, $ativo_cliente;
        
        public function setIdCliente($id_cliente) {
            $this-> id_cliente = $id_cliente;
        }
        public function getIdCliente() {
            return $this-> id_cliente;
        }
        public function getNomeCliente() {
            return $this-> nome_cliente;
        }
        public function getNascCliente() {
            return $this-> nascimento_cliente;
        }
        public function getCelularCliente() {
            return $this-> celular_cliente;
        }
        public function getEnderecoCliente() {
            return $this-> endereco_cliente;
        }
        public function getBairroCliente() {
            return $this-> bairro_cliente;
        }
        public function getCidadeCliente() {
            return $this-> cidade_cliente;
        }
        public function getUFCliente() {
            return $this-> uf_cliente;
        }
        public function getCepCliente() {
            return $this-> cep_cliente;
        }
        public function getEmailCliente() {
            return $this-> email_cliente;
        }
        public function getSenhaCliente() {
            return $this-> senha_cliente;
        }
        public function getAtivoCliente() {
            return $this-> ativo_cliente;
        }

        public function mostrarDadosClientes() {
            $sql   = "SELECT * FROM cliente WHERE id_cliente = '$this->id_cliente'";
            $qry   = self::executarSQL($sql);
            $linha = self::listar($qry);

            @$this->id_cliente         = $linha["id_cliente"];
            @$this->nome_cliente       = $linha["nome_cliente"];
            @$this->nascimento_cliente = $linha["nascimento_cliente"];
            @$this->celular_cliente    = $linha["celular_cliente"];
            @$this->endereco_cliente   = $linha["endereco_cliente"];
            @$this->bairro_cliente     = $linha["bairro_cliente"];
            @$this->cidade_cliente     = $linha["cidade_cliente"];
            @$this->uf_cliente         = $linha["uf_cliente"];
            @$this->cep_cliente        = $linha["cep_cliente"];
            @$this->email_cliente      = $linha["email_cliente"];
            @$this->senha_cliente      = $linha["senha_cliente"];
            @$this->ativo_cliente      = $linha["ativo_cliente"];            
        }

        public function pegarProximoId() {
        $sql = "SELECT AUTO_INCREMENT 
                FROM information_schema.TABLES 
                WHERE TABLE_SCHEMA = DATABASE() 
                AND TABLE_NAME = 'cliente'";
        $qry = self::executarSQL($sql);
        $linha = self::listar($qry);
        return $linha["AUTO_INCREMENT"]; // Retorna o próximo ID que será usado
        }

        public function totalRegistrosClientes($sql){
            $qry   = self::executarSQL($sql);
            $total = self::contaDados($qry);
            return $total; 
        }

        public function verClientes($sql, $i) {
            $qry = self::executarSQL($sql);
           
            // Mover o ponteiro para a linha desejada
            if (!mysqli_data_seek($qry, $i)) {
                return false; // Linha não encontrada
            }            
            // Obter a linha como array associativo
            $row = mysqli_fetch_assoc($qry);
            
            if ($row) {
                $this->id_cliente         = $row["id_cliente"];
                $this->nome_cliente       = $row["nome_cliente"];
                $this->nascimento_cliente = $row["nascimento_cliente"];
                $this->celular_cliente    = $row["celular_cliente"];
                $this->endereco_cliente   = $row["endereco_cliente"];
                $this->bairro_cliente     = $row["bairro_cliente"];
                $this->cidade_cliente     = $row["cidade_cliente"];
                $this->uf_cliente         = $row["uf_cliente"];
                $this->cep_cliente        = $row["cep_cliente"];
                $this->email_cliente      = $row["email_cliente"];
                $this->senha_cliente      = $row["senha_cliente"];
                $this->ativo_cliente      = $row["ativo_cliente"];
                return true;
            }            
                return false;
        }
    }
?>