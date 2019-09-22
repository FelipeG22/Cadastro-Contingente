<?php
include 'head.php';
require '..\conexao\config.php';
require '..\conexao\conexao.php';
require '..\conexao\database.php';

$trocar  = DBRead('servico', "INNER JOIN cw_tiposerv ON cw_servico.id_tiposerv = cw_tiposerv.id_tiposerv  WHERE cw_servico.status_servico = '0' ORDER BY cw_servico.data_servico, cw_servico.id_servico", "cw_servico.id_servico, cw_servico.nomeent_servico, cw_servico.nomesai_servico, cw_servico.data_servico, cw_tiposerv.tipo_servico, cw_servico.status_servico");

?>
    <?php include 'header.php' ?>
    <h3 class="h3 text-center bg-primary text-light">Lista de Trocas de Serviço a autorizar</h3>
    <div class="row">
        <div class="col-10"></div>
        <div class="col-2"><a href="insert_servico.php"><img src="../_assets/_img/user_add.png" /> adicionar</a></div>
    </div>
    <div class="row">
        <div class="col-1"></div>
        <table style="text-align: center;" class="table table-striped table-bordered col-10">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Militar entrando</th>
                    <th scope="col">Militar saindo</th>
                    <th scope="col">Data do serviço</th>
                    <th scope="col">Tipo de serviço</th>
                    <th scope="col">Situação</th>
                    <th scope="col">Aprovar</th>
                    <th scope="col">Excluir</th>
                </tr>
            </thead>
            <tbody>
                <?php if($trocar == false){ ?>
                <tr>
                    <td colspan="7">Não existem trocas para autorizar!</td>
                </tr>
                <?php }else{ ?>
                <?php foreach ($trocar as $tr) { ?>
                <tr>
                    <td><?php echo $tr['nomeent_servico'] ?></td>
                    <td><?php echo $tr['nomesai_servico'] ?></td>
                    <td><?php echo date("d/m/Y", strtotime($tr["data_servico"]))?></td>
                    <td><?php echo $tr['tipo_servico'] ?></td>
                    <?php
                    $s = $tr['status_servico'];
                    
                    if($s == 0){
                        $s = "Não aprovado";
                    }else
                    if($s == 1){
                        $s = "Aprovado";
                    }else
                    if($s == 2){
                        $s = "Arquivado";
                    }
                    ?>
                    <td><?php echo $s; ?></td>
                    <td title="Autorizar"><a href="alt_servico.php?re=<?php echo $tr['id_servico']?>" onclick="return confirm('Deseja aceitar troca?')"><img src="../_assets/_img/check.ico" /></a></td>
                    <td title="Excluir"><a href="del_servico.php?s=<?php echo $tr['id_servico']?>" onclick="return confirm('Deseja excluir serviço?')"><img src="../_assets/_img/cancel.png" /></a></td>
                </tr>
                <?php }} ?>
            </tbody>
        </table>
        <div class="col-1"></div>
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