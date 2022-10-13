<?php
    require_once("../../db/MusicasDao.php");

    $nome = $_POST["NOME"];
    $ano = $_POST["ANO"];
    $album = $_POST["ALBUM"];
    $banda = $_POST["BANDA"];
    $id = $_POST["ID"];

    $dao = new MusicasDao();
    $dao->atualizarMusica($nome, $ano, $album, $banda, $id);

    header("Location: ../lista_musicas.php");
?>