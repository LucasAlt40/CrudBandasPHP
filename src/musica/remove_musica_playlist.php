<?php
    require_once("../../db/MusicasDao.php");

    $id = $_POST["id_musica"];

    $dao = new MusicasDao();
    $dao->deletarMusicaPlaylist($id);

    header("Location: ../pages/playlist.php");
?>