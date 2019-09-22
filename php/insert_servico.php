<?php
include 'head.php';
require '..\conexao\config.php';
require '..\conexao\conexao.php';
require '..\conexao\database.php';  
        
        if(isset($_POST['cadservico'])){
            
            $dados = array(
                'nomeent_servico' => addslashes($_POST['nomeent_servico']),
                'nomesai_servico' => addslashes($_POST['nomesai_servico']),
                'data_servico'    => addslashes($_POST['data_servico']),
                'id_tiposerv'     => addslashes($_POST['id_tiposerv'])
            );
            
            $deubom = DBCreate('servico', $dados);
            
            if($deubom){
                echo "<script>alert('Inserido com sucesso!');</script>";
            }else{
                echo "<script>alert('Erro!');</script>";                
            }
        }

$militar  = DBRead('militar', "INNER JOIN cw_cargo ON cw_militar.id_cargo = cw_cargo.id_cargo INNER JOIN cw_funcao ON cw_militar.id_funcao = cw_funcao.id_funcao WHERE cw_cargo.abr_cargo = 'Sd' AND cw_militar.status_militar = 'Ativo' OR cw_cargo.abr_cargo = 'Sd Ev' AND cw_militar.status_militar = 'Ativo' ORDER BY cw_cargo.ant_cargo, cw_militar.dtpromo_militar, cw_militar.dtpraca_militar, cw_militar.dtnasc_militar");
$servico = DBRead('tiposerv');
        ?>

    <?php include 'header.php' ?>
    <h3 class="h3 text-center bg-primary text-light">Cadastro Troca de Serviço</h3>
    <div class="row">
        <div class="col"></div>
        <form style="padding: 2%;" class="col-10 border border-secondary" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" autocomplete="off">
            <div class="col"></div>
            <table style="text-align: center;" class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Militar entrando</th>
                        <th scope="col">Militar saindo</th>
                        <th scope="col">Data</th>
                        <th scope="col">Tipo de serviço</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($militar == false || $servico == false) { ?>
                    <tr>
                        <td colspan="4">Não existem soldados ou serviços cadastrados</td>
                    </tr>
                    <?php }else{ ?>
                    <tr>
                        <div class="form-group">
                            <td><select name="nomeent_servico" aria-describedby="p" id="me">
                                    <?php foreach ($militar as $m) { ?>
                                    <option value="<?php echo $m['abr_cargo']; ?> <?php echo $m['nomeg_militar']; ?>"><?php echo $m['abr_cargo']; ?> <?php echo $m['nomeg_militar']; ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                        </div>
                        <div class="form-group">
                            <td><select name="nomesai_servico" aria-describedby="p" id="ms">
                                    <?php foreach ($militar as $m) { ?>
                                    <option value="<?php echo $m['abr_cargo']; ?> <?php echo $m['nomeg_militar']; ?>"><?php echo $m['abr_cargo']; ?> <?php echo $m['nomeg_militar']; ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                        </div>
                        <div class="form-group">
                            <td><input class="form-control" type="date" id="ds" name="data_servico" required></td>
                        </div>
                        <div class="form-group">
                            <td><select name="id_tiposerv" aria-describedby="p">
                                    <?php foreach ($servico as $s) { ?>
                                    <option value="<?php echo $s['id_tiposerv']; ?>"><?php echo $s['tipo_servico']; ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                        </div>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <?php if($militar == true && $servico == true){ ?>
            <div>
                <button class="btn btn-primary" type="submit" name="cadservico">Cadastrar</button>
            </div>
            <?php }?>
        </form>
        <div class="col"></div>
    </div>
    <div class="row">
        <div class="col-3"><a href="list_troca_recentes.php"><img src="../_assets/_img/table_go.png" /> lista trocas não aprovadas</a></div>
        <div class="col-9"></div>
    </div>
    <div class="row">
        <div class="col-3"><a href="list_troca_autorizada.php"><img src="../_assets/_img/table_go.png" /> lista trocas aprovadas</a></div>
        <div class="col-9"></div>
    </div>
    <div class="row">
        <div class="col-3"><a href="list_troca_arquivada.php"><img src="../_assets/_img/table_go.png" /> lista trocas arquivadas</a></div>
        <div class="col-9"></div>
    </div>
</div>
<?php
include 'rodape.php';