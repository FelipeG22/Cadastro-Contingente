<?php
include 'head.php';
require '..\conexao\config.php';
require '..\conexao\conexao.php';
require '..\conexao\database.php';


if(isset($_GET['arm'])){
    $c = $_GET['arm'];
    $dados = array(
        'status_missao' => addslashes(1)
    );

    $deubom = DBUpdate('missao', $dados, "WHERE id_missao = '$c'");

    if($deubom && $_GET['arm']){
        header("Location:list_missao.php");
    }else{
        unset($id);
        unset($guerra);
        unset($posto);
        header("Location:sair.php");
    }
}else if(isset($_GET['dm'])){
    $c = $_GET['dm'];

    $del_missao = DBDelete("missao", "WHERE id_missao = '{$c}'");
    if ($del_missao) {
        header("Location:list_missao.php");
    } else {
        unset($id);
        unset($guerra);
        unset($posto);
        header("Location:sair.php");
    }
}else if (!($_GET['vism'])) {
    header("Location:list_missao.php");
} else if (isset($_GET['vism'])){
    $a = $_GET['vism'];
    $missao = DBRead('missao', "WHERE id_missao = '{$a}'");
}

include 'header.php';

?>
<h3 class="h3 text-center bg-primary text-light">Visualizar Missão</h3>
<?php foreach ($missao as $m) { ?>
<div class="row">
    <div class="col-1"></div>
    <form style="padding: 2%;" class="col-10 border border-secondary" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" autocomplete="on">
        <div class="form-row">
            <div class="form-group col-md-1">
                    <label for="n">Nº</label>
                    <input class="form-control" type="text" id="n" name="id_missao" readonly value="<?php echo $m['id_missao'] ?>">
                </div>
            <div class="form-group col-md-5">
                <label for="t">Título</label>
                <input class="form-control" type="text" id="t" name="nome_missao" autofocus required maxlength="100" value="<?php echo $m['nome_missao'] ?>">
            </div>
            <div class="form-group col-md-3">
                <label for="di">Data início</label>
                <input class="form-control" type="date" id="di" name="dataini_missao" value="<?php echo $m['dataini_missao'] ?>" required>
            </div>
            <div class="form-group col-md-3">
                <label for="df">Data expira</label>
                <input class="form-control" type="date" id="df" name="datafin_missao" value="<?php echo $m['datafin_missao'] ?>" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-12">
                <label for="cont">Missão</label>
                <textarea class="form-control" id="cont" aria-describedby="M" required name="conteudo_missao" maxlength="500"><?php echo $m['conteudo_missao'] ?></textarea>
                <small id="M" class="form-text text-muted">
                    Max. 500 caracteres!
                </small>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-12">
                <label for="obs">Observação</label>
                <textarea class="form-control" id="obs" aria-describedby="O" required name="obs_missao" maxlength="300"><?php echo $m['obs_missao'] ?></textarea>
                <small id="O" class="form-text text-muted">
                    Max. 300 caracteres!
                </small>
            </div>
        </div>
        <button type="submit" name="btaltmissao" class="btn btn-primary">Alterar</button>
    </form>
    <div class="col-1"></div>
</div>
<div class="row">
    <div class="col-3"><a href="list_missao.php"><img src="../_assets/_img/table_go.png" /> lista Missões</a></div>
    <div class="col-9"></div>
</div>
<div class="row">
        <div class="col-3"><a href="list_missao_arquivada.php"><img src="../_assets/_img/table_go.png"/> lista Missões Cumpridas</a></div>
        <div class="col-9"></div>
    </div>
<?php } ?>
</div>
<?php
include 'rodape.php';