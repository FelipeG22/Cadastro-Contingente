<?php
include 'head.php';
require '..\conexao\config.php';
require '..\conexao\conexao.php';
require '..\conexao\database.php';
?>
<?php include 'header.php' ?>
<h3 class="h3 text-center bg-primary text-light">Cadastro Missão</h3>
<div class="row">
    <div class="col-1"></div>
    <form style="padding: 2%;" class="col-10 border border-secondary" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" autocomplete="on">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="t">Título</label>
                <input class="form-control" type="text" id="t" name="nome_missao" autofocus required maxlength="100" placeholder="Título">
            </div>
            <div class="form-group col-md-3">
                <label for="di">Data inicial</label>
                <input class="form-control" type="date" id="di" name="dataini_missao" required>
            </div>
            <div class="form-group col-md-3">
                <label for="df">Data expira</label>
                <input class="form-control" type="date" id="df" name="datafin_missao" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-12">
                <label for="cont">Missão</label>
                <textarea class="form-control" id="cont" aria-describedby="M" required name="conteudo_missao" placeholder="Missão" maxlength="500"></textarea>
                <small id="M" class="form-text text-muted">
                    Max. 500 caracteres!
                </small>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-12">
                <label for="obs">Observação</label>
                <textarea class="form-control" id="obs" aria-describedby="O" required name="obs_missao" placeholder="Observação" maxlength="300"></textarea>
                <small id="O" class="form-text text-muted">
                    Max. 300 caracteres!
                </small>
            </div>
        </div>
        <button type="submit" name="btcadmissao" class="btn btn-primary">Cadastrar</button>
        <button type="reset" class="btn btn-danger">Limpar</button>
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
</div>
<?php
include 'rodape.php';