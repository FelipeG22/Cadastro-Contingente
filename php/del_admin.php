<?php
session_start();
require '..\conexao\config.php';
require '..\conexao\conexao.php';
require '..\conexao\database.php';

if(!($_SESSION['guerra']) && !($_SESSION['posto'])){
    header("Location:sair.php");
}
if (!($_GET['a'])) {
    header("Location:list_admin.php");
} else {
    $a  = $_GET['a'];
    $ad = $_SESSION['id'];
    if ($a == $ad || $a == 6) {
        header("Location:list_admin.php");
    } else {
        $del_admin = DBDelete("admin", "WHERE id_admin = '{$a}'");
        if ($del_admin) {
            header("Location:list_admin.php");
        } else {
            unset($id);
            unset($guerra);
            unset($posto);
            header("Location:sair.php");
        }
    }
}
