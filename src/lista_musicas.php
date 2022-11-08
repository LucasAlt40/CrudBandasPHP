<?php
    require_once("../db/MusicasDao.php");
    include("../include/cabecalho.php");

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
                        <form action="./musica/remove_musica.php" method="post">
                            <input type="hidden" name="id_musica" value="<?=$musica["id_musica"]?>">
                            <button type="submit" class="btn btn-outline-danger" id="btn-apagar">
                                Remover
                            </button>
                        </form>
                    </td>
                    <td>
                        <a href="./atualiza_musica_form.php?id=<?= $musica["id_musica"] ?>" class="btn btn-outline-primary" >Atualizar</a>
                    </td>
                </tr>
            <?php
                endforeach
            ?>

        </tbody>
    </table>
    
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <img src="..." class="rounded me-2" alt="...">
                <strong class="me-auto">Aviso de exclusão</strong>
                <small>Agora</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                Música apagada com sucesso.
            </div>
        </div>
    </div>

<?php
  include("../include/rodape.php");
?>