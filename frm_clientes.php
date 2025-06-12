<?php 

    @$idCliente  = $_SESSION['cliente_horti']['IDCLIENTE'];

    $cliente->setIdCliente($idCliente);
    $cliente->mostrarDadosClientes();

    $txt_idCliente      = $cliente->getIdCliente();
    $txt_emailCliente   = $cliente->getEmailCliente();
    $txt_senhaCliente   = $cliente->getSenhaCliente();
    $txt_nomeCliente    = $cliente->getNomeCliente();
    $txt_nascCliente    = $cliente->getNascCliente();
    $txt_celularCliente = $cliente->getCelularCliente();
    $txt_cepCliente     = $cliente->getCepCliente();
    $txt_enderecoCliente= $cliente->getEnderecoCliente();
    $txt_bairroCliente  = $cliente->getBairroCliente();
    $txt_cidadeCliente  = $cliente->getCidadeCliente();
    $txt_ufCliente      = $cliente->getUFCliente();
    $txt_ativoCliente   = $cliente->getAtivoCliente();  

?> 


<div id="formulario">
    <form action="admin/op/op_clientes.php" method="post" name="formClientes" id="formClientes" onsubmit="">
        <fieldset>
            <legend>Dados para Acesso</legend>
            <label class="umaLinha">
                <span class="titulo">Email (Login)</span>
                <input type="text" name="txt_email" id="txt_email" value="<?= $txt_emailCliente; ?>"  placeholder="Insira seu e-mail principal">
            </label>
            <div class="duasLinhas">
                <label>
                    <span class="titulo">Senha</span>
                    <input type="password" name="txt_senha" id="txt_senha" value="<?= $txt_senhaCliente; ?>">
                </label>
                <label>
                    <span class="titulo">Confirmar Senha</span>
                    <input type="password" name="txt_senha2" id="txt_senha2" value="<?= $txt_senhaCliente ?>">
                </label>
            </div>
        </fieldset>
        <fieldset>
            <legend>Dados Pessoais</legend>
            <label>
                <span class="titulo">Nome</span>
                <input type="text" name="txt_nome" id="txt_nome" value="<?= $txt_nomeCliente; ?>" class="unicaLinha">
            </label>
            <div class="treslinhas1">
                <label>
                    <span class="titulo">Data de Nascimento</span>
                    <input type="text" name="txt_nascimento" id="txt_nascimento" value="<?= $txt_nascCliente; ?>">
                </label>
                <label>
                    <span class="titulo">Celular (Whatsapp)</span>
                    <input type="text" name="txt_celular" id="txt_celular" value="<?= $txt_celularCliente; ?>">
                </label>
                <label>
                    <span class="titulo">CEP</span>
                    <input type="text" name="txt_cep" id="txt_cep" value="<?= $txt_cepCliente; ?>">
                </label>
            </div>
            <label>
                <span class="titulo">Endereço</span>
                <input type="text" name="txt_endereco" id="txt_endereco" value="<?= $txt_enderecoCliente; ?>" class="unicaLinha">
            </label>
            <div class="tresLinhas">
                <label>
                    <span class="titulo">Bairro</span>
                    <input type="text" name="txt_bairro" id="txt_bairro" value="<?= $txt_bairroCliente; ?>">
                </label>
                <label>
                    <span class="titulo">Cidade</span>
                    <input type="text" name="txt_cidade" id="txt_cidade" value="<?= $txt_cidadeCliente; ?>">
                </label>
                <label>
                    <span class="titulo">UF</span>
                    <select name="txt_uf" id="txt_uf">
                        <option value="AC" <?php if ($txt_ufCliente == "AC") echo "selected"; ?>>AC</option>
                        <option value="AL" <?php if ($txt_ufCliente == "AL") echo "selected"; ?>>AL</option>
                        <option value="AP" <?php if ($txt_ufCliente == "AP") echo "selected"; ?>>AP</option>
                        <option value="AM" <?php if ($txt_ufCliente == "AM") echo "selected"; ?>>AM</option>
                        <option value="BA" <?php if ($txt_ufCliente == "BA") echo "selected"; ?>>BA</option>
                        <option value="CE" <?php if ($txt_ufCliente == "CE") echo "selected"; ?>>CE</option>             
                        <option value="ES" <?php if ($txt_ufCliente == "ES") echo "selected"; ?>>ES</option>
                        <option value="DF" <?php if ($txt_ufCliente == "DF") echo "selected"; ?>>DF</option>
                        <option value="GO" <?php if ($txt_ufCliente == "GO") echo "selected"; ?>>GO</option>
                        <option value="MA" <?php if ($txt_ufCliente == "MA") echo "selected"; ?>>MA</option>
                        <option value="MT" <?php if ($txt_ufCliente == "MT") echo "selected"; ?>>MT</option>
                        <option value="MS" <?php if ($txt_ufCliente == "MS") echo "selected"; ?>>MS</option>
                        <option value="MG" <?php if ($txt_ufCliente == "MG") echo "selected"; ?>>MG</option>
                        <option value="PA" <?php if ($txt_ufCliente == "PA") echo "selected"; ?>>PA</option>
                        <option value="PB" <?php if ($txt_ufCliente == "PB") echo "selected"; ?>>PB</option>
                        <option value="PR" <?php if ($txt_ufCliente == "PR") echo "selected"; ?>>PR</option>
                        <option value="PE" <?php if ($txt_ufCliente == "PE") echo "selected"; ?>>PE</option>
                        <option value="PI" <?php if ($txt_ufCliente == "PI") echo "selected"; ?>>PI</option>
                        <option value="RJ" <?php if ($txt_ufCliente == "RJ") echo "selected"; ?>>RJ</option>
                        <option value="RN" <?php if ($txt_ufCliente == "RN") echo "selected"; ?>>RN</option>
                        <option value="RS" <?php if ($txt_ufCliente == "RS") echo "selected"; ?>>RS</option>
                        <option value="RO" <?php if ($txt_ufCliente == "RO") echo "selected"; ?>>RO</option>
                        <option value="RR" <?php if ($txt_ufCliente == "RR") echo "selected"; ?>>RR</option>
                        <option value="SC" <?php if ($txt_ufCliente == "SC") echo "selected"; ?>>SC</option>
                        <option value="SP" <?php if ($txt_ufCliente == "SP") echo "selected"; ?>>SP</option>
                        <option value="SE" <?php if ($txt_ufCliente == "SE") echo "selected"; ?>>SE</option>
                        <option value="TO" <?php if ($txt_ufCliente == "TO") echo "selected"; ?>>TO</option>
                    </select>
                </label>
            </div>
            <input type="hidden" name="idCliente" value="<?= $txt_idCliente; ?>">
            <input type="hidden" name="acaoCliente" value="<?php if ($txt_nomeCliente == "") { echo "Inserir"; } else { echo "Alterar"; } ?>">
            <input type="hidden" name="irPara" value="">
            <input type="submit" name="logar" id="logar" value="<?php if ($txt_nomeCliente == "") { echo "Cadastrar"; } else { echo "Alterar"; } ?>" class="botao">
        </fieldset>
    </form>
</div>