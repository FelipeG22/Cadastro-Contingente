<?php
include 'head.php';
require '..\conexao\config.php';
require '..\conexao\conexao.php';
require '..\conexao\database.php';  
        
        if(isset($_POST['altcargo'])){
            $c = $_POST['id_cargo'];
            $dados = array(
                'nome_cargo' => addslashes($_POST['nome_cargo']),
                'abr_cargo'  => addslashes($_POST['abr_cargo']),
                'ant_cargo'  => addslashes($_POST['ant_cargo'])
            );
            
            $deubom = DBUpdate('cargo', $dados, "WHERE id_cargo = '$c'");
            
            if($deubom){
                echo "<script>alert('Alterado com sucesso!');</script>";
            }else{
                echo "<script>alert('Erro!');</script>";                
            }
        }

if (!($_GET['c'])) {
    header("Location:list_cargo.php");
} else {
    $a = $_GET['c'];
    $cargo = DBRead('cargo', "WHERE id_cargo = '$a'");
    }

        ?>

    <?php include 'header.php' ?>
    <h3 class="h3 text-center bg-primary text-light">Alterando dados Post / Grad</h3>
    <?php foreach ($cargo as $c) { ?>
    <div class="row">
        <div class="col"></div>
        <form style="padding: 2%;" class="col-10 border border-secondary" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" autocomplete="off">
            <div class="row">
                <div class="form-group col-3">
                    <label id="ID">Nº</label>
                    <input class="form-control" type="text" id="ID" name="id_cargo" value="<?php echo $c['id_cargo'] ?>" readonly><br>
                </div>
                <div class="form-group col-3">
                    <label id="posto">Posto / Grad</label>
                    <input class="form-control" type="text" id="posto" name="nome_cargo" maxlength="50" value="<?php echo $c['nome_cargo'] ?>" required><br>
                </div>
                <div class="form-group col-3">
                    <label id="abr">Abreviatura Posto / Grad</label>
                    <input class="form-control" type="text" id="abr" name="abr_cargo" maxlength="20" value="<?php echo $c['abr_cargo'] ?>" required><br>
                </div>
                <div class="form-group col-3">
                    <label id="abr">Ordem de Antiguidade</label>
                    <input class="form-control" type="number" id="ant" name="ant_cargo" min="0" max="35" value="<?php echo $c['ant_cargo'] ?>" required><br>
                </div>
            </div>
            <div>
                <button class="btn btn-primary" type="submit" name="altcargo">Alterar</button>
            </div>
        </form>
        <div class="col"></div>
    </div>
    <div class="row">
        <div class="col-3"><a href="list_cargo.php"><img src="../_assets/_img/table_go.png" /> lista de Postos e Graduações</a></div>
        <div class="col-9"></div>
    </div>
    <?php }?>
</div>
<?php
include 'rodape.php';