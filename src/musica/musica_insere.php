<?php
    require_once("../../db/MusicasDao.php");


    $nome = $_POST["nome_musica"];
    $ano = $_POST["ano_lancamento"];
    $album = $_POST["album"];
    $banda = $_POST["banda"];
    if (array_key_exists("lancamento", $_POST)) {
        $lancamento = 1;
    } else {
        $lancamento = 0;
    }

    $dao = new MusicasDao();
    $dao->inserirMusica($nome, $ano, $album, $banda, $lancamento);

    header("Location: ../admin/lista_musicas.php");
?>