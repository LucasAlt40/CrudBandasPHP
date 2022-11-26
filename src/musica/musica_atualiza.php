<?php
    require_once("../../db/MusicasDao.php");

    $nome = $_POST["nome_musica"];
    $ano = $_POST["ano_lancamento"];
    $album = $_POST["album"];
    $banda = $_POST["banda"];
    $id = $_POST["id_musica"];
    if (array_key_exists("lancamento", $_POST)) {
        $lancamento = 1;
    } else {
        $lancamento = 0;
    }

    $dao = new MusicasDao();
    $dao->atualizarMusica($nome, $ano, $album, $banda, $lancamento, $id);

    header("Location: ../admin/lista_musicas.php");
?>