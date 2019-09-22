<?php
include 'head.php';
require '..\conexao\config.php';
require '..\conexao\conexao.php';
require '..\conexao\database.php';  
        
        if(isset($_POST['cadcargo'])){
            
            $dados = array(
                'nome_cargo' => addslashes($_POST['nome_cargo']),
                'abr_cargo'  => addslashes($_POST['abr_cargo']),
                'ant_cargo'  => addslashes($_POST['ant_cargo'])
            );
            
            $deubom = DBCreate('cargo', $dados);
            
            if($deubom){
                echo "<script>alert('Inserido com sucesso!');</script>";
            }else{
                echo "<script>alert('Erro!');</script>";                
            }
        }
        ?>

    <?php include 'header.php' ?>
    <h3 class="h3 text-center bg-primary text-light">Cadastro Posto / Graduação</h3>
    <div class="row">
        <div class="col"></div>
        <form style="padding: 2%;" class="col-10 border border-secondary" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" autocomplete="off">
            <div class="row">
                <div class="form-group col-4">
                    <label id="posto">Posto / Grad</label>
                    <input class="form-control" type="text" id="posto" name="nome_cargo" maxlength="50" required autofocus><br>
                </div>
                <div class="form-group col-4">
                    <label id="abr">Abreviatura Posto / Grad</label>
                    <input class="form-control" type="text" id="abr" name="abr_cargo" maxlength="20" required><br>
                </div>
                <div class="form-group col-4">
                    <label id="abr">Ordem de Antiguidade</label>
                    <input class="form-control" type="number" id="ant" name="ant_cargo" min="0" max="35" required><br>
                </div>
            </div>
            <div>
                <button class="btn btn-primary" type="submit" name="cadcargo">Cadastrar</button>
            </div>
        </form>
        <div class="col"></div>
    </div>
    <div class="row">
        <div class="col-3"><a href="list_cargo.php"><img src="../_assets/_img/table_go.png"/> lista de Postos e Graduações</a></div>
        <div class="col-9"></div>
    </div>
</div>
<?php
include 'rodape.php';
