<?php
session_start();

if (!isset($_SESSION['nome'])) {
    header("Location: login.php");
    exit();
}

$nome_utilizador = $_SESSION['nome'];
?>
<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="utf-8">
  <title>Dashboard - AcademiaPro</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

  <header>
    <h1>Plataforma de estudo</h1>
    <nav>
      <a href="index.html">Início</a>
      
      <span style="color:#4ade80; font-weight:700;">
        Olá, <?php echo $nome_utilizador; ?>!
      </span>
      <a href="logout.php">Sair</a>
    </nav>
  </header>

  <div class="dashboard">
    <div class="dashboard-topo">
      <h2>O teu painel</h2>
      <p>Continua do ponto onde ficaste, <?php echo $nome_utilizador; ?>.</p>
    </div>

    <div class="cards-grid">
      <div class="card">
        <span class="card-icone">🖥️</span>
        <h3>Introdução ao HTML</h3>
        <p>Aprende a estrutura base de qualquer página web.</p>
        <div class="progresso-barra-fundo">
          <div class="progresso-barra" style="width: 75%;"></div>
        </div>
        <p class="progresso-texto">75% concluído</p>
      </div>

      <div class="card">
        <span class="card-icone">🎨</span>
        <h3>CSS Avançado</h3>
        <p>Transforma páginas simples em designs profissionais.</p>
        <div class="progresso-barra-fundo">
          <div class="progresso-barra" style="width: 40%;"></div>
        </div>
        <p class="progresso-texto">40% concluído</p>
      </div>

      <div class="card">
        <span class="card-icone">⚡</span>
        <h3>JavaScript Essencial</h3>
        <p>Adiciona interactividade às tuas páginas.</p>
        <div class="progresso-barra-fundo">
          <div class="progresso-barra" style="width: 10%;"></div>
        </div>
        <p class="progresso-texto">10% concluído</p>
      </div>
    </div>
  </div>

</body>
</html>
