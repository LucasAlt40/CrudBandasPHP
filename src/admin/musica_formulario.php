<?php
  require_once("../../db/BandasDao.php");
  include("../../include/cabecalhoPaginas.php");

  if($_SESSION["usuario_logado"]["tipo_usuario"] != 2) {
    header("Location: ../../public/index.php");
}

  $dao = new BandasDao();
  $lista_bandas = $dao->listarBandas();
?>

<h5 class="text-center">Inserir Música</h5>
<form action="../musica/musica_insere.php"  class="text-bg-dark container" method="post">
    <div class="row">
        <div class="form-group col">
            <label for="nome_musica">Nome:</label>
            <input type="text" class="form-control" id="nome_musica" name="nome_musica">
        </div>
        <div class="form-group col-md-5">
            <label for="ano_lancamento">Ano:</label>
            <input type="number" class="form-control" id="ano_lancamento" name="ano_lancamento" maxLength="4">
        </div>
    </div>
    <div  class="row">
      <div class="form-group col">
          <label for="album">Album</label>
          <input type="text" class="form-control" id="album" name="album">
      </div>
      <div class="form-group col-md-5">
          <label for="banda">Banda</label>
          <select class="form-select" id="banda" name="banda" aria-label="Default select example">
              <?php
              foreach($lista_bandas as $bandas) :
                  ?>
                  <option value="<?=$bandas["nome"]?>"><?=$bandas["nome"]?></option>
              <?php
              endforeach
              ?>
          </select>
      </div>
    <div class="col-12">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" checked id="gridCheck" name="lancamento">
            <label class="form-check-label" for="gridCheck">
                Lançamento
            </label>
        </div>
    </div>
    <div class="row">
        <button type="submit" class="btn btn-outline-success" style="width: 100px; margin: 1rem auto" value="ins">Inserir</button>
    </div>
</form>

<?php
  include("../../include/rodape.php");
?>