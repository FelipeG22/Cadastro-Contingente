<?php
include 'head.php';
require '..\conexao\config.php';
require '..\conexao\conexao.php';
require '..\conexao\database.php';  
        
        if(isset($_POST['cadtiposerv'])){
            
            $dados = array(
                'tipo_servico' => addslashes($_POST['tipo_servico'])                
            );
            
            $deubom = DBCreate('tiposerv', $dados);
            
            if($deubom){
                echo "<script>alert('Inserido com sucesso!');</script>";
            }else{
                echo "<script>alert('Erro!');</script>";                
            }
        }
?>

    <?php include 'header.php' ?>
<h3 class="h3 text-center bg-primary text-light">Cadastro Tipo de Serviço</h3>
    <div class="row">
        <div class="col-4"></div>
        <form style="padding: 2%;" class="col-4 border border-secondary" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" autocomplete="off">
            <div class="row">
                <div class="form-group col">
                    <label id="posto">Tipo de serviço</label>
                    <input class="form-control" type="text" id="posto" name="tipo_servico" maxlength="50" required autofocus>
                </div>
            </div>
            <div>
                <button class="btn btn-primary" type="submit" name="cadtiposerv">Cadastrar</button>
            </div>
        </form>
        <div class="col-4"></div>
    </div>
    <div class="row">
        <div class="col-3"><a href="list_tipo_serv.php"><img src="../_assets/_img/table_go.png" /> lista tipo de serviço</a></div>
        <div class="col-9"></div>
    </div>
</div>
<?php
include 'rodape.php';