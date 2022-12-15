<?php
require_once("Conexao.php");

class UsuarioDao{
  private $con;

  public function __construct(){
    $conexao = new Conexao();
    $this->con = $conexao->getConexao();
  }

  function buscaEmail($email) {
    $sql = "SELECT * FROM Usuario
            WHERE email = ?";
    try {
      $stmt = $this->con->prepare($sql);
      $stmt->bindValue(1, $email);
      $stmt->execute();
      $usuario = $stmt->fetch();
      return $usuario;
    } catch (PDOException $e) {
      die("Usuário não encontrado! " . $e->getMessage());
    }    
 
  }

  function buscarUsuario($email, $senha) {
    $senha_sha1 = sha1($senha);
    $sql = "SELECT * FROM Usuario
            WHERE email = ? AND senha = ?";
    try {
      $stmt = $this->con->prepare($sql);
      $stmt->bindValue(1, $email);
      $stmt->bindValue(2, $senha_sha1);
      $stmt->execute();
      $usuario = $stmt->fetch();
      if ($usuario) {
        $msg = null;
      } else {
        $msg = "Usuário ou Senha incorretos!";
      }
      return [$usuario, $msg];
    } catch (PDOException $e) {
      die("Usuário não encontrado! " . $e->getMessage());
    }    
 
  }

  public function getInfoUsuario($cpf) {
    $sql = "SELECT nome, sobrenome, tipo_usuario FROM Usuario WHERE cpf = ?";
    try {
      $stmt = $this->con->prepare($sql);
      $stmt->bindValue(1, $cpf);
      $stmt->execute();
      $usuario = $stmt->fetch();
      return $usuario;
    } catch (PDOException $e) {
      die("Usuário não encontrado! " . $e->getMessage());
    } 
  }

  public function adicionarUsuario($nome, $sobrenome, $cpf, $email, $senha) {
    $sql = "INSERT INTO Usuario (nome, sobrenome, cpf, email, senha) VALUES (?, ?, ?, ?, ?)";
    try {
      $stmt = $this->con->prepare($sql);
      $stmt->bindValue(1, $nome);
      $stmt->bindValue(2, $sobrenome);
      $stmt->bindValue(3, $cpf);
      $stmt->bindValue(4, $email);
      $stmt->bindValue(5, $senha);
      $stmt->execute();
    }catch (PDOException $e) {
      die("Usuário não cadastrado! " . $e->getMessage());
    } 
  }

  public function alteraUsuario($nome, $sobrenome, $cpf, $email, $senha) {
    $sql = "UPDATE Usuario set nome = ?, sobrenome = ?, email = ?, senha = ? WHERE cpf = ?";
    try {
      $stmt = $this->con->prepare($sql);
      $stmt->bindValue(1, $nome);
      $stmt->bindValue(2, $sobrenome);
      $stmt->bindValue(3, $email);
      $stmt->bindValue(4, $senha);
      $stmt->bindValue(5, $cpf);
      $stmt->execute();
    }catch (PDOException $e) {
      die("Usuário não cadastrado! " . $e->getMessage());
    } 
  }
}