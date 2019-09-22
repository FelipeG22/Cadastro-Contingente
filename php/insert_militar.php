<?php
include 'head.php';
require '..\conexao\config.php';
require '..\conexao\conexao.php';
require '..\conexao\database.php';

$cargo  = DBRead('cargo', 'ORDER BY ant_cargo');
$funcao = DBRead('funcao', 'ORDER BY nome_funcao');
?>
    <?php include 'header.php' ?>
    <h3 class="h3 text-center bg-primary text-light">Cadastro Militar</h3>
    <div class="row">
        <div class="col-1"></div>
        <form style="padding: 2%;" class="col-10 border border-secondary" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" autocomplete="on">
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="idt">Idt. Militar</label>
                    <input class="form-control" type="text" id="idt" name="idt_militar" maxlength="11" required autofocus placeholder="Insira identidade militar">
                </div>
                <div class="form-group col-md-5">
                    <label for="nome">Nome Completo</label>
                    <input class="form-control" type="text" id="nome" name="nome_militar" maxlength="100" required placeholder="Insira Nome completo">
                </div>
                <div class="form-group col-md-4">
                    <label for="gue">Nome de Guerra</label>
                    <input class="form-control" type="text" id="gue" name="nomeg_militar" maxlength="30" required placeholder="Insira nome de Guerra">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="pai">Nome do Pai</label>
                    <input class="form-control" type="text" id="pai" name="pai_militar" maxlength="100" placeholder="Insira Nome do pai">
                </div>
                <div class="form-group col-md-6">
                    <label for="mae">Nome da Mãe</label>
                    <input class="form-control" type="text" id="mae" name="mae_militar" maxlength="100" placeholder="Insira Nome da mãe">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="posto">Posto / Graduação</label>
                    <select name="id_cargo" required aria-describedby="p" id="posto" class="form-control">
                        <?php foreach ($cargo as $c) { ?>
                        <option value="<?php echo $c['id_cargo']; ?>"><?php echo $c['nome_cargo']; ?></option>
                        <?php } ?>
                    </select>
                    <small id="p" class="form-text text-muted">
                        Escolha Posto ou Graduação!
                    </small>
                </div>
                <div class="form-group col-md-3">
                    <label for="posto">Função</label>
                    <select name="id_funcao" required aria-describedby="f" id="posto" class="form-control">
                        <?php foreach ($funcao as $f) { ?>
                        <option value="<?php echo $f['id_funcao']; ?>"><?php echo $f['nome_funcao']; ?></option>
                        <?php } ?>
                    </select>
                    <small id="f" class="form-text text-muted">
                        Função onde trabalhará na OM!
                    </small>
                </div>
                <div class="form-group col-md-3">
                    <label for="dtpra">Data de Praça</label>
                    <input class="form-control" type="date" id="dtpra" name="dtpraca_militar" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="dtpro">Data da Última Promoção</label>
                    <input class="form-control" type="date" aria-describedby="dtpro" id="dtpro" name="dtpromo_militar" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="dtnasc">Data de Nascimento</label>
                    <input class="form-control" type="date" id="dtnasc" name="dtnasc_militar" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="tel">Telefone</label>
                    <input class="form-control" type="text" id="tel" name="tel_militar" maxlength="11" placeholder="Insira telefone de contato">
                </div>
                <div class="form-group col-md-4">
                    <label for="eml">Email</label>
                    <input class="form-control" type="email" id="eml" name="email_militar" maxlength="100" placeholder="Insira email" >
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="idtc">Idt. Civíl</label>
                    <input class="form-control" type="text" id="idtc" name="idtcivil_militar" maxlength="10" placeholder="Insira identidade cívil">
                </div>
                <div class="form-group col-md-2">
                    <label for="ts">Tipo Sanguíneo</label>                    
                    <select name="ts_militar" id="ts" class="form-control">
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="AB">AB</option>
                        <option value="O">O</option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="frh">Fator RH</label>
                    <select name="frh_militar" id="frh" class="form-control">
                        <option value="Positivo">Positivo</option>
                        <option value="Negativo">Negativo</option>
                    </select>
                </div>
                <div class="form-group col-md-5">
                    <label for="sp">Sinais particulares</label>
                    <input class="form-control" type="text" id="sp" name="sinp_militar" maxlength="100" placeholder="Insira sinais particulares">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="ct">Cútis</label>
                    <input class="form-control" type="text" id="ct" name="cutis_militar" maxlength="20" placeholder="Insira cútis">
                </div>
                <div class="form-group col-md-3">
                    <label for="ol">Olhos</label>
                    <input class="form-control" type="text" id="ol" name="olhos_militar" maxlength="20" placeholder="Insira cor dos olhos">
                </div>
                <div class="form-group col-md-3">
                    <label for="cb">Cabelo</label>
                    <input class="form-control" type="text" id="cb" name="cabelos_militar" maxlength="20" placeholder="Insira cor do cabelo">
                </div>
                <div class="form-group col-md-3">
                    <label for="al">Altura</label>
                    <input class="form-control" type="text" id="al" name="altura_militar" maxlength="4" placeholder="Insira altura">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-12" >
                    <label for="ende">Endereço</label>
                    <textarea class="form-control" id="ende" name="endereco_militar" placeholder="Insira endereço" maxlength="500"></textarea>
                </div>
            </div>
            <button type="submit" name="btcadmilitar" class="btn btn-primary">Cadastrar</button>
            <button type="reset" class="btn btn-danger">Limpar</button>
        </form>
        <div class="col-1"></div>
    </div>
    <div class="row">
        <div class="col-3"><a href="list_militar.php"><img src="../_assets/_img/table_go.png" />lista de Militares</a></div>
        <div class="col-9"></div>
    </div>
</div>
<?php
include 'rodape.php';