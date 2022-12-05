<?php
include("../log.php");
require_once("../../db/UsuarioDao.php");

$nome = $_POST["nome"];
$sobrenome = $_POST["sobrenome"];
$cpf = $_POST["cpf"];
$email = $_POST["email"];
$senha = $_POST["senha"];

$dao = new UsuarioDao();
$dao->adicionarUsuario($nome, $sobrenome, $cpf, $email, sha1($senha));

header("Location: ../form_login.php");
?>