<?php
    require_once("../../db/MusicasDao.php");
    include("../../include/cabecalhoPaginas.php");

    include("../../util/mensagem.php");
    exibirMsg();

    $dao = new MusicasDao();
    $lista_musicas = $dao->listarMusicas();
?>

    <table class="table table-striped mt-2 table-dark">
        <thead class="table-primary">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Ano de lançamento</th>
                <th scope="col">Album</th>
                <th scope="col">Banda</th>
                <th></th>
            </tr>
        </thead>
        <tbody>

            <?php
                foreach ($lista_musicas as $musica) :
            ?>
                <?php
                    $lancamento = false;
                    if($musica["lancamento"] == '1') {
                        $lancamento = true;
                    }
                ?>
                <tr>
                    <td><?= $musica["id_musica"] ?></td>
                    <td><?= $musica["nome_musica"] ?> <?=($lancamento) ? '<span class="badge bg-success">New</span>' : "" ?></td>
                    <td><?= $musica["ano_lancamento"] ?></td>
                    <td><?= $musica["album"] ?></td>
                    <td><?= $musica["banda"] ?></td>
                    <td>
                        <form action="../musica/adiciona_musica_playlist.php" method="post">
                            <input type="hidden" name="id_musica" value="<?=$musica["id_musica"]?>">
                            <input type="hidden" name="cpf_usuario" value="<?=$_SESSION["usuario_logado"]["cpf"]?>">
                            <button type="submit" class="btn btn-outline-success" id="btn-adicionar">
                                Adicionar à Playlist
                            </button>
                        </form>
                    </td>
                </tr>
            <?php
                endforeach
            ?>

        </tbody>
    </table>

<?php
  include("../../include/rodape.php");
?>