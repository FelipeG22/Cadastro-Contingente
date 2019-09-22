<?php
session_start();
require '..\conexao\config.php';
require '..\conexao\conexao.php';
require '..\conexao\database.php';

if(!($_SESSION['guerra']) && !($_SESSION['posto'])){
    header("Location:sair.php");
}
if (!($_GET['m'])) {
    header("Location:list_militar.php");
} else {
    $a  = $_GET['m'];
    $del_admin = DBDelete("militar", "WHERE id_militar = '{$a}'");
    if ($del_admin) {
        header("Location:list_militar.php");
    } else {
        unset($id);
        unset($guerra);
        unset($posto);
        header("Location:sair.php");
    }
}