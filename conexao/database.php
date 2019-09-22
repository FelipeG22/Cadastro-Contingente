<?php

// Alterar Missão
if (isset($_POST['btaltmissao'])) {
    
    $altm = addslashes($_POST['id_missao']);

    $dados = array(
        'nome_missao'     => addslashes($_POST['nome_missao']),
        'dataini_missao'  => addslashes($_POST['dataini_missao']),
        'datafin_missao'  => addslashes($_POST['datafin_missao']),
        'conteudo_missao' => addslashes($_POST['conteudo_missao']),
        'obs_missao'      => addslashes($_POST['obs_missao'])
    );

    $deubomaltmissao = DBUpdate('missao', $dados, "WHERE id_missao = '{$altm}'");

    if ($deubomaltmissao) {
        header("Location:list_missao.php");
    } else {
        echo "<script>alert('Erro ao alterar!');</script>";
    }
}

// Cadastro Missão
if (isset($_POST['btcadmissao'])) {

    $dados = array(
        'nome_missao'     => addslashes($_POST['nome_missao']),
        'dataini_missao'  => addslashes($_POST['dataini_missao']),
        'datafin_missao'  => addslashes($_POST['datafin_missao']),
        'conteudo_missao' => addslashes($_POST['conteudo_missao']),
        'obs_missao'      => addslashes($_POST['obs_missao'])
    );

    $deubomcadmissao = DBCreate('missao', $dados);

    if ($deubomcadmissao) {
        header("Location:list_missao.php");
    } else {
        echo "<script>alert('Erro ao cadastrar!');</script>";
    }
}


// Cadastro Militar
if (isset($_POST['btcadmilitar'])) {

    $dados = array(
        'idt_militar'      => addslashes($_POST['idt_militar']),
        'nome_militar'     => addslashes($_POST['nome_militar']),
        'nomeg_militar'    => addslashes($_POST['nomeg_militar']),
        'dtnasc_militar'   => addslashes($_POST['dtnasc_militar']),
        'id_cargo'         => addslashes($_POST['id_cargo']),
        'dtpraca_militar'  => addslashes($_POST['dtpraca_militar']),
        'dtpromo_militar'  => addslashes($_POST['dtpromo_militar']),
        'id_funcao'        => addslashes($_POST['id_funcao']),
        'tel_militar'      => addslashes($_POST['tel_militar']),
        'email_militar'    => addslashes($_POST['email_militar']),
        'endereco_militar' => addslashes($_POST['endereco_militar']),
        'ts_militar'       => addslashes($_POST['ts_militar']),
        'frh_militar'      => addslashes($_POST['frh_militar']),
        'sinp_militar'     => addslashes($_POST['sinp_militar']),
        'cutis_militar'    => addslashes($_POST['cutis_militar']),
        'olhos_militar'    => addslashes($_POST['olhos_militar']),
        'cabelos_militar'  => addslashes($_POST['cabelos_militar']),
        'altura_militar'   => addslashes($_POST['altura_militar']),
        'idtcivil_militar' => addslashes($_POST['idtcivil_militar']),
        'pai_militar'      => addslashes($_POST['pai_militar']),
        'mae_militar'      => addslashes($_POST['mae_militar'])
    );

    $deubomcadmilitar = DBCreate('militar', $dados);

    if ($deubomcadmilitar) {
        header("Location:list_militar.php");
    } else {
        echo "<script>alert('Erro ao cadastrar!');</script>";
    }
}

// Cadastro Admin
if (isset($_POST['btcadastrar'])) {

    $dados = array(
        'nome_admin' => addslashes($_POST['nome_admin']),
        'nguerra_admin' => addslashes($_POST['nguerra_admin']),
        'login_admin' => addslashes($_POST['login_admin']),
        'senha_admin' => addslashes($_POST['senha_admin']),
        'id_cargo' => addslashes($_POST['id_cargo'])
    );

    $deubomcadadmin = DBCreate('admin', $dados);

    if ($deubomcadadmin) {
        header("Location:list_admin.php");
    } else {
        echo "<script>alert('Erro ao cadastrar!');</script>";
    }
}

// Login
if (isset($_POST['btlogar'])) {

    $login = addslashes($_POST['login_admin']);
    $senha = addslashes($_POST['senha_admin']);

    function DBLogin($login, $senha) {
        $query = "SELECT cw_admin.id_admin, cw_admin.nguerra_admin, cw_admin.id_cargo, cw_admin.login_admin, cw_admin.senha_admin, cw_cargo.id_cargo, cw_cargo.abr_cargo FROM cw_admin INNER JOIN cw_cargo ON cw_admin.id_cargo = cw_cargo.id_cargo WHERE cw_admin.login_admin = '{$login}' AND cw_admin.senha_admin = '{$senha}' AND cw_admin.status_admin = 'Ativo'";
        return DBExecute($query);
    }

    $deubom = DBLogin($login, $senha);
    if (mysqli_num_rows($deubom) > 0) {
        while ($l = mysqli_fetch_assoc($deubom)) {
            $id     = "{$l['id_admin']}";
            $guerra = $l['nguerra_admin'];
            $posto  = $l['abr_cargo'];
        }
        if ($guerra != null && $posto != null) {
            $_SESSION['id']     = $id;
            $_SESSION['guerra'] = $guerra;
            $_SESSION['posto']  = $posto;
            header("Location:php\home.php");
        }
    } else {
        echo "<script>alert('Usuário ou senha incorretos!');</script>";
    }
}

// Deleta Registro
function DBDelete($table, $where = null) {
    $table = DB_PREFIX . '_' . $table;
    $where = ($where) ? " {$where}" : null;
    $query = "DELETE FROM {$table}{$where}";
    return DBExecute($query);
}

// Altera Registro
function DBUpdate($table, array $data, $where = null, $insertId = false) {
    foreach ($data as $key => $value) {
        $fields[] = "{$key} = '{$value}'";
    }

    $fields = implode(', ', $fields);

    $table = DB_PREFIX . '_' . $table;
    $where = ($where) ? " {$where}" : null;
    $query = "UPDATE {$table} SET {$fields}{$where}";
    return DBExecute($query, $insertId);
}

// Ler registros
function DBRead($table, $params = null, $fields = '*') {
    $table = DB_PREFIX . '_' . $table;
    $params = ($params) ? " {$params}" : null;
    $query = "SELECT {$fields} FROM {$table}{$params}";
    $result = DBExecute($query);

    if (!mysqli_num_rows($result)) {
        return false;
    } else {
        while ($res = mysqli_fetch_assoc($result)) {
            $data[] = $res;
        }
        return $data;
    }
}

// Grava Registros
function DBCreate($table, array $data, $insertId = false) {
    $table = DB_PREFIX . '_' . $table;
    $data = DBEscape($data);

    $fields = implode(', ', array_keys($data));
    $values = "'" . implode("', '", $data) . "'";
    $query = "INSERT INTO {$table} ({$fields}) VALUES ({$values})";

    return DBExecute($query, $insertId);
}

// Executa Querys
function DBExecute($query, $insertId = false) {
    $link = DBConnect();
    $result = @mysqli_query($link, $query) or die(mysqli_error());

    if ($insertId) {
        $result = mysqli_insert_id($link);
    }

    DBClose($link);
    return $result;
}