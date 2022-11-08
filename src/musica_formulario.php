<?php
  require_once("../db/BandasDao.php");
  include("../include/cabecalho.php");

  $dao = new BandasDao();
  $lista_bandas = $dao->listarBandas();
?>

<h5 class="text-center">Inserir Música</h5>
<form action="./musica/musica_insere.php"  class="text-bg-light container" method="post">
  <div class="form-group">
    <label for="nome_musica">Nome:</label>
    <input type="text" class="form-control" id="nome_musica" name="nome_musica">
  </div>
  <div class="form-group"> 
    <label for="ano_lancamento">Ano:</label>
    <input type="number" class="form-control" id="ano_lancamento" name="ano_lancamento" maxLength="4">
  </div>         
  <div class="form-group"> 
    <label for="album">Album</label>
    <input type="text" class="form-control" id="album" name="album">
  </div>
  <div class="form-group"> 
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
          
  <button type="submit" class="btn btn-primary" value="ins">Inserir</button>
</form>

<?php
  include("../include/rodape.php");
?>