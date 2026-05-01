<?php
session_start();
include 'conexao.php'; // era inexistente — necessário para buscar progresso

if (!isset($_SESSION['nome'])) {
    header("Location: login.php");
    exit();
}

$nome_utilizador = $_SESSION['nome'];
$utilizador_id   = $_SESSION['id'];

// Busca os cursos com progresso real do utilizador
$sql = "SELECT d.nome, d.descricao, d.id,
               COALESCE(p.percentagem, 0) as percentagem
        FROM disciplinas d
        LEFT JOIN progresso p 
          ON p.disciplina_id = d.id AND p.utilizador_id = $utilizador_id
        ORDER BY p.percentagem DESC
        LIMIT 6";
$resultado = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard - AcademiaPro</title>
  <link rel="stylesheet" href="style.css"> <!-- caminho corrigido -->
</head>
<body>

  <header>
    <h1>AcademiaPro</h1>
    <nav>
      <a href="index.html">Início</a>
      <a href="cursos.php">Cursos</a>
      <a href="biblioteca.html">Biblioteca</a>
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
      <?php while($disc = mysqli_fetch_assoc($resultado)): ?>
      <div class="card">
        <h3><?php echo $disc['nome']; ?></h3>
        <p><?php echo $disc['descricao']; ?></p>
        <div class="progresso-barra-fundo">
          <div class="progresso-barra" 
               style="width: <?php echo $disc['percentagem']; ?>%;">
          </div>
        </div>
        <p class="progresso-texto">
          <?php echo $disc['percentagem']; ?>% concluído
        </p>
        <a href="disciplina.php?id=<?php echo $disc['id']; ?>" 
           class="btn-primario" style="margin-top:12px; display:inline-block;">
          Continuar →
        </a>
      </div>
      <?php endwhile; ?>
    </div>
  </div>

  <footer>
    <p class="footer-copy">© 2026 AcademiaPro</p>
  </footer>

</body>
</html>