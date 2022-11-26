<?php
    require_once("../../db/BandasDao.php");
    require_once("../../db/MusicasDao.php");
    include("../../include/cabecalhoPaginas.php");

    $dao = new MusicasDao();
    $id_musica = $_GET["id"];

    $musica = $dao->getMusica($id_musica);

    $dao = new BandasDao();
    $lista_bandas = $dao->listarBandas();
    if ($musica["lancamento"] == 1) {
        $lancamento = "checked='checked'";
    } else {
        $lancamento = "";
    }


?>

<h5 class="text-center">Atualizar Música</h5>
    <form action="../musica/musica_atualiza.php"  class="text-bg-dark container" method="post">
        <input type="hidden" id="id_musica" name="id_musica" value="<?=$musica["id_musica"]?>">
        <div class="row">
            <div class="form-group col">
                <label for="nome_musica">Nome:</label>
                <input type="text" class="form-control" id="nome_musica" name="nome_musica" value="<?= $musica["nome_musica"] ?>">
            </div>
            <div class="form-group col-md-5">
                <label for="ano_lancamento">Ano:</label>
                <input type="number" class="form-control" id="ano_lancamento" name="ano_lancamento" value="<?= $musica["ano_lancamento"] ?>" maxLength="4">
            </div>
        </div>
        <div  class="row">
            <div class="form-group col">
                <label for="album">Album</label>
                <input type="text" class="form-control" id="album" value="<?= $musica["album"] ?>" name="album">
            </div>
            <div class="form-group col-md-5">
                <label for="banda">Banda</label>
                <select class="form-select" id="banda" name="banda" aria-label="Default select example">
                    <?php
                    foreach($lista_bandas as $bandas) :
                        ?>
                        <option <?php $selected = $bandas["nome"] === $musica["banda"] ? "selected" : ""; echo $selected;  ?> value="<?=$bandas["nome"]?>"><?=$bandas["nome"]?></option>
                    <?php
                    endforeach
                    ?>
                </select>
            </div>
            <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck" <?=$lancamento?> name="lancamento">
                    <label class="form-check-label" for="gridCheck">
                        Lançamento
                    </label>
                </div>
            </div>
            <div class="row">
                <button type="submit" class="btn btn-outline-success" style="width: 100px; margin: 1rem auto" value="ins">Atualizar</button>
            </div>
    </form>

<?php
  include("../../include/rodape.php");
?>