<?php
  include("../include/cabecalho.php");
?>

<h5 class="text-center">Inserir Banda</h5>
<form action="./banda/banda_insere.php" method="post">
  <div class="form-group color-light">
    <label for="nome">Nome:</label>
    <input type="text" class="form-control" id="nome" name="nome">
  </div>
  <div class="form-group"> 
    <label for="integrantes">Integrantes:</label>
    <input type="text" class="form-control" id="integrantes" name="integrantes">
  </div>
  <button type="submit" class="btn btn-primary" value="ins">Inserir</button>
</form>

<?php
  include("../include/rodape.php");
?>