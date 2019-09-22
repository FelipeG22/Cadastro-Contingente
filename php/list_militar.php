<?php
include 'head.php';
require '..\conexao\config.php';
require '..\conexao\conexao.php';
require '..\conexao\database.php';

$admin = DBRead('militar', 'INNER JOIN cw_cargo ON cw_militar.id_cargo = cw_cargo.id_cargo INNER JOIN cw_funcao ON cw_militar.id_funcao = cw_funcao.id_funcao ORDER BY cw_cargo.ant_cargo, cw_militar.dtpromo_militar, cw_militar.dtpraca_militar, cw_militar.dtnasc_militar');
?>
    <?php include 'header.php' ?>
    <h3 class="h3 text-center bg-primary text-light">Lista de Militares</h3>
    <div class="row">
        <div class="col-10"></div>
        <div class="col-2"><a href="insert_militar.php"><img src="../_assets/_img/user_add.png" /> adicionar</a></div>
    </div>
    <div class="row">
        <div class="col-1"></div>
        <table style="text-align: center;" class="table table-striped table-bordered col-10">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Nº</th>
                    <th scope="col">Posto / Grad</th>
                    <th scope="col">Nome de Guerra</th>
                    <th scope="col">Função</th>
                    <th scope="col">Status</th>
                    <th scope="col" colspan="2">Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php if($admin == false){ ?>
                <tr>
                    <td colspan="6">Não existem militares cadastrados!</td>
                </tr>                
                <?php }else{ $q = 1; foreach ($admin as $a) { ?>
                <tr>
                    <td><?php echo $q++; ?></td>
                    <td><?php echo $a['abr_cargo'] ?></td>
                    <td><?php echo $a['nomeg_militar'] ?></td>
                    <td><?php echo $a['nome_funcao'] ?></td>
                    <td><?php echo $a['status_militar']?></td>
                    <td title="Alterar"><a href="alt_militar.php?m=<?php echo $a['id_militar']?>" onclick="return confirm('Deseja alterar Informações do Militar?')"><img src="../_assets/_img/pencil.png" /></a></td>
                    <td title="Excluir"><a href="del_militar.php?m=<?php echo $a['id_militar']?>" onclick="return confirm('Deseja excluir Militar?')"><img src="../_assets/_img/cancel.png" /></a></td>
                </tr>
                <?php }} ?>
            </tbody>
        </table>
        <div class="col-1"></div>
    </div>
</div>
<?php
include 'rodape.php';