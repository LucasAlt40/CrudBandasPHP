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
                    <button type="submit" class="btn btn-danger" value="del">Remover</button>
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