<?php
    require_once("../../db/MusicasDao.php");


    $nome = $_POST["nome_musica"];
    $ano = $_POST["ano_lancamento"];
    $album = $_POST["album"];
    $banda = $_POST["banda"];

    $dao = new MusicasDao();
    $dao->inserirMusica($nome, $ano, $album, $banda);

    header("Location: ../lista_musicas.php");
?>