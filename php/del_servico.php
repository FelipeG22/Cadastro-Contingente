<?php
session_start();
require '..\conexao\config.php';
require '..\conexao\conexao.php';
require '..\conexao\database.php';

if(!($_SESSION['guerra']) && !($_SESSION['posto'])){
    header("Location:sair.php");
}
if (!($_GET['s'])) {
    header("Location:home.php");
} else {
    $a  = $_GET['s'];
    $del_cargo = DBDelete("servico", "WHERE id_servico = '{$a}'");
    if ($del_cargo) {
        header("Location:home.php");
    } else {
        unset($id);
        unset($guerra);
        unset($posto);
        header("Location:sair.php");
    }
}