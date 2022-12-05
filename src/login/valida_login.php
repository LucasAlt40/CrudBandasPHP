<?php
session_start();
require_once("../../db/UsuarioDao.php");


$email = $_POST["email"];
$senha = $_POST["senha"];

$dao = new UsuarioDao();
$usuario = $dao->buscarUsuario($email, $senha);

if ($usuario) {
  $_SESSION["usuario_logado"] = $usuario;
  echo "ok";
} else {
  echo "erro";
}

?>