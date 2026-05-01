<?php
session_start();
include 'conexao.php';

if (!isset($_SESSION['nome'])) {
  header("Location: login.php");
  exit();
}

$curso_id = (int)$_GET['id']; // cast para segurança

$sql_curso = "SELECT * FROM cursos WHERE id = $curso_id";
$resultado_curso = mysqli_query($conn, $sql_curso);
$curso = mysqli_fetch_assoc($resultado_curso);

$sql_disc = "SELECT * FROM disciplinas WHERE curso_id = $curso_id";
$resultado_disc = mysqli_query($conn, $sql_disc);

// Busca o progresso do utilizador em todas as disciplinas deste curso
$utilizador_id = $_SESSION['id'];
$sql_prog = "SELECT disciplina_id, percentagem FROM progresso 
             WHERE utilizador_id = $utilizador_id";
$res_prog = mysqli_query($conn, $sql_prog);
$progressos = [];
while ($p = mysqli_fetch_assoc($res_prog)) {
  $progressos[$p['disciplina_id']] = $p['percentagem'];
}
?>
<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $curso['nome']; ?> - AcademiaPro</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <style>
    /* ... (mantém o CSS original) ... */
  </style>
</head>
<body>

  <header>
    <h1>AcademiaPro</h1> <!-- corrigido: era "AdemiaPro" -->
    <nav>
      <a href="index.html">Início</a>
      <a href="cursos.php">Cursos</a>
      <a href="biblioteca.html">Biblioteca</a>
      <a href="dashboard.php"><?php echo $_SESSION['nome']; ?></a>
      <a href="logout.php">Sair</a>
    </nav>
  </header>

  <div class="curso-hero">
    <span class="icone-grande"><?php echo $curso['icone']; ?></span>
    <h2><?php echo $curso['nome']; ?></h2>
    <p><?php echo $curso['descricao']; ?></p>
  </div>

  <div class="disciplinas-secao">
    <h3>📖 Disciplinas</h3>

    <?php while($disc = mysqli_fetch_assoc($resultado_disc)): 
      $perc = isset($progressos[$disc['id']]) ? $progressos[$disc['id']] : 0;
    ?>
    <a href="disciplina.php?id=<?php echo $disc['id']; ?>" class="disciplina-item">
      <div style="flex:1;">
        <p class="disciplina-nome"><?php echo $disc['nome']; ?></p>
        <p class="disciplina-desc"><?php echo $disc['descricao']; ?></p>
        <div class="progresso-barra-fundo">
          <div class="progresso-barra" style="width: <?php echo $perc; ?>%;"></div>
        </div>
        <p style="font-size:0.75rem; color:#4ade80; margin-top:4px;">
          <?php echo $perc; ?>% concluído
        </p>
      </div>
      <span class="disciplina-seta">→</span>
    </a>
    <?php endwhile; ?>
  </div>

  <footer>
    <p class="footer-copy">© 2026 AcademiaPro</p>
  </footer>

</body>
</html>