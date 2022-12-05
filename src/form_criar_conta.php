<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Musicfy</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }

    .b-example-divider {
      height: 3rem;
      background-color: rgba(0, 0, 0, .1);
      border: solid rgba(0, 0, 0, .15);
      border-width: 1px 0;
      box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
    }

    .b-example-vr {
      flex-shrink: 0;
      width: 1.5rem;
      height: 100vh;
    }

    .bi {
      vertical-align: -.125em;
      fill: currentColor;
    }

    .nav-scroller {
      position: relative;
      z-index: 2;
      height: 2.75rem;
      overflow-y: hidden;
    }

    .nav-scroller .nav {
      display: flex;
      flex-wrap: nowrap;
      padding-bottom: 1rem;
      margin-top: -1px;
      overflow-x: auto;
      text-align: center;
      white-space: nowrap;
      -webkit-overflow-scrolling: touch;
    }
    
  </style>

  <link href="login.css" rel="stylesheet">
</head>

<body class="bg-dark">
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="../public/index.php">Musicfy</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
          aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
    </nav>
  </header>
  <main class="form-signin w-100 m-auto">
    <form action="./login/criar_conta.php" method="POST">
      <h1 class="h3 mb-3 fw-normal" style="color: white;">Cadastro</h1>

      <div class="form-floating" style="margin: 1rem 0;">
        <input type="text" class="form-control" id="nome" name="nome" placeholder="nome">
        <label for="nome">Nome</label>
      </div>
      <div class="form-floating" style="margin: 1rem 0;">
        <input type="text" class="form-control" id="sobrenome" name="sobrenome" placeholder="sobrenome">
        <label for="sobrenome">Sobrenome</label>
      </div>
      <div class="form-floating" style="margin: 1rem 0;">
        <input type="text" class="form-control" id="cpf" name="cpf" placeholder="11111111111">
        <label for="cpf">CPF (sem hífen)</label>
      </div>
      <div class="form-floating" style="margin: 1rem 0;">
        <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
        <label for="email">Endereço de email</label>
      </div>
      <div class="form-floating"  style="margin: 1rem 0;">
        <input type="password" class="form-control" id="floatingPassword" name="senha" placeholder="Password">
        <label for="floatingPassword">Senha</label>
      </div>
      <button class="w-100 btn btn-lg btn-primary" type="submit">Cadastrar</button>
    </form>
  </main>
  <?php
  include("../include/rodape.php");
  ?>