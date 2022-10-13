<?php
    require_once("../db/MusicasDao.php");
    include("../include/cabecalho.php");

    $dao = new MusicasDao();
    $lista_musicas = $dao->listarMusicas();
?>

    <table class="table table-striped mt-2 bg-light">
        <thead class="table-success">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Ano</th>
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
                <tr>
                    <td><?= $musica["ID"] ?></td>
                    <td><?= $musica["NOME"] ?></td>
                    <td><?= $musica["ANO"] ?></td>
                    <td><?= $musica["ALBUM"] ?></td>
                    <td><?= $musica["BANDA"] ?></td>
                    <td>
                        <form action="./musica/remove_musica.php" method="post">
                        <input type="hidden" name="ID" value="<?=$musica["ID"]?>">
                        <button type="submit" class="btn btn-danger" value="del">Remover</button>
                        </form>
                    </td>
                    <td>
                        <a href="./musica/atualiza_musica_form.php?id=<?= $musica["ID"] ?>" class="btn btn-primary" >Atualizar</a>
                    </td>
                </tr>
            <?php
                endforeach
            ?>

        </tbody>
    </table>

<?php
  include("../include/rodape.php");
?>