<?php
session_start();
require '..\conexao\config.php';
require '..\conexao\conexao.php';
require '..\conexao\database.php';

if(!($_SESSION['guerra']) && !($_SESSION['posto'])){
    header("Location:sair.php");
}
if (!($_GET['c'])) {
    header("Location:list_cargo.php");
} else {
    $a  = $_GET['c'];
    $del_cargo = DBDelete("cargo", "WHERE id_cargo = '{$a}'");
    if ($del_cargo) {
        header("Location:list_cargo.php");
    } else {
        unset($id);
        unset($guerra);
        unset($posto);
        header("Location:sair.php");
    }
}