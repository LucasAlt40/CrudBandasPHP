<?php
    require_once("Conexao.php");

    class BandasDao {
        private $con;

        public function __construct(){
            $conexao = new Conexao();
            $this->con = $conexao->getConexao();
        }

        public function listarBandas() {
            $sql = "CALL prc_list_all_bandas()";
            try {
                $stmt = $this->con->query($sql);
                $Bandas = $stmt->fetchAll();
                return $Bandas;
            } catch (PDOException $e) {
                die("Não foi possivel listar Bandas. " . $e->getMessage());
            }
        }

        public function inserirBanda($nome, $integrantes) {
            $sql = "CALL prc_insert_banda(?,?)";
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
            $sql = "CALL prc_deletar_banda(?)";
            $sqlDeletarMusicas = "CALL prc_deletar_musicas_por_banda(?)";
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