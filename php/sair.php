<?php
session_start();
require '..\conexao\config.php';
require '..\conexao\conexao.php';
require '..\conexao\database.php';

if(!($_SESSION['guerra']) && !($_SESSION['posto'])){
    header("Location:..\index.php");
}
if($_SESSION['guerra'] && $_SESSION['posto']){
    unset($_SESSION['id']);
    unset($_SESSION['guerra']);
    unset($_SESSION['posto']);
    header("Location:sair.php");
}