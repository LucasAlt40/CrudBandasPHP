<?php
    require_once("Conexao.php");

    class BandasDao {
        private $con;

        public function __construct(){
            $conexao = new Conexao();
            $this->con = $conexao->getConexao();
        }

        public function listarBandas() {
            $sql = "SELECT * FROM bandas";
            try {
                $stmt = $this->con->query($sql);
                $Bandas = $stmt->fetchAll();
                return $Bandas;
            } catch (PDOException $e) {
                die("Não foi possivel listar Bandas. " . $e->getMessage());
            }
        }

        public function inserirBanda($nome, $integrantes) {
            $sql = "INSERT INTO bandas (nome, integrantes) VALUES (?, ?)";
            try {
                $stmt = $this->con->prepare($sql);
                $stmt->bindValue(1, $nome);
                $stmt->bindValue(2, $integrantes);
                $stmt->execute();
                $_SESSION["msg"] = "A banda {$nome} foi adicionada com sucesso!";
            } catch (PDOException $e) {
                die("Não foi possivel adicionar a Banda. " . $e->getMessage());
            }
        }

        public function deletarBanda($nome) {
            $sql = "DELETE FROM bandas WHERE nome=?";
            $sqlDeletarMusicas = "DELETE FROM musicas WHERE banda=?";
            try {
                $stmt = $this->con->prepare($sqlDeletarMusicas);
                $stmt->execute([$nome]);
            } catch (PDOException $e) {
                die("A musica com a banda {$nome} não foi apagada! " . $e->getMessage());
            }

            try {
                $stmt = $this->con->prepare($sql);
                $stmt->execute([$nome]);
                $_SESSION["msg"] = "A banda {$nome} foi apagada com sucesso!";
            } catch (PDOException $e) {
                die("A banda {$nome} não foi apagado! " . $e->getMessage());
            }
        }
    }

?>