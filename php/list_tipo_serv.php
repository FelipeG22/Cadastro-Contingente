<?php
include 'head.php';
require '..\conexao\config.php';
require '..\conexao\conexao.php';
require '..\conexao\database.php';

$tipo  = DBRead('tiposerv');
?>
    <?php include 'header.php' ?>
    <h3 class="h3 text-center bg-primary text-light">Lista de Serviços</h3>
    <div class="row">
        <div class="col-10"></div>
        <div class="col-2"><a href="insert_tipo_servico.php"><img src="../_assets/_img/user_add.png" /> adicionar</a></div>
    </div>
    <div class="row">
        <div class="col-4"></div>
        <table style="text-align: center;" class="table table-striped table-bordered col-4">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Nº</th>
                    <th scope="col">Tipo de serviço</th>
                    <th scope="col">Excluir</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($tipo == false) { ?>
                <tr>
                    <td colspan="2">Não existe serviço cadastrado!</td>
                </tr>
                <?php }else{ $q = 1; foreach ($tipo as $a) { ?>
                <tr>
                    <td><?php echo $q++; ?></td>
                    <td><?php echo $a['tipo_servico'] ?></td>
                    <td title="Excluir"><a href="del_tipo_serv.php?t=<?php echo $a['id_tiposerv']?>" onclick="return confirm('Deseja excluir?')"><img src="../_assets/_img/cancel.png" /></a></td>
                </tr>
                <?php }} ?>
            </tbody>
        </table>
        <div class="col-4"></div>
    </div>
</div>
<?php
include 'rodape.php';