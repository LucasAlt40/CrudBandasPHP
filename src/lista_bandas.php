<?php
    require_once("../db/BandasDao.php");
    include("../include/cabecalho.php");

    $dao = new BandasDao();
    $lista_bandas = $dao->listarBandas();
?>

    <table class="table table-striped mt-2 bg-light">
    <thead class="table-success">
        <tr>
            <th scope="col">Nome</th>
            <th scope="col">Integrantes</th>
            <th></th>
        </tr>
    </thead>
    <tbody> 
    
    <?php
        foreach ($lista_bandas as $banda) :
    ?>
        <tr>
            <td><?= $banda["NOME"] ?></td>
            <td><?= $banda["INTEGRANTES"] ?></td>
            <td>
                <form action="./banda/remove_banda.php" method="post">
                    <input type="hidden" name="NOME" value="<?= $banda["NOME"] ?>">
                    <button type="button" class="btn btn-danger" id="btn-apagar" data-toggle="modal" data-target="#exampleModalCenter" >Remover</button>
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Remover Banda</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Tem certeza que deseja apagar essa banda? Isso removerá todas as músicas pertecentes a essa banda.
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
        </tr>  
    <?php
        endforeach
    ?>
    
    </tbody>
    </table>

<?php
  include("../include/rodape.php");
?>