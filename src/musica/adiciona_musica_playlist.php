<?php
    require_once("../../db/MusicasDao.php");
    include("../log.php");


    $id_musica = $_POST["id_musica"];
    $cpf_usuario = $_POST["cpf_usuario"];
    
    $dao = new MusicasDao();
    $id_playlist = $dao->getPlaylist($cpf_usuario);

    if($id_playlist) {
        $dao->adicionarMusicaPlaylist($id_musica, intval($id_playlist));
    } else {

        $dao->criarPlaylist($cpf_usuario);
        $id_playlist = $dao->getPlaylist($cpf_usuario);
        $dao->adicionarMusicaPlaylist($id_musica, intval($id_playlist));
    }

    header("Location: ../pages/listar_musicas.php");
?>