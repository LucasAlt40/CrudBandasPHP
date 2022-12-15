<?php
include("../../include/cabecalhoPaginas.php");
?>

<div class="lista-musicas text-bg-dark">

</div>

<div class="toast-container position-fixed bottom-0 end-0 p-3">
  <div id="liveToastSuccess" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
      <strong class="me-auto">Sucesso!</strong>
      <small>Agora</small>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body text-bg-success ">
      <div class="alert alert-req alert-success" role="alert">
        Usuário criado com sucesso!
      </div>
    </div>
  </div>
</div>

<?php
include("../../include/rodape.php");
?>

<script src="../javascript/renderizaMusicas.js"></script>