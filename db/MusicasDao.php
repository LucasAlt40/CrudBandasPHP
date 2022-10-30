<?php
    require_once("Conexao.php"); 	

    class MusicasDao {
        private $con;

        public function __construct(){
            $conexao = new Conexao();
            $this->con = $conexao->getConexao();
        }

        public function listarMusicas() {
            $sql = "SELECT * FROM MUSICAS";
            try {
                $stmt = $this->con->query($sql);
                $musicas = $stmt->fetchAll();
                return $musicas;
            } catch (PDOException $e) {
                die("Não foi possivel listar musicas. " . $e->getMessage());
            }
        }

        public function getMusica($id) {
            $sql = "SELECT * FROM MUSICAS WHERE ID = ?";
            try {
                $stmt = $this->con->prepare($sql);
                $stmt->execute([$id]);
                $musica = $stmt->fetch();
                return $musica;
            } catch (PDOException $e) {
                die("Não foi possivel listar musica. " . $e->getMessage());
            }
        } 

        public function atualizarMusica($nome, $ano, $album, $banda, $id) {
            $sql = "UPDATE MUSICAS SET NOME=?, ANO=?, ALBUM=?, BANDA=? WHERE ID = ?";
            try {
                $stmt = $this->con->prepare($sql);
                $stmt->execute([$nome, $ano, $album, $banda, $id]);
            } catch (PDOException $e) {
                die("Não foi possivel atualizar a música." . $e->getMessage());
            }
        }

        public function inserirMusica($nome, $ano, $album, $banda) {
            $sql = "INSERT INTO MUSICAS (NOME, ANO, ALBUM, BANDA) 
                    VALUES (?, ?, ?, ?)";
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
            $sql = "DELETE FROM MUSICAS WHERE ID=?";
            try {
              $stmt = $this->con->prepare($sql);
              $stmt->execute([$id]);
            } catch (PDOException $e) {
              die("A música {$id} não foi apagado! " . $e->getMessage());
            }
        }
    }

?>
