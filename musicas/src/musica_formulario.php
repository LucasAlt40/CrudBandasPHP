<?php
  require_once("../db/BandasDao.php");
  include("../include/cabecalho.php");

  $dao = new BandasDao();
  $lista_bandas = $dao->listarBandas();
?>

<h5 class="text-center">Inserir Música</h5>
<form action="./musica/musica_insere.php"  class="bg-light container" method="post">
  <div class="form-group">
    <label for="NOME">Nome:</label> 
    <input type="text" class="form-control" id="NOME" name="NOME">
  </div>
  <div class="form-group"> 
    <label for="ANO">Ano:</label> 
    <input type="number" class="form-control" id="ANO" name="ANO" maxLength="4">
  </div>         
  <div class="form-group"> 
    <label for="ALBUM">Album</label> 
    <input type="text" class="form-control" id="ALBUM" name="ALBUM">
  </div>
  <div class="form-group"> 
    <label for="BANDA">Banda</label> 
    <select class="form-select" id="BANDA" name="BANDA" aria-label="Default select example">
      <?php
        foreach($lista_bandas as $bandas) :
      ?>  
        <option value="<?=$bandas["NOME"]?>"><?=$bandas["NOME"]?></option>
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