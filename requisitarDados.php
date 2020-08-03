<?php
if (isset($_POST['action'])) {
    if ($_POST['action'] == 'enviar') {
        adicionarReq();
    }
}

function abrir(){
    //Váriaveis
    $host      = 'localhost';
    $porta     = '5432';
    $baseDados = 'requiCSG';
    $user      = 'postgres';
    $password  = '3408604';

    //Abertura do banco de dados
    $conexao = pg_connect("host={$host} port={$porta} dbname={$baseDados} user={$user} password={$password}");
    return $conexao;
}

function adicionarReq(){
    header('Location:PainelRequi.php');
}

function selectTipoEquip(){
    $banco = abrir();
    $sql = "SELECT tipoequip from tipoequip order by tipoequip";
    $resultado = pg_query($banco, $sql);
    if (pg_num_rows($resultado) > 0) {
        while ($row = pg_fetch_array($resultado)) {
            $tipoEquip[] = $row;
        }
        return $tipoEquip;
    } else {
        return 0;
    }
    pg_close($banco);
}

function selectHoraI(){
    $banco = abrir();
    $sql = "SELECT * from horarioinicial order by hi";
    $resultado = pg_query($banco, $sql);
    if (pg_num_rows($resultado) > 0) {
        while ($row = pg_fetch_array($resultado)) {
            $horario[] = $row;
        }
        return $horario;
    } else {
        return 0;
    }
    pg_close($banco);
}

function selectHoraF(){
    $banco = abrir();
    $sql = "SELECT * from horariofinal order by hf";
    $resultado = pg_query($banco, $sql);
    if (pg_num_rows($resultado) > 0) {
        while ($row = pg_fetch_array($resultado)) {
            $horario[] = $row;
        }
        return $horario;
    } else {
        return 0;
    }
    pg_close($banco);
}

function selectSala(){
    $banco = abrir();
    $sql = "SELECT * from salas order by ssigla";
    $resultado = pg_query($banco, $sql);
    if (pg_num_rows($resultado) > 0) {
        while ($row = pg_fetch_array($resultado)) {
            $horario[] = $row;
        }
        return $horario;
    } else {
        return 0;
    }
    pg_close($banco);
}