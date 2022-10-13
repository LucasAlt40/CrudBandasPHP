<?php
    require_once("../../db/MusicasDao.php");

    $nome = $_POST["NOME"];
    $ano = $_POST["ANO"];
    $album = $_POST["ALBUM"];
    $banda = $_POST["BANDA"];

    $dao = new MusicasDao();
    $dao->inserirMusica($nome, $ano, $album, $banda);

    header("Location: ../lista_musicas.php");
?>