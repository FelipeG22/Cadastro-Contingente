<?php
session_start();
require '..\conexao\config.php';
require '..\conexao\conexao.php';
require '..\conexao\database.php';

if(!($_SESSION['guerra']) && !($_SESSION['posto'])){
    header("Location:sair.php");
}
if (!($_GET['f'])) {
    header("Location:list_funcao.php");
} else {
    $a  = $_GET['f'];
    $del_cargo = DBDelete("funcao", "WHERE id_funcao = '{$a}'");
    if ($del_cargo) {
        header("Location:list_funcao.php");
    } else {
        unset($id);
        unset($guerra);
        unset($posto);
        header("Location:sair.php");
    }
}