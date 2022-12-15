<?php
require_once("../../db/UsuarioDao.php");

$nome = $_POST["nome"];
$sobrenome = $_POST["sobrenome"];
$cpf = $_POST["cpf"];
$email = $_POST["email"];
$senha = $_POST["senha"];

$dao = new UsuarioDao();
$dados_consulta = $dao->buscaEmail($email);

$usuario = $dados_consulta;

if (!$usuario) {
  $dao->adicionarUsuario($nome, $sobrenome, $cpf, $email, sha1($senha));
  $saida = ["msg" => "Usuário cadastrado", "status" => true];
} else {
  $saida = ["msg" => "Já existe um usuário com esse email.", "status" => false];
}

echo json_encode($saida);
?>