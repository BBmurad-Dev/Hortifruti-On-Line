<div id="formulario">
    <form action="" method="post" name="" id="" onsubmit="">
        <fieldset>
            <legend>Dados para Acesso</legend>
            <label class="umaLinha">
                <span class="titulo">Email (Login)</span>
                <input type="text" name="txt_email" id="txt_email" value=""  placeholder="Insira seu e-mail principal">
            </label>
            <div class="duasLinhas">
                <label>
                    <span class="titulo">Senha</span>
                    <input type="password" name="txt_senha" id="txt_senha" value="">
                </label>
                <label>
                    <span class="titulo">Confirmar Senha</span>
                    <input type="password" name="txt_senha2" id="txt_senha2" value="">
                </label>
            </div>
        </fieldset>
        <fieldset>
            <legend>Dados Pessoais</legend>
            <label>
                <span class="titulo">Nome</span>
                <input type="text" name="txt_nome" id="txt_nome" value="" class="unicaLinha">
            </label>
            <div class="duasLinhas">
                <label>
                    <span class="titulo">Data de Nascimento</span>
                    <input type="text" name="txt_nascimento" id="txt_nascimento" value="">
                    </label>
                    <label>
                    <span class="titulo">Celular (Whatsapp)</span>
                    <input type="text" name="txt_celular" id="txt_celular" value="">
                </label>
            </div>
            <label>
                <span class="titulo">Endereço</span>
                <input type="text" name="txt_endereco" id="txt_endereco" value="" class="unicaLinha">
            </label>
            <div class="tresLinhas">
                <label>
                    <span class="titulo">Bairro</span>
                    <input type="text" name="txt_bairro" id="txt_bairro" value="">
                </label>
                <label>
                    <span class="titulo">Cidade</span>
                    <input type="text" name="txt_cidade" id="txt_cidade" value="">
                </label>
                <label>
                    <span class="titulo">UF</span>
                    <select name="txt_uf" id="txt_uf">
                        <option value="AC">AC</option>
                        <option value="AL">AL</option>
                        <option value="AP">AP</option>
                        <option value="AM">AM</option>
                        <option value="BA">BA</option>
                        <option value="CE">CE</option>
                        <option value="ES">ES</option>
                        <option value="DF">DF</option>
                        <option value="GO">GO</option>
                        <option value="MA">MA</option>
                        <option value="MT">MT</option>
                        <option value="MS">MS</option>
                        <option value="MG">MG</option>
                        <option value="PA">PA</option>
                        <option value="PB">PB</option>
                        <option value="PR">PR</option>
                        <option value="PE">PE</option>
                        <option value="PI">PI</option>
                        <option value="RJ">RJ</option>
                        <option value="RN">RN</option>
                        <option value="RS">RS</option>
                        <option value="RO">RO</option>
                        <option value="RR">RR</option>
                        <option value="SC">SC</option>
                        <option value="SP">SP</option>
                        <option value="SE">SE</option>
                        <option value="TO">TO</option>
                    </select>
                </label>
            </div>
            <input type="hidden" name="idCliente" value="">
            <input type="hidden" name="acaoCliente" value="">
            <input type="hidden" name="irPara" value="">
            <input type="submit" name="logar" id="logar" value="Cadastrar" class="botao">
        </fieldset>
    </form>
</div>