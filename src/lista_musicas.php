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
                            <button type="button" class="btn btn-danger" id="btn-apagar" data-toggle="modal" data-target="#exampleModalCenter" >Remover</button>
                            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Remover Música</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Tem certeza que deseja apagar essa Música?.
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                        <button type="submit" class="btn btn-danger">Apagar</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </td>
                    <td>
                        <a href="./atualiza_musica_form.php?id=<?= $musica["ID"] ?>" class="btn btn-primary" >Atualizar</a>
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