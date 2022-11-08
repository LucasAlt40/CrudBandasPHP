<?php
    require_once("Conexao.php"); 	

    class MusicasDao {
        private $con;

        public function __construct(){
            $conexao = new Conexao();
            $this->con = $conexao->getConexao();
        }

        public function listarMusicas() {
            $sql = "CALL prc_list_all_musica()";
            try {
                $stmt = $this->con->query($sql);
                $musicas = $stmt->fetchAll();
                return $musicas;
            } catch (PDOException $e) {
                die("Não foi possivel listar musicas. " . $e->getMessage());
            }
        }

        public function getMusica($id) {
            $sql = "CALL prc_list_musica(?)";
            try {
                $stmt = $this->con->prepare($sql);
                $stmt->bindValue(1, $id);
                $stmt->execute();
                $musica = $stmt->fetch();
                return $musica;
            } catch (PDOException $e) {
                die("Não foi possivel listar musica2. " . $e->getMessage());
            }
        } 

        public function atualizarMusica($nome, $ano, $album, $banda, $id) {
            $sql = "CALL prc_update_musica(?, ?, ?, ?, ?)";
            try {
                $stmt = $this->con->prepare($sql);
                $stmt->execute([$nome, $ano, $album, $banda, $id]);
            } catch (PDOException $e) {
                die("Não foi possivel atualizar a música." . $e->getMessage());
            }
        }

        public function inserirMusica($nome, $ano, $album, $banda) {
            $sql = "CALL prc_add_musica(?, ?, ?, ?)";
            try {
                $stmt = $this->con->prepare($sql);
                $stmt->bindValue(1, $nome);
                $stmt->bindValue(2, $ano);
                $stmt->bindValue(3, $album);
                $stmt->bindValue(4, $banda);
                $stmt->execute();
            } catch (PDOException $e) {
                die("Não foi possivel adicionar a Musica. " . $e->getMessage());
            }
        }

        public function deletarMusica($id) {
            $sql = "DELETE FROM musicas WHERE id_musica=?";
            try {
              $stmt = $this->con->prepare($sql);
              $stmt->execute([$id]);
            } catch (PDOException $e) {
              die("A música {$id} não foi apagado! " . $e->getMessage());
            }
        }
    }

?>
