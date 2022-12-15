<?php
session_start();
require_once("../../db/UsuarioDao.php");


$email = $_POST["email"];
$senha = $_POST["senha"];

$dao = new UsuarioDao();
$usuario = $dao->buscarUsuario($email, $senha);


if ($usuario[0]) {
  $_SESSION["usuario_logado"] = $usuario[0];
  $saida = ["msg" => "ok", "usuario_infos" => $usuario[0]];
} else {
  $saida = ["msg" => "erro"];
}

echo json_encode($saida);

?>