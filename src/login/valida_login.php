<?php
session_start();
require_once("../../db/UsuarioDao.php");
include("../log.php");


$email = $_POST["email"];
$senha = $_POST["senha"];

$dao = new UsuarioDao();
$usuario = $dao->buscarUsuario($email, $senha);

if ($usuario) {
  $_SESSION["usuario_logado"] = $usuario;
  header("Location: ../../public/index.php");
} else {
  header("Location: erro.php");  
}
?>