<?php
    require_once("../../db/MusicasDao.php");
    include("../log.php");


    $id_musica = $_POST["id_musica"];
    $cpf_usuario = $_POST["cpf_usuario"];
    
    $dao = new MusicasDao();
    $id_playlist = $dao->getPlaylist($cpf_usuario);
    

    if($id_playlist) {
        $id_playlist = $id_playlist[0];
        $dao->adicionarMusicaPlaylist($id_musica, $id_playlist);
    } else {
        $dao->criarPlaylist($cpf_usuario);
        $id_playlist = $dao->getPlaylist($cpf_usuario);
        $id_playlist = $id_playlist[0];
        $dao->adicionarMusicaPlaylist($id_musica, $id_playlist);
    }

    header("Location: ../pages/listar_musicas.php");
?>