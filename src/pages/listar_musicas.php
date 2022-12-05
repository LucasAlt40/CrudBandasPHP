<?php
require_once("../../db/MusicasDao.php");
include("../../include/cabecalhoPaginas.php");

include("../../util/mensagem.php");
exibirMsg();

$dao = new MusicasDao();
$lista_musicas = $dao->listarMusicas();
?>

<div class="lista-musicas text-bg-dark">

    <?php
    foreach ($lista_musicas as $musica):
    ?>
    <?php
        $lancamento = false;
        if ($musica["lancamento"] == '1') {
            $lancamento = true;
        }
    ?>
    <div class="card text-bg-dark" style="width: 18rem;">
        <?= ($musica["nome_arquivo"] != "" || $musica["nome_arquivo"] != null) ? '<img src="../uploads/'.  $musica["nome_arquivo"]  . '" class="card-img-top" alt="capa">' : ""?>
        <div class="card-body">
            <h5 class="card-title">
                <?= $musica["nome_musica"] ?> <?=($lancamento) ? '<span class="badge bg-success">New</span>' : "" ?>
            </h5>
            <p class="card-text">
                Album: <?= $musica["album"] ?> <br>
                    Ano de lançamento: <?= $musica["ano_lancamento"] ?> <br>
                        Banda: <?= $musica["banda"] ?>
            </p>
            <form action="../musica/adiciona_musica_playlist.php" method="post">
                <input type="hidden" name="id_musica" value="<?= $musica["id_musica"] ?>">
                <input type="hidden" name="cpf_usuario" value="<?= $_SESSION["usuario_logado"]["cpf"] ?>">
                <button type="submit" class="btn btn-outline-success" id="btn-adicionar">
                    Adicionar à Playlist
                </button>
            </form>
        </div>
    </div>
    <?php
    endforeach ?>
</div>

<?php
include("../../include/rodape.php");
?>