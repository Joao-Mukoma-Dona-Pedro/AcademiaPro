<?php
session_start();        // session_start() ANTES de include
include 'conexao.php';

// Se já está autenticado, redireciona directamente
if (isset($_SESSION['id'])) {
  header("Location: dashboard.php");
  exit();
}

$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $email = $_POST['email'];
  $senha = $_POST['senha'];

  // Usa prepared statement para evitar SQL injection
  $stmt = $conn->prepare("SELECT * FROM utilizadores WHERE email = ?");
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $resultado  = $stmt->get_result();
  $utilizador = $resultado->fetch_assoc();

  if ($utilizador && password_verify($senha, $utilizador['senha'])) {
    // Guarda TANTO o nome COMO o id na sessão (necessário para progresso)
    $_SESSION['id']   = $utilizador['id'];
    $_SESSION['nome'] = $utilizador['nome'];

    // Redireciona para dashboard ou para a página anterior se existir
    $redirect = isset($_GET['redirect']) ? $_GET['redirect'] : 'dashboard.php';
    header("Location: " . $redirect);
    exit();

  } else {
    $mensagem = "Email ou senha incorrectos.";
  }
}

// Mensagem de sucesso vinda do cadastro.php
$cadastro_ok = isset($_GET['cadastro']) && $_GET['cadastro'] == 'sucesso';
?>
<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login — AcademiaPro</title>
  <link rel="stylesheet" href="style.css"> <!-- caminho corrigido -->
</head>
<body>

  <header>
    <h1>AcademiaPro</h1>
    <nav>
      <a href="index.html">Início</a>
      <a href="cadastro.php">Criar conta</a>
    </nav>
  </header>

  <main class="pagina-form">
    <div class="caixa-form">
      <h2>Bem-vindo de volta</h2>

      <!-- Mensagem de sucesso do cadastro -->
      <?php if ($cadastro_ok): ?>
        <p style="color:#4ade80; margin-bottom:16px;">
          ✅ Conta criada com sucesso! Entra agora.
        </p>
      <?php endif; ?>

      <!-- Mensagem de erro de login -->
      <?php if ($mensagem): ?>
        <p style="color:#f87171; margin-bottom:16px;">
          ⚠️ <?php echo $mensagem; ?>
        </p>
      <?php endif; ?>

      <form action="login.php" method="POST">
        <div class="grupo-campo">
          <label>Email</label>
          <input 
            type="email" 
            name="email" 
            placeholder="O teu email" 
            value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>"
            required>
        </div>
        <div class="grupo-campo">
          <label>Senha</label>
          <input 
            type="password" 
            name="senha" 
            placeholder="A tua senha" 
            required>
        </div>
        <button type="submit" class="btn-primario btn-form">Entrar</button>
      </form>

      <p class="link-form">
        Não tens conta? <a href="cadastro.php">Criar conta</a>
      </p>
    </div>
  </main>

</body>
</html>