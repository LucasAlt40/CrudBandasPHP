<?php
class Conexao{
  private $servidor = "localhost";
  private $usuario = "root";
  private $senha = "";
  private $banco = "ifsp";


  public function getConexao(){
    try {
      $con = new pdo("mysql:host=". $this->servidor . ";dbname=". $this->banco, $this->usuario, $this->senha);
      $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      die("Conexão não realizada! Erro: " . $e->getMessage());
    }
    return $con;
  }
}

?>