<?php
class Conexao{
  private $servidor = "localhost";
  private $usuario = "root";
  private $senha = "root";
  private $banco = "musicfy";


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