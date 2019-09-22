<?php
include 'head.php';
require '..\conexao\config.php';
require '..\conexao\conexao.php';
require '..\conexao\database.php';

$cargo  = DBRead('missao', "WHERE status_missao = '0' ORDER BY datafin_missao");

include 'header.php';
?>

<h3 class="h3 text-center bg-primary text-light">Missões</h3>
<div class="row">
    <div class="col-3"></div>
    <table style="text-align: center;" class="table table-striped table-bordered col-6">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Nº</th>
                <th scope="col">Título</th>
                <th scope="col">Data início</th>
                <th scope="col">Data expira</th>
                <th scope="col">Ação</th>
            </tr>
        </thead>
        <tbody>
            <?php if($cargo == false){ ?>
            <tr>
                <td colspan="5">Não existem missões a ser cumpridas!</td>
            </tr>
            <?php }else{ $q = 1; foreach ($cargo as $a) { ?>
            <tr>
                <td><?php echo $q++; ?></td>
                <td><?php echo $a['nome_missao'] ?></td>
                <td><?php echo date("d/m/Y", strtotime($a["dataini_missao"])) ?></td>
                <td><?php echo date("d/m/Y", strtotime($a["datafin_missao"])) ?></td>
                <td title="Visualizar"><a href="alt_missao.php?vism=<?php echo $a['id_missao']?>" onclick="return confirm('Deseja visualizar Missão?')"><img src="../_assets/_img/magnifier.png" /></a></td>
            </tr>
            <?php }} ?>
        </tbody>
    </table>
    <div class="col-3"></div>
</div>





</div>
<?php
include 'rodape.php';
