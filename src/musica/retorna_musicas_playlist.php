<?php
session_start();
require_once("../../db/MusicasDao.php");

$dao = new MusicasDao();
$lista_musicas = $dao->listar_playlist($_SESSION["usuario_logado"]["cpf"]);

if ($lista_musicas) {
  $musicas = ["musicas" => $lista_musicas];
} else {
  $musicas = ["errorMsg" => "Não foi possível listar músicas"];
}

$saida = json_encode($musicas);

echo $saida;
?>