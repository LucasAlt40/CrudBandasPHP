<?php
    require_once("../../db/MusicasDao.php");

    $nome = $_POST["nome_musica"];
    $ano = $_POST["ano_lancamento"];
    $album = $_POST["album"];
    $banda = $_POST["banda"];
    $id = $_POST["id_musica"];

    $dao = new MusicasDao();
    $dao->atualizarMusica($nome, $ano, $album, $banda, $id);

    header("Location: ../lista_musicas.php");
?>