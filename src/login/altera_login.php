<?php
require_once("../../db/UsuarioDao.php");

$nome = $_POST["nome"];
$sobrenome = $_POST["sobrenome"];
$cpf = $_POST["cpf"];
$email = $_POST["email"];
$senha = $_POST["senha"];

$dao = new UsuarioDao();
$dao->alteraUsuario($nome, $sobrenome, $cpf, $email, sha1($senha));
$saida = ["msg" => "Usuário cadastrado", "status" => true];

echo json_encode($saida);
?>