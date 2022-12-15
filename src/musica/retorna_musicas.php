<?php
require_once("../../db/MusicasDao.php");

$dao = new MusicasDao();
$lista_musicas = $dao->listarMusicas();

if ($lista_musicas) {
  $musicas = ["musicas" => $lista_musicas];
} else {
  $musicas = ["errorMsg" => "Não foi possível listar músicas"];
}

$saida = json_encode($musicas);

echo $saida;
?>