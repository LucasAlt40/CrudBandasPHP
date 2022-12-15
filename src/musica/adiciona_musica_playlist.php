<?php
require_once("../../db/MusicasDao.php");

$id_musica = $_POST["id_musica"];
$cpf_usuario = $_POST["cpf_usuario"];

$dao = new MusicasDao();
$id_playlist = $dao->getPlaylist($cpf_usuario);


if ($id_playlist) {
    $id_playlist = $id_playlist[0];
    $dao->adicionarMusicaPlaylist($id_musica, $id_playlist);
    $saida = ["msg" => "Música adicionada com sucesso a sua playlist."];
} else {
    $dao->criarPlaylist($cpf_usuario);
    $id_playlist = $dao->getPlaylist($cpf_usuario);
    $id_playlist = $id_playlist[0];
    $dao->adicionarMusicaPlaylist($id_musica, $id_playlist);
    $saida = ["msg" => "Música adicionada com sucesso a sua playlist."];
}

echo json_encode($saida);
?>