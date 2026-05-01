<?php
include "conexao.php";

$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $nome = $_POST["nome"];
  $email = $_POST["email"];
  $senha = password_hash($_POST["senha"], PASSWORD_DEFAULT);

  // Segurança básica contra SQL injection
  $stmt = $conn->prepare(
    "INSERT INTO utilizadores (nome, email, senha) VALUES (?, ?, ?)"
  );

  $stmt->bind_param("sss", $nome, $email, $senha);

  if ($stmt->execute()) {
    $mensagem = "sucesso";
  } else {
    $mensagem = "erro";
  }
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="utf-8">
  <title>Cadastro</title>

  <!-- CSS correto -->
  <link rel="stylesheet" href="estilo/estilo.css">
</head>

<body>

<header>
  <h1>AcademiaPro</h1>
</header>

<main class="pagina-form">

  <div class="caixa-form">

    <h2>Criar conta</h2>

    <?php if ($mensagem == "sucesso"): ?>
      <p class="mensagem">Conta criada com sucesso!</p>
    <?php endif; ?>

    <?php if ($mensagem == "erro"): ?>
      <p class="erro">Erro ao criar conta</p>
    <?php endif; ?>

    <form method="POST">

      <input type="text" name="nome" placeholder="Nome" required>
      <input type="email" name="email" placeholder="Email" required>
      <input type="password" name="senha" placeholder="Senha" required>

      <button type="submit">Criar conta</button>

    </form>

  </div>

</main>

</body>
</html>