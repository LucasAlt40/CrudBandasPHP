<?php
    require_once("../db/BandasDao.php");
    require_once("../db/MusicasDao.php");
    include("../include/cabecalho.php");

    $dao = new MusicasDao();
    $id_musica = $_GET["id"];

    $musica = $dao->getMusica($id_musica);

    $dao = new BandasDao();
    $lista_bandas = $dao->listarBandas();

?>

<h5 class="text-center">Atualizar Música</h5>
<form action="musica_atualiza.php" method="post">
  <input type="hidden" id="ID" name="ID" value="<?=$musica["ID"]?>">
  <div class="form-group">
    <label for="NOME">Nome:</label> 
    <input type="text" class="form-control" id="NOME" name="NOME" value="<?=$musica["NOME"]?>">
  </div>
  <div class="form-group">
    <label for="ANO">Ano:</label> 
    <input type="number" class="form-control" id="ANO" name="ANO" maxLength="4" value="<?=$musica["ANO"]?>">
  </div>         
  <div class="form-group">
    <label for="ALBUM">Album</label> 
    <input type="text" class="form-control" id="ALBUM" name="ALBUM" value="<?=$musica["ALBUM"]?>">
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
          
  <button type="submit" class="btn btn-primary">Atualizar</button>
</form>

<?php
  include("../include/rodape.php");
?>