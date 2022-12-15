<?php
    require_once("../../db/MusicasDao.php");
    include("../../include/cabecalhoPaginas.php");

    if($_SESSION["usuario_logado"]["tipo_usuario"] != 2) {
        header("Location: ../../public/index.php");
    }

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
                        <form action="../musica/remove_musica.php" method="post">
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

<?php
  include("../../include/rodape.php");
?>