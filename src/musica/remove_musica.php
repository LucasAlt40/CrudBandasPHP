<?php
    require_once("../../db/MusicasDao.php");

    $id = $_POST["id_musica"];

    $dao = new MusicasDao();
    $dao->deletarMusica($id);

    header("Location: ../lista_musicas.php");
?>