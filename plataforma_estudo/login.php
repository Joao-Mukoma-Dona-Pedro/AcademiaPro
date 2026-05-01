<?php
include 'conexao.php';
session_start();

$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $email = $_POST['email'];
  $senha = $_POST['senha'];

  
  $sql = "SELECT * FROM utilizadores WHERE email = '$email'";
  $resultado = mysqli_query($conn, $sql);
  $utilizador = mysqli_fetch_assoc($resultado);

  
  if ($utilizador && password_verify($senha, $utilizador['senha'])) {
    
    $_SESSION['nome'] = $utilizador['nome'];
    header("Location: dashboard.php");
    exit();
  } else {
    $mensagem = "Email ou senha incorrectos.";
  }
}
?>
<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="utf-8">
  <title>Login — AcademiaPro</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

  <header>
    <h1>AcademiaPro</h1>
    <nav>
      <a href="index.html">Início</a>
      <a href="cadastro.php">Criar conta</a>
    </nav>
  </header>

  <div class="pagina-form">
    <div class="caixa-form">
      <h2>Bem-vindo de volta</h2>

      <?php if ($mensagem): ?>
        <p style="color: #f87171; margin-bottom: 20px;"><?php echo $mensagem; ?></p>
      <?php endif; ?>

      <form action="login.php" method="POST">
        <div class="grupo-campo">
          <label>Email</label>
          <input type="email" name="email" placeholder="Verifica se o tee email esta bem definido" required>
        </div>
        <div class="grupo-campo">
          <label>Senha</label>
          <input type="password" name="senha" placeholder="A tua senha" required>
        </div>
        <button type="submit" class="btn-primario btn-form">Entrar</button>
      </form>

      <p class="link-form">Não tens conta? <a href="cadastro.php">Criar conta</a></p>
    </div>
  </div>

</body>
</html>
