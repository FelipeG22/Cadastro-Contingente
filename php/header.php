<header>
    <nav class="navbar navbar-expand-lg navbar-light sticky-top mb-3" style="font-size: 18px;">
        <a class="navbar-brand" href="home.php">
            <img src="../_assets/_img/flav.icon.png" class="rounded-circle" width="50" height="50" alt="">
        </a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">                
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Cadastro
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="insert_admin.php">Administrador</a>
                        <a class="dropdown-item" href="insert_funcao.php">Função</a>
                        <a class="dropdown-item" href="insert_militar.php">Militar</a>
                        <a class="dropdown-item" href="insert_cargo.php">Posto / Grad</a>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Páginas
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="list_admin.php">Administradores</a>
                        <a class="dropdown-item" href="list_funcao.php">Funções</a>
                        <a class="dropdown-item" href="list_militar.php">Militares</a>
                        <a class="dropdown-item" href="list_cargo.php">Posto / Grad</a>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Troca de Serviço
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="list_troca_arquivada.php">Arquivadas</a>
                        <a class="dropdown-item" href="list_troca_autorizada.php">Autorizadas</a>
                        <a class="dropdown-item" href="list_troca_recentes.php">Não autorizadas</a>
                        <a class="dropdown-item" href="insert_servico.php">Cadastro troca</a>
                        <a class="dropdown-item" href="insert_tipo_servico.php">Cadastro serviço</a>
                        <a class="dropdown-item" href="list_tipo_serv.php">Lista serviço</a>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Missões
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="insert_missao.php">Cadastro Missão</a>
                        <a class="dropdown-item" href="list_missao.php">Missões</a>
                        <a class="dropdown-item" href="list_missao_arquivada.php">Missões Arquivadas</a>
                    </div>
                </li>
            </ul>
        </div>
        <div>
            <h5><?php
                if ($_SESSION['guerra'] != null && $_SESSION['posto'] != null) {
                    $no = $_SESSION['guerra'];
                    $p  = $_SESSION['posto'];
                    date_default_timezone_set('America/Sao_Paulo');
                    $date = date('H');
                    if (($date >= 0) AND ( $date < 6)) {
                        echo "Boa noite, " . $p . " " . $no . " <a href='sair.php'>(Sair)</a>";
                    } else {
                        if (($date >= 6) AND ( $date < 12)) {
                            echo "Bom dia, " . $p . " " . $no . " <a href='sair.php'>(Sair)</a>";
                        } else {
                            if (($date >= 12) AND ( $date < 18)) {
                                echo "Boa tarde, " . $p . " " . $no . " <a href='sair.php'>(Sair)</a>";
                            } else {
                                if (($date >= 18) AND ( $date < 24)) {
                                    echo "Boa noite, " . $p . " " . $no . " <a href='sair.php'>(Sair)</a>";
                                }
                            }
                        }
                    }
                }
                ?>
            </h5>
        </div>
    </nav>
</header>