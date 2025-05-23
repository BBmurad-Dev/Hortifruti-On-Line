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
        public function getDescricao_prod() {
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
    }
?>