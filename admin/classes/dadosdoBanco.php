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
?>