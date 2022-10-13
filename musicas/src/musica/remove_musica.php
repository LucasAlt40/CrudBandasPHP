<?php
    require_once("../../db/MusicasDao.php");

    $id = $_POST["ID"];

    $dao = new MusicasDao();
    $dao->deletarMusica($id);

    header("Location: ../lista_musicas.php");
?>