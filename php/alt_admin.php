<?php
include 'head.php';
require '..\conexao\config.php';
require '..\conexao\conexao.php';
require '..\conexao\database.php';

if (isset($_POST['btalt'])) {
    $a = $_POST['id_admin'];
    $altdados = array(
        'nome_admin'    => addslashes($_POST['nome_admin']),
        'nguerra_admin' => addslashes($_POST['nguerra_admin']),
        'login_admin'   => addslashes($_POST['login_admin']),
        'senha_admin'   => addslashes($_POST['senha_admin']),
        'id_cargo'      => addslashes($_POST['id_cargo']),
        'status_admin'  => addslashes($_POST['status_admin'])
    );

    $deubomalt = DBUpdate('admin', $altdados, "WHERE id_admin = '{$a}'");

    if ($deubomalt) {
        header("Location:list_admin.php");
    } else {
        echo "<script>alert('Erro ao alterar os dados!');</script>";
    }
}

if (!($_GET['a'])) {
    header("Location:list_admin.php");
} else {
    $a = $_GET['a'];
    $ad = $_SESSION['id'];
    if ($a == $ad  || $a == 6) {
        header("Location:list_admin.php");
    } else {
        $cargo = DBRead('cargo');
        $alt_admin = DBRead('admin', "INNER JOIN cw_cargo ON cw_admin.id_cargo = cw_cargo.id_cargo WHERE id_admin = '{$a}'");
    }
}
?>
    <?php include 'header.php' ?>
    <h3 class="h3 text-center bg-primary text-light">Alterando dados Administradores</h3>
    <?php foreach ($alt_admin as $alt) { ?>
        <div class="row">
            <div class="col-1" ></div>
            <form style="padding: 2%;" class="col-10 border border-secondary" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" autocomplete="off">
                <div class="form-row">
                    <div class="form-group col-md-1">
                        <label for="nome">Nº</label>
                        <input class="form-control" type="text" id="nome" name="id_admin" maxlength="100" readonly value="<?php echo $alt['id_admin'] ?>" >
                    </div>
                    <div class="form-group col-md-6">
                        <label for="nome">Nome Completo</label>
                        <input class="form-control" type="text" id="nome" name="nome_admin" maxlength="100" required autofocus value="<?php echo $alt['nome_admin'] ?>" >
                    </div>
                    <div class="form-group col-md-5">
                        <label for="gue">Nome de Guerra</label>
                        <input class="form-control" type="text" id="gue" name="nguerra_admin" maxlength="30" required value="<?php echo $alt['nguerra_admin'] ?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="posto">Posto / Graduação</label>
                        <select name="id_cargo" required aria-describedby="p" id="posto" class="form-control">
                            <option selected value="<?php echo $alt['id_cargo'] ?>"><?php echo $alt['nome_cargo'] ?></option>
                            <?php foreach ($cargo as $c) { ?>
                                <option value="<?php echo $c['id_cargo']; ?>"><?php echo $c['nome_cargo']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="st">Status</label>
                        <select name="status_admin" id="st" class="form-control">
                            <option value="<?php echo $alt['status_admin'] ?>"><?php echo $alt['status_admin'] ?></option>
                            <option value="Ativo">Ativo</option>
                            <option value="Inativo">Inativo</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="log">Usuário</label>
                        <input class="form-control" type="text" aria-describedby="usu" id="log" name="login_admin" minlength="10" maxlength="20" required value="<?php echo $alt['login_admin'] ?>">
                        <small id="usu" class="form-text text-muted">
                            Usuário para se Logar no sistema!
                        </small>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="gue">Senha</label>
                        <input class="form-control" type="password" aria-describedby="s" id="sen" name="senha_admin" maxlength="10" required value="<?php echo $alt['senha_admin'] ?>">
                        <small id="s" class="form-text text-muted">
                            Senha para acessar o sistema!
                        </small>
                    </div>            
                </div>
                <button type="submit" name="btalt" class="btn btn-primary">Alterar</button>
            </form>
            <div class="col-1" ></div>
        </div>
        <div class="row">
            <div class="col-3"><a href="list_admin.php"><img src="../_assets/_img/table_go.png"/> lista dos administradores</a></div>
            <div class="col-9"></div>
        </div>
    <?php } ?>
</div>
<?php
include 'rodape.php';