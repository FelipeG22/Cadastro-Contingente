<?php
include 'head.php';
require '..\conexao\config.php';
require '..\conexao\conexao.php';
require '..\conexao\database.php';

if (isset($_POST['btaltmilitar'])) {
    $a = $_POST['id_militar'];
    $altdados = array(
        'idt_militar'      => addslashes($_POST['idt_militar']),
        'nome_militar'     => addslashes($_POST['nome_militar']),
        'nomeg_militar'    => addslashes($_POST['nomeg_militar']),
        'dtnasc_militar'   => addslashes($_POST['dtnasc_militar']),
        'id_cargo'         => addslashes($_POST['id_cargo']),
        'dtpraca_militar'  => addslashes($_POST['dtpraca_militar']),
        'dtpromo_militar'  => addslashes($_POST['dtpromo_militar']),
        'id_funcao'        => addslashes($_POST['id_funcao']),
        'tel_militar'      => addslashes($_POST['tel_militar']),
        'email_militar'    => addslashes($_POST['email_militar']),
        'endereco_militar' => addslashes($_POST['endereco_militar']),
        'status_militar'   => addslashes($_POST['status_militar'])
    );
    
    $deubomalt = DBUpdate('militar', $altdados, "WHERE id_militar = '{$a}'");

    if ($deubomalt) {
        header("Location:list_militar.php");
    } else {
        echo "<script>alert('Erro ao alterar os dados!');</script>";
    }
}

if (!($_GET['m'])) {
    header("Location:list_militar.php");
} else {
    $a = $_GET['m'];
    $cargo = DBRead('cargo', 'ORDER BY ant_cargo');
    $funcao = DBRead('funcao', 'ORDER BY nome_funcao');
    $alt_militar = DBRead('militar', "INNER JOIN cw_cargo ON cw_militar.id_cargo = cw_cargo.id_cargo INNER JOIN cw_funcao ON cw_militar.id_funcao = cw_funcao.id_funcao WHERE id_militar = '{$a}'");
    
    }

?>
    <?php include 'header.php' ?>
    <h3 class="h3 text-center bg-primary text-light">Dados Militares</h3>
    <?php foreach ($alt_militar as $altm) { ?>
    <div class="row">
        <div class="col-1"></div>
        <form style="padding: 2%;" class="col-10 border border-secondary" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" autocomplete="on">
            <div class="form-row">
                    <input class="form-control" type="hidden" id="idt" name="id_militar" maxlength="11" readonly value="<?php echo $altm['id_militar'] ?>">
                <div class="form-group col-md-2">
                    <label for="idt">Idt. Militar</label>
                    <input class="form-control" type="text" id="idt" name="idt_militar" maxlength="11" required autofocus value="<?php echo $altm['idt_militar'] ?>">
                </div>
                <div class="form-group col-md-5">
                    <label for="nome">Nome Completo</label>
                    <input class="form-control" type="text" id="nome" name="nome_militar" maxlength="100" required value="<?php echo $altm['nome_militar'] ?>">
                </div>
                <div class="form-group col-md-5">
                    <label for="gue">Nome de Guerra</label>
                    <input class="form-control" type="text" id="gue" name="nomeg_militar" maxlength="30" required value="<?php echo $altm['nomeg_militar'] ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="pai">Nome do Pai</label>
                    <input class="form-control" type="text" id="pai" name="pai_militar" maxlength="100" value="<?php echo $altm['pai_militar'] ?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="mae">Nome da Mãe</label>
                    <input class="form-control" type="text" id="mae" name="mae_militar" maxlength="100" value="<?php echo $altm['mae_militar'] ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="posto">Posto / Graduação</label>
                    <select name="id_cargo" required aria-describedby="p" id="posto" class="form-control">
                        <option value="<?php echo $altm['id_cargo']?>"><?php echo $altm['nome_cargo']?></option>
                        <?php foreach ($cargo as $c) { ?>
                        <option value="<?php echo $c['id_cargo'] ?>"><?php echo $c['nome_cargo'] ?></option>
                        <?php } ?>
                    </select>
                    <small id="p" class="form-text text-muted">
                        Escolha Posto ou Graduação!
                    </small>
                </div>
                <div class="form-group col-md-3">
                    <label for="posto">Função</label>
                    <select name="id_funcao" required aria-describedby="f" id="posto" class="form-control">
                        <option value="<?php echo $altm['id_funcao'] ?>"><?php echo $altm['nome_funcao'] ?></option>
                        <?php foreach ($funcao as $f) { ?>
                            <option value="<?php echo $f['id_funcao']; ?>"><?php echo $f['nome_funcao'] ?></option>
                        <?php } ?>
                    </select>
                    <small id="f" class="form-text text-muted">
                        Função onde trabalhará na OM!
                    </small>
                </div>
                <div class="form-group col-md-3">
                    <label for="dtpra">Data de Praça</label>
                    <input class="form-control" type="date" id="dtpra" name="dtpraca_militar" required value="<?php echo $altm['dtpraca_militar'] ?>">
                </div>
                <div class="form-group col-md-3">
                    <label for="dtpro">Data da Última Promoção</label>
                    <input class="form-control" type="date" aria-describedby="dtpro" id="dtpro" name="dtpromo_militar" required value="<?php echo $altm['dtpromo_militar'] ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="dtnasc">Data de Nascimento</label>
                    <input class="form-control" type="date" id="dtnasc" name="dtnasc_militar" required value="<?php echo $altm['dtnasc_militar'] ?>">
                </div>
                <div class="form-group col-md-3">
                    <label for="tel">Telefone</label>
                    <input class="form-control" type="text" id="tel" name="tel_militar" maxlength="11" value="<?php echo $altm['tel_militar'] ?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="eml">Email</label>
                    <input class="form-control" type="email" id="eml" name="email_militar" maxlength="100" value="<?php echo $altm['email_militar'] ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="idtc">Idt. Civíl</label>
                    <input class="form-control" type="text" id="idtc" name="idtcivil_militar" maxlength="10" value="<?php echo $altm['idtcivil_militar'] ?>">
                </div>
                <div class="form-group col-md-2">
                    <label for="ts">Tipo Sanguíneo</label>
                    <select name="ts_militar" id="ts" class="form-control">                        
                        <option value="<?php echo $altm['ts_militar'] ?>" ><?php echo $altm['ts_militar'] ?></option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="AB">AB</option>
                        <option value="O">O</option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="frh">Fator RH</label>
                    <select name="frh_militar" id="frh" class="form-control">
                        <option value="<?php echo $altm['frh_militar'] ?>" ><?php echo $altm['frh_militar'] ?></option>
                        <option value="positivo">Positivo</option>
                        <option value="negativo">Negativo</option>
                    </select>
                </div>
                <div class="form-group col-md-5">
                    <label for="sp">Sinais particulares</label>
                    <input class="form-control" type="text" id="sp" name="sinp_militar" maxlength="100" value="<?php echo $altm['sinp_militar']?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="ct">Cútis</label>
                    <input class="form-control" type="text" id="ct" name="cutis_militar" maxlength="20" value="<?php echo $altm['cutis_militar']?>" >
                </div>
                <div class="form-group col-md-3">
                    <label for="ol">Olhos</label>
                    <input class="form-control" type="text" id="ol" name="olhos_militar" maxlength="20" value="<?php echo $altm['olhos_militar']?>">
                </div>
                <div class="form-group col-md-3">
                    <label for="cb">Cabelo</label>
                    <input class="form-control" type="text" id="cb" name="cabelos_militar" maxlength="20" value="<?php echo $altm['cabelos_militar']?>" >
                </div>
                <div class="form-group col-md-3">
                    <label for="al">Altura</label>
                    <input class="form-control" type="text" id="al" name="altura_militar" maxlength="4" value="<?php echo $altm['altura_militar'] ?>" >
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="st">Status</label>
                    <select name="status_militar" required aria-describedby="f" id="st" class="form-control">
                        <option value="<?php echo $altm['status_militar'] ?>"><?php echo $altm['status_militar'] ?></option>
                        <option value="Ativo">Ativo</option>
                        <option value="Inativo">Inativo</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-12">
                    <label for="ende">Endereço</label>
                    <textarea class="form-control" id="ende" name="endereco_militar" placeholder="Insira endereço" maxlength="500"><?php echo $altm['endereco_militar'] ?></textarea>
                </div>
            </div>
            <button type="submit" name="btaltmilitar" class="btn btn-primary">Alterar</button>
        </form>
        <div class="col-1"></div>
    </div>
    <div class="row">
        <div class="col-3"><a href="list_militar.php"><img src="../_assets/_img/table_go.png" /> lista de Militares</a></div>
        <div class="col-9"></div>
    </div>
    <?php } ?>
</div>
<?php
include 'rodape.php';