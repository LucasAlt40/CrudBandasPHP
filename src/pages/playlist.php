<?php
require_once("../../db/MusicasDao.php");
include("../../include/cabecalhoPaginas.php");


$dao = new MusicasDao();
$lista_musicas = $dao->listar_playlist($_SESSION["usuario_logado"]["cpf"]);
?>

<div class="lista-musicas text-bg-dark">

    <?php
foreach ($lista_musicas as $musica):
?>
    <div class="card text-bg-dark" style="width: 18rem;">
        <img src="../uploads/<?= $musica["nome_arquivo"] ?>" class="card-img-top" alt="capa">
        <div class="card-body">
            <h5 class="card-title">
                <?= $musica["nome_musica"] ?>
            </h5>
            <p class="card-text">
                Album: <?= $musica["album"] ?> <br>
                    Ano de lançamento: <?= $musica["ano_lancamento"] ?> <br>
                        Banda: <?= $musica["banda"] ?>
            </p>
            <form action="../musica/remove_musica_playlist.php" method="post">
                <input type="hidden" name="id_musica" value="<?= $musica["id_musica"] ?>">
                <button type="submit" class="btn btn-outline-danger" id="btn-apagar">
                    Remover
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