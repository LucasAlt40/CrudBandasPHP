<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Musicfy</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

  <style>
    .formulario {
      width: 100%;
      margin: auto;
    }
  </style>
</head>
<body class="bg-dark">
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="../../public/index.php">Musicfy</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
    </nav>
  </header>
  <main class="d-flex justify-content-center text-bg-dark p-3">
    <main class="formulario d-flex justify-content-center flex-column">  
        <div class="col-lg-4 col-xs-12">
            <h5 class="text-center">Login</h5>
            <form action="./login/valida_login.php" method="post">
              <div class="form-group">
                <label for="id_email">Usuário:</label> 
                <input type="email" class="form-control" id="id_email" name="email">
              </div>
              <div class="form-group">
                <label for="id_senha">Senha:</label> 
                <input type="password" class="form-control" id="id_senha" name="senha">
              </div>
              <div class="text-center">    
                <input type="submit" class="btn btn-primary btn-block" value="Entrar">
              </div>  
            </form>
        </div>
      </div> 
        <div class="col-lg-8 col-xs-12"></div>
        <div class="col-lg-4 col-xs-12 text-center criar-conta">
          <a href="./form_criar_conta.php">Crie uma conta</a>
        </div>   
    </main>  
<?php
  include("../include/rodape.php");
?>