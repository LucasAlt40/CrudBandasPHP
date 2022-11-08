<?php
    require_once("../db/BandasDao.php");
    include("../include/cabecalho.php");

    $dao = new BandasDao();
    $lista_bandas = $dao->listarBandas();
?>

    <table class="table table-striped mt-2 table-dark">
    <thead class="table-primary">
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
            <td><?= $banda["nome"] ?></td>
            <td><?= $banda["integrantes"] ?></td>
            <td>
                <form action="./banda/remove_banda.php" method="post">
                    <input type="hidden" name="nome" value="<?= $banda["nome"] ?>">
                    <button type="submit" class="btn btn-outline-danger" id="btn-apagar">
                        Remover
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
  include("../include/rodape.php");
?>