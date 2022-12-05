<?php
require_once("Conexao.php");

class MusicasDao
{
    private $con;

    public function __construct()
    {
        $conexao = new Conexao();
        $this->con = $conexao->getConexao();
    }

    public function getPlaylist($cpf)
    {
        $sql = "SELECT id_playlist from playlist
                WHERE cpf_usuario = ?
            ";
        try {
            $stmt = $this->con->prepare($sql);
            $stmt->bindValue(1, $cpf);
            $stmt->execute();
            $playlist = $stmt->fetch();
            return $playlist;
        } catch (PDOException $e) {
            die("Não foi possivel listar musicas. " . $e->getMessage());
        }
    }

    public function listar_playlist($cpf)
    {
        $sql = "SELECT M.* from musicas M, playlist_musicas PM, playlist P
                    WHERE M.id_musica = PM.cod_musica
                    AND PM.cod_playlist = P.id_playlist
                    AND P.cpf_usuario = ?
                ";
        try {
            $stmt = $this->con->prepare($sql);
            $stmt->bindValue(1, $cpf);
            $stmt->execute();
            $playlist = $stmt->fetchAll();
            return $playlist;
        } catch (PDOException $e) {
            die("Não foi possivel listar musicas. " . $e->getMessage());
        }
    }

    public function criarPlaylist($cpf_usuario)
    {
        $sql = "INSERT INTO playlist (cpf_usuario) values (?)";
        try {
            $stmt = $this->con->prepare($sql);
            $stmt->bindValue(1, $cpf_usuario);
            $stmt->execute();
        } catch (PDOException $e) {
            die("Não foi possivel criar playlist. " . $e->getMessage());
        }
    }

    public function deletarMusicaPlaylist($id)
    {
        $sql = "DELETE FROM playlist_musicas WHERE cod_musica=?";
        try {
            $stmt = $this->con->prepare($sql);
            $stmt->execute([$id]);
            $_SESSION["msg"] = "A música {$id} foi deletada com sucesso!";
        } catch (PDOException $e) {
            die("A música {$id} não foi apagado! " . $e->getMessage());
        }
    }

    public function adicionarMusicaPlaylist($id_musica, $id_playlist)
    {
        $sql = "INSERT INTO playlist_musicas values (?, ?)";
        try {
            $stmt = $this->con->prepare($sql);
            $stmt->bindValue(1, $id_playlist);
            $stmt->bindValue(2, $id_musica);
            $stmt->execute();
        } catch (PDOException $e) {
            die("Não foi possivel adicionar musicas. " . $e->getMessage());
        }
    }

    public function listarMusicas()
    {
        $sql = "SELECT * FROM musicas";
        try {
            $stmt = $this->con->query($sql);
            $musicas = $stmt->fetchAll();
            return $musicas;
        } catch (PDOException $e) {
            die("Não foi possivel listar musicas. " . $e->getMessage());
        }
    }

    public function getMusica($id)
    {
        $sql = "SELECT * FROM musicas WHERE id_musica=?";
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

    public function atualizarMusica($nome, $ano, $album, $banda, $lancamento, $id)
    {
        $sql = "UPDATE musicas set nome_musica=?, ano_lancamento=?, album=?, banda=?, lancamento=? WHERE id_musica=?";
        try {
            $stmt = $this->con->prepare($sql);
            $stmt->execute([$nome, $ano, $album, $banda, $lancamento, $id]);
            $_SESSION["msg"] = "A música {$nome} foi atualizada com sucesso!";
        } catch (PDOException $e) {
            die("Não foi possivel atualizar a música." . $e->getMessage());
        }
    }

    public function inserirMusica($nome, $ano, $album, $banda, $lancamento, $nomeArquivo)
    {
        $sql = "INSERT INTO musicas (nome_musica, ano_lancamento, album, banda, lancamento, nome_arquivo) 
                        VALUES (?, ?, ?, ?, ?, ?)";
        try {
            $stmt = $this->con->prepare($sql);
            $stmt->bindValue(1, $nome);
            $stmt->bindValue(2, $ano);
            $stmt->bindValue(3, $album);
            $stmt->bindValue(4, $banda);
            $stmt->bindValue(5, $lancamento);
            $stmt->bindValue(6, $nomeArquivo);
            $stmt->execute();
            $_SESSION["msg"] = "A música {$nome} foi adicionada com sucesso!";
        } catch (PDOException $e) {
            die("Não foi possivel adicionar a Musica. " . $e->getMessage());
        }
    }

    public function deletarMusica($id)
    {
        $sql = "DELETE FROM musicas WHERE id_musica=?";
        try {
            $stmt = $this->con->prepare($sql);
            $stmt->execute([$id]);
            $_SESSION["msg"] = "A música {$id} foi deletada com sucesso!";
        } catch (PDOException $e) {
            die("A música {$id} não foi apagado! " . $e->getMessage());
        }
    }
}

?>