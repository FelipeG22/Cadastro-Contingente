<?php
include 'head.php';
require '..\conexao\config.php';
require '..\conexao\conexao.php';
require '..\conexao\database.php';

if (isset($_POST['altf'])) {
    $a = $_POST['id_funcao'];
    $dados = array(
        'nome_funcao' => addslashes($_POST['nome_funcao']),
        'abr_funcao'  => addslashes($_POST['abr_funcao'])
    );

    $deubom = DBUpdate('funcao', $dados, "WHERE id_funcao = '$a'");

    if ($deubom) {
        echo "<script>alert('Alterado com sucesso!');</script>";
    } else {
        echo "<script>alert('Erro!');</script>";
    }
}

if (!($_GET['f'])) {
    header("Location:list_funcao.php");
} else {
    $a = $_GET['f'];
    $funcao = DBRead('funcao', "WHERE id_funcao = '$a'");
}
?>
    <?php include 'header.php' ?>
    <h3 class="h3 text-center bg-primary text-light">Alterando dados Funções</h3>
    <?php foreach ($funcao as $f) { ?>
    <div class="row">
        <div class="col"></div>
        <form style="padding: 2%;" class="col-10 border border-secondary" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" autocomplete="off" >
            <div class="row">
                <div class="form-group col-1" >
                    <label id="ID" >Nº</label>
                    <input class="form-control" type="text" id="ID" name="id_funcao" readonly value="<?php echo $f['id_funcao'] ?>"><br>
                </div>
                <div class="form-group col-6" >
                    <label id="posto" >Função</label>
                    <input class="form-control" type="text" id="posto" name="nome_funcao" maxlength="40" value="<?php echo $f['nome_funcao'] ?>" required autofocus ><br>
                </div>
                <div class="form-group col-5">
                    <label id="abr" >Abreviatura da Função</label>
                    <input class="form-control" type="text" id="abr" name="abr_funcao" maxlength="20" value="<?php echo $f['abr_funcao'] ?>" required ><br>
                </div>
            </div>
            <button class="btn btn-primary" type="submit" name="altf" >Alterar</button>            
        </form>
        <div class="col"></div>
    </div>
    <div class="row">
        <div class="col-3"><a href="list_funcao.php"><img src="../_assets/_img/table_go.png"/> lista de Funções</a></div>
        <div class="col-9"></div>
    </div>
    <?php }?>
//abertura no head.php
</div>
<?php
include 'rodape.php';
