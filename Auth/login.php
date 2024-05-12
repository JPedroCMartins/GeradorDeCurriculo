<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tela de Login</title>
  <!-- Link para o Bootstrap -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Estilo personalizado para o formulário */
    .login-form {
      max-width: 400px;
      margin: 0 auto;
      padding: 30px 20px;
      background: #f7f7f7;
      border-radius: 5px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }
  </style>
</head>
<body>

<div class="container">
  <div class="row">
    <div class="col-md-6 offset-md-3">
      <form class="login-form" method="post" action="banco.php">
        <h2 class="text-center mb-4">Login</h2>
        <div class="form-group">
          <label for="username">Usuário</label>
          <input type="text" id="username" name="username" class="form-control" placeholder="Digite seu usuário" required>
        </div>
        <div class="form-group">
          <label for="password">Senha</label>
          <input type="password" id="password" name="password" class="form-control" placeholder="Digite sua senha" required>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Entrar</button>
        <div class="text-center mt-3">
            <a href="registrar.php">Registrar</a>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Scripts do Bootstrap -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
