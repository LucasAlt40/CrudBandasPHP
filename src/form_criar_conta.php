<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login (sessão)</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
  <header class="container cabecalho">
    <div class="row">
      <div class="col">
        <h3>Shopping Virtual</h3>
      </div>
    </div>
  </header>
  <main class="container formulario">  
    <div class="d-flex justify-content-center">
      <div class="col-lg-4 col-xs-12">
          <h4 class="text-center" >Cadastre-se</h4>
          <h5 class="text-center">Login</h5>
          <form action="./login/criar_conta.php" method="post">
            <div class="form-group">
              <label for="nome_usuario">Nome:</label> 
              <input type="text" class="form-control" id="nome_usuario" name="nome">
            </div>
            <div class="form-group">
              <label for="sobrenome_usuario">Sobrenome:</label> 
              <input type="text" class="form-control" id="sobrenome_usuario" name="sobrenome">
            </div>
            <div class="form-group">
              <label for="cpf_usuario">CPF (sem pontos e hifén):</label> 
              <input type="text" class="form-control" id="cpf_usuario" name="cpf">
            </div>
            <div class="form-group">
              <label for="id_email">E-mail:</label> 
              <input type="email" class="form-control" id="id_email" name="email">
            </div>
            <div class="form-group">
              <label for="id_senha">Senha:</label> 
              <input type="password" class="form-control" id="id_senha" name="senha">
            </div>
            <div class="text-center">    
              <input type="submit" class="btn btn-primary btn-block" value="Enviar">
            </div>  
          </form>
      </div>
    </div>     
  </main>  
</body>
</html>