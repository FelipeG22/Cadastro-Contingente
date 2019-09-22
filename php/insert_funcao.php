<?php
include 'head.php';
require '..\conexao\config.php';
require '..\conexao\conexao.php';
require '..\conexao\database.php';

if (isset($_POST['btf'])) {

    $dados = array(
        'nome_funcao' => addslashes($_POST['nome_funcao']),
        'abr_funcao'  => addslashes($_POST['abr_funcao'])
    );

    $deubom = DBCreate('funcao', $dados);

    if ($deubom) {
        echo "<script>alert('Inserido com sucesso!');</script>";
    } else {
        echo "<script>alert('Erro!');</script>";
    }
}
?>
    <?php include 'header.php' ?>
    <h3 class="h3 text-center bg-primary text-light">Cadastro Função</h3>
    <div class="row">
        <div class="col-3"></div>
        <form style="padding: 2%;" class="col-6 border border-secondary" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" autocomplete="on" >
            <div class="row">
                <div class="form-group col" >
                    <label id="posto" >Função</label>
                    <input class="form-control" type="text" id="posto" name="nome_funcao" maxlength="40" required autofocus ><br>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-8">
                    <label id="abr" >Abreviatura da Função</label>
                    <input class="form-control" type="text" id="abr" name="abr_funcao" maxlength="20" required ><br>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <button class="btn btn-primary" type="submit" name="btf" >Cadastrar</button>
                    <button class="btn btn-danger" type="reset">Limpar</button>
                </div>
            </div>
        </form>
        <div class="col-4"></div>
    </div>
    <div class="row">
        <div class="col-3"><a href="list_funcao.php"><img src="../_assets/_img/table_go.png"/> lista de Funções</a></div>
        <div class="col-9"></div>
    </div>
</div>
<?php
include 'rodape.php';
