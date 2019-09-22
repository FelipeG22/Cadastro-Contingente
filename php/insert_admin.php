<?php
include 'head.php';
require '..\conexao\config.php';
require '..\conexao\conexao.php';
require '..\conexao\database.php';

$cargo = DBRead('cargo', 'ORDER BY ant_cargo');
?>
    <?php include 'header.php' ?>
    <h3 class="h3 text-center bg-primary text-light">Cadastro Administradores</h3>
    <div class="row">
        <div class="col-1" ></div>
        <form style="padding: 2%;" class="col-10 border border-secondary" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" autocomplete="off">
            <div class="form-row">
                <div class="form-group col-md-7">
                    <label for="nome">Nome Completo</label>
                    <input class="form-control" type="text" id="nome" name="nome_admin" maxlength="100" required autofocus placeholder="Insira Nome completo">
                </div>
                <div class="form-group col-md-5">
                    <label for="gue">Nome de Guerra</label>
                    <input class="form-control" type="text" id="gue" name="nguerra_admin" maxlength="30" required placeholder="Insira nome de Guerra">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="posto">Posto / Graduação / Cargo</label>
                    <select name="id_cargo" required aria-describedby="p" id="posto" class="form-control">
                        <?php foreach ($cargo as $c) { ?>
                            <option value="<?php echo $c['id_cargo']; ?>"><?php echo $c['nome_cargo']; ?></option>
                        <?php } ?>
                    </select>
                    <small id="p" class="form-text text-muted">
                        Obrigatório escolher Posto ou Graduação!
                    </small>
                </div>
                <div class="form-group col-md-4">
                    <label for="log">Usuário</label>
                    <input class="form-control" type="text" aria-describedby="usu" id="log" name="login_admin" minlength="10" maxlength="20" required placeholder="Insira Usuário">
                    <small id="usu" class="form-text text-muted">
                        Min 10 caractere!
                    </small>
                </div>
                <div class="form-group col-md-4">
                    <label for="gue">Senha</label>
                    <input class="form-control" type="password" aria-describedby="s" id="sen" name="senha_admin" minlength="8" maxlength="10" required placeholder="Insira Senha">
                    <small id="s" class="form-text text-muted">
                        Min 8 caractere!
                    </small>
                </div>            
            </div>
            <button type="submit" name="btcadastrar" class="btn btn-primary">Cadastrar</button>
            <button type="reset" class="btn btn-danger">Limpar</button>
        </form>
        <div class="col-1" ></div>
    </div>
    <div class="row">
        <div class="col-3"><a href="list_admin.php"><img src="../_assets/_img/table_go.png"/> lista dos administradores</a></div>
        <div class="col-9"></div>
    </div>
</div>
<?php
include 'rodape.php';
