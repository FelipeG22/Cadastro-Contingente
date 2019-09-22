<?php
session_start();
require '..\conexao\config.php';
require '..\conexao\conexao.php';
require '..\conexao\database.php';

if(!($_SESSION['guerra']) && !($_SESSION['posto'])){
    header("Location:sair.php");
}
if (!($_GET['t'])) {
    header("Location:list_tipo_serv.php");
} else {
    $a  = $_GET['t'];
    $del_cargo = DBDelete("tiposerv", "WHERE id_tiposerv = '{$a}'");
    if ($del_cargo) {
        header("Location:list_tipo_serv.php");
    } else {
        unset($id);
        unset($guerra);
        unset($posto);
        header("Location:sair.php");
    }
}