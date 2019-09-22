<!DOCTYPE html>
<?php session_start()


?>

<html lang="pt-BR" >
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="Felipe Gonçalves">
        <link href="_assets/css/bootstrap-grid.css" rel="stylesheet" type="text/css"/>        
        <link href="_assets/css/bootstrap-grid.min.css" rel="stylesheet" type="text/css"/>
        <link href="_assets/css/bootstrap-reboot.css" rel="stylesheet" type="text/css"/>
        <link href="_assets/css/bootstrap-reboot.min.css" rel="stylesheet" type="text/css"/>
        <link href="_assets/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="_assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="_assets/css/estilo.css" rel="stylesheet" type="text/css"/>
        <script src="_assets/jquery/jquery-3.3.1.js" type="text/javascript"></script>
        <script src="_assets/jquery/jquery-3.3.1.min.js" type="text/javascript"></script>
        <script src="_assets/js/bootstrap.bundle.js" type="text/javascript"></script>
        <script src="_assets/js/bootstrap.bundle.min.js" type="text/javascript"></script>
        <script src="_assets/js/bootstrap.js" type="text/javascript"></script>
        <script src="_assets/js/bootstrap.min.js" type="text/javascript"></script>
        <link rel="shortcut icon" href="_assets/_img/flav.icon.png"/>
        <title>Contingente</title>
    </head>
    <body style="background-color: #556B2F" >
        <?php
        require 'conexao\config.php';
        require 'conexao\conexao.php';
        require 'conexao\database.php';
        ?>

        <div class="container">
            <div class="row" style="margin-top: 13%;">
                <div class="col-4" ></div>
                <form style="padding: 5%; background-color:#006400" class="col-4 rounded" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" autocomplete="on">
                    <div class="form-group">
                        <label for="log" style="font-size: 20px;">Login:</label>
                        <input type="text" class="form-control col-12" id="log" name="login_admin" maxlength="20" required autofocus placeholder="Login">
                    </div>
                    <div class="form-group">
                        <label for="sen" style="font-size: 20px;">Senha:</label>
                        <input type="password" class="form-control col-12" id="sen" name="senha_admin" maxlength="10" required placeholder="Senha">
                    </div>
                    <button class="btn btn-info" type="submit" name="btlogar">Entrar</button>
                </form>
                <div class="col-4" ></div>
            </div>
        </div>
        <?php
        include 'php\rodape.php';
        