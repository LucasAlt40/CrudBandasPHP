<?php
  include("../include/cabecalho.php");
?>

<h5 class="text-center">Inserir Banda</h5>
<form action="./banda/banda_insere.php" class="text-bg-dark container" method="post">
    <div class="row">
        <div class="form-group col-md-5">
            <label for="nome">Nome:</label>
            <input type="text" class="form-control" id="nome" name="nome">
        </div>
        <div class="form-group col">
            <label for="integrantes">Integrantes:</label>
            <input type="text" class="form-control" id="integrantes" name="integrantes">
        </div>
    </div>
    <div  class="row">
        <button type="submit" class="btn btn-outline-success" style="width: 100px; margin: 1rem auto" value="ins">Inserir</button>
    </div>
</form>

<?php
  include("../include/rodape.php");
?>