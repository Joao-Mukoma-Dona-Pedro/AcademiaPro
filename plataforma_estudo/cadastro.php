<?php
include "conexao.php";

$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $nome  = $_POST["nome"];
  $email = $_POST["email"];
  $senha = password_hash($_POST["senha"], PASSWORD_DEFAULT);

  $stmt = $conn->prepare(
    "INSERT INTO utilizadores (nome, email, senha) VALUES (?, ?, ?)"
  );
  $stmt->bind_param("sss", $nome, $email, $senha);

  if ($stmt->execute()) {
    // Redireciona para login após registo com sucesso
    header("Location: login.php?cadastro=sucesso");
    exit();
  } else {
    $mensagem = "erro";
  }
}
?>
<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro - AcademiaPro</title>
  <link rel="stylesheet" href="../estilo/stilo.css">  <!-- caminho corrigido -->
</head>
<body>

<header>
  <h1>AcademiaPro</h1>
  <nav>
    <a href="index.html">Início</a>
    <a href="login.php">Login</a>
  </nav>
</header>

<main class="pagina-form">
  <div class="caixa-form">
    <h2>Criar conta</h2>

    <?php if ($mensagem == "erro"): ?>
      <p class="erro">Erro ao criar conta. O email pode já estar registado.</p>
    <?php endif; ?>

    <form method="POST">
      <input type="text"     name="nome"  placeholder="Nome"  required>
      <input type="email"    name="email" placeholder="Email" required>
      <input type="password" name="senha" placeholder="Senha" required>
      <button type="submit">Criar conta</button>
    </form>

    <p style="margin-top:16px; text-align:center; color:#8899bb;">
      Já tens conta? <a href="login.php" style="color:#4ade80;">Entrar</a>
    </p>
  </div>
</main>

</body>
</html>