<?php
session_start();

if (!isset($_SESSION["usuario_logado"])) {
  header("Location: ../src/form_login.php");
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Musicfy</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel="stylesheet" href="../../public/css/musicas.css">

  <style>
    .info-user {
      margin: 1rem;
      color: white;
    }
  </style>
</head>

<body class="bg-dark">
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="../../public/index.php">Musicfy</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
          aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav me-auto mb-2 mb-md-0">
            <?php
            if ($_SESSION["usuario_logado"]["tipo_usuario"] == 2) {
            ?>
            <li class="nav-item">
              <a class="nav-link" href="lista_musicas.php">Listar Músicas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="lista_bandas.php">Listar Bandas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="musica_formulario.php">Adicionar Músicas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="banda_formulario.php">Adicionar Bandas</a>
            </li>
            <?php
            } else {
            ?>
            <li class="nav-item">
              <a class="nav-link" href="playlist.php">Playlist</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="listar_musicas.php">Músicas</a>
            </li>
            <?php
            }
            ?>
          </ul>
          <div class="d-flex info-user">
            <h5>Bem vindo(a) <span class="text-success">
                <?= $_SESSION["usuario_logado"]["nome"] ?>
              </span> !</h5>
          </div>
          <a style="text-decoration: none;" class="d-flex" href="../login/logout.php">
            <button class="btn btn-outline-danger"> SAIR </button>
          </a>
        </div>
      </div>
    </nav>
  </header>
  <main class="container text-bg-dark p-3">