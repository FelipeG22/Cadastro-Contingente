<?php
include 'head.php';
require '..\conexao\config.php';
require '..\conexao\conexao.php';
require '..\conexao\database.php';

$cargo  = DBRead('funcao', 'ORDER BY nome_funcao');
?>
    <?php include 'header.php' ?>
    <h3 class="h3 text-center bg-primary text-light">Lista de Funções</h3>
    <div class="row">
        <div class="col-10"></div>
        <div class="col-2"><a href="insert_funcao.php"><img src="../_assets/_img/user_add.png" /> adicionar</a></div>
    </div>
    <div class="row">
        <div class="col-1"></div>
        <table style="text-align: center;" class="table table-striped table-bordered col-10">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Nº</th>
                    <th scope="col">Função</th>
                    <th scope="col">Abreviatura</th>
                    <th scope="col" colspan="2">Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php if($cargo == false){ ?>
                <tr>
                    <td colspan="5">Não existem funções cadastradas!</td>
                </tr>
                <?php }else{ $q = 1; foreach ($cargo as $a) { ?>
                <tr>
                    <td><?php echo $q++; ?></td>
                    <td><?php echo $a['nome_funcao'] ?></td>
                    <td><?php echo $a['abr_funcao'] ?></td>
                    <td title="Alterar"><a href="alt_funcao.php?f=<?php echo $a['id_funcao']?>" onclick="return confirm('Deseja alterar informações da Função?')"><img src="../_assets/_img/pencil.png" /></a></td>
                    <td title="Excluir"><a href="del_funcao.php?f=<?php echo $a['id_funcao']?>" onclick="return confirm('Deseja excluir Função?')"><img src="../_assets/_img/cancel.png" /></a></td>
                </tr>
                <?php }} ?>
            </tbody>
        </table>
        <div class="col-1"></div>
    </div>
</div>
<?php
include 'rodape.php';