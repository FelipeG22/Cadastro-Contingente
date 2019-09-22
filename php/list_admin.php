<?php
include 'head.php';
require '..\conexao\config.php';
require '..\conexao\conexao.php';
require '..\conexao\database.php';

$admin = DBRead('admin', 'INNER JOIN cw_cargo ON cw_admin.id_cargo 
        = cw_cargo.id_cargo', 'cw_admin.id_admin, cw_admin.nome_admin, 
        cw_admin.nguerra_admin, cw_admin.login_admin, 
        cw_admin.id_cargo, cw_admin.status_admin, 
        cw_cargo.id_cargo, cw_cargo.abr_cargo');
?>
    <?php include 'header.php' ?>
    <h3 class="h3 text-center bg-primary text-light">Lista de Administradores</h3>
    <div class="row">
        <div class="col-10"></div>
        <div class="col-2"><a href="insert_admin.php"><img src="../_assets/_img/user_add.png" /> adicionar</a></div>
    </div>
    <div class="row">
        <div class="col-1"></div>
        <table style="text-align: center" class="table table-striped table-bordered col-10">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Nº</th>
                    <th scope="col">Nome Completo</th>
                    <th scope="col">Posto / Grad</th>
                    <th scope="col">Nome de Guerra</th>
                    <th scope="col">Usuário</th>
                    <th scope="col">Status</th>
                    <th scope="col" colspan="2">Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php if($admin == false){ ?>
                <tr>
                    <td colspan="7">Não existem administradores cadastrados!</td>
                </tr>
                <?php }else{ $q = 1; foreach ($admin as $a) { ?>
                <tr>
                    <td><?php echo $q++; ?></td>
                    <td><?php echo $a['nome_admin'] ?></td>
                    <td><?php echo $a['abr_cargo'] ?></td>
                    <td><?php echo $a['nguerra_admin'] ?></td>
                    <td><?php echo $a['login_admin'] ?></td>
                    <td><?php echo $a['status_admin'] ?></td>
                    <td title="Alterar"><a href="alt_admin.php?a=<?php echo $a['id_admin']?>" onclick="return confirm('Deseja alterar Informações do Administrador?')"><img src="../_assets/_img/pencil.png" /></a></td>
                    <td title="Excluir"><a href="del_admin.php?a=<?php echo $a['id_admin']?>" onclick="return confirm('Deseja excluir Administrador?')"><img src="../_assets/_img/cancel.png" /></a></td>
                </tr>
                <?php }} ?>
            </tbody>
        </table>
        <div class="col-1"></div>
    </div>
</div>
<?php
include 'rodape.php';