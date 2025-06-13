<?php

    function data () {
        $dia_da_semana = array ("Domingo", "Segunda", "Terça", "Quarta", "Quinta", "Sexta", "Sábado");
        $mes_extenso   = array ("Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro");
        
        $dia     = date ("d");
        $mes     = date ("m")-1;
        $ano     = date ("Y");
        $dia_sem = date ("w");
        
        // $data_final = $dia_da_semana[$dia_sem] . ", $dia de " . $mes_extenso[$mes] . " de $ano";
           $data_final = "$dia de " . $mes_extenso[$mes] . " de $ano";

        return $data_final; 
    }

    function databr ($data, $opt) {
        if ($opt == 1) {
            $dia    = substr($data, 0, 2);
            $mes    = substr($data, 3, 2);
            $ano    = substr($data, 6, 4);
            $databr = $ano . "/" . $mes . "/" . $dia; 
        } else {
            $dia    = substr($data, 6, 2);
            $mes    = substr($data, 5, 2);
            $ano    = substr($data, 0, 4);
            $databr = $dia . "/" . $mes . "/". $ano;
        }

        return $databr;
    }

    function anti_sql_injection($str) {
        // Se for nulo, retorna string vazia
        if ($str === null) {
            return '';
        }
        
        // Se for array, processa cada elemento recursivamente
        if (is_array($str)) {
            return array_map('anti_sql_injection', $str);
        }
        
        // Não escapar números
        if (is_numeric($str)) {
            return $str;
        }
        
        // Remove espaços extras
        $str = trim($str);
        
        // Substitui caracteres perigosos
        $str = str_replace(
            ["\\", "\x00", "\n", "\r", "'", '"', "\x1a", "%", "_"],
            ["\\\\", "\\x00", "\\n", "\\r", "\'", '\"', "\\x1a", "\%", "\_"],
            $str
        );
        
        return $str;
    }

    function upload_otimizado ($tmp, $nome, $pasta) {
    // Verifica se a pasta existe, se não, cria
    if (!file_exists($pasta)) {
        mkdir($pasta, 0755, true);
    }   
     
    // Monta o caminho completo do arquivo
    $caminho_completo = $pasta . '/' . $nome;
    
    // Move o arquivo temporário para o destino final
    if (move_uploaded_file($tmp, $caminho_completo)) {
        return $nome;
    } else {
        return false; // Retorna false em caso de falha
    }
}

   
?>