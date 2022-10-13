<?php
    require_once("Conexao.php");

    class BandasDao {
        private $con;

        public function __construct(){
            $conexao = new Conexao();
            $this->con = $conexao->getConexao();
        }

        public function listarBandas() {
            $sql = "SELECT * FROM BANDAS";
            try {
                $stmt = $this->con->query($sql);
                $Bandas = $stmt->fetchAll();
                return $Bandas;
            } catch (PDOException $e) {
                die("Não foi possivel listar Bandas. " . $e->getMessage());
            }
        }

        public function inserirBanda($nome, $integrantes) {
            $sql = "INSERT INTO BANDAS VALUES (?, ?)";
            try {
                $stmt = $this->con->prepare($sql);
                $stmt->bindValue(1, $nome);
                $stmt->bindValue(2, $integrantes);
                $stmt->execute();
            } catch (PDOException $e) {
                die("Não foi possivel adicionar a Banda. " . $e->getMessage());
            }
        }

        public function deletarBanda($nome) {
            $sql = "DELETE FROM BANDAS WHERE NOME=?";
            $sqlDeletarMusicas = "DELETE FROM MUSICAS WHERE BANDA=?";
            try {
                $stmt = $this->con->prepare($sqlDeletarMusicas);
                $stmt->execute([$nome]);
            } catch (PDOException $e) {
                die("A musica com a banda {$nome} não foi apagada! " . $e->getMessage());
            }

            try {
                $stmt = $this->con->prepare($sql);
                $stmt->execute([$nome]);
            } catch (PDOException $e) {
                die("A banda {$nome} não foi apagado! " . $e->getMessage());
            }
        }
    }

?>