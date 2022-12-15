<?php
session_start();

if (isset($_SESSION["usuario_logado"])) {
  session_destroy();
}

header("Location: ../form_login.php");
?>
<script>
  window.onload(() => localStorage.clear());
</script>