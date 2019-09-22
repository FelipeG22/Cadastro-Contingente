<?php
require '..\conexao\config.php';
require '..\conexao\conexao.php';
require '..\conexao\database.php';

if(!($_SESSION['guerra']) && !($_SESSION['posto'])){
    header("Location:sair.php");
}
        
if(isset($_GET['re'])){
    $c = $_GET['re'];
    $dados = array(
        'status_servico' => addslashes(1)
    );

    $deubom = DBUpdate('servico', $dados, "WHERE id_servico = '$c'");

    if($deubom && $_GET['re']){
        header("Location:list_troca_recentes.php");
    }else{
        unset($id);
        unset($guerra);
        unset($posto);
        header("Location:sair.php");
    }
}else
if(isset($_GET['rea'])){
    $c = $_GET['rea'];
    $dados = array(
        'status_servico' => addslashes(2)
    );

    $deubom = DBUpdate('servico', $dados, "WHERE id_servico = '$c'");

    if($deubom && $_GET['rea']){
        header("Location:list_troca_autorizada.php");
    }else{
        unset($id);
        unset($guerra);
        unset($posto);
        header("Location:sair.php");
    }
}
?>