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
<form action="./musica/musica_atualiza.php" method="post">
  <input type="hidden" id="id_musica" name="id_musica" value="<?=$musica["id_musica"]?>">
  <div class="form-group">
    <label for="NOME">Nome:</label> 
    <input type="text" class="form-control" id="nome_musica" name="nome_musica" value="<?=$musica["nome_musica"]?>">
  </div>
  <div class="form-group">
    <label for="ANO">Ano:</label> 
    <input type="number" class="form-control" id="ano_lancamento" name="ano_lancamento" maxLength="4" value="<?=$musica["ano_lancamento"]?>">
  </div>         
  <div class="form-group">
    <label for="ALBUM">Album</label> 
    <input type="text" class="form-control" id="album" name="album" value="<?=$musica["album"]?>">
  </div>
  <div class="form-group">
    <label for="BANDA">Banda</label> 
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
          
  <button type="submit" class="btn btn-primary">Atualizar</button>
</form>

<?php
  include("../include/rodape.php");
?>