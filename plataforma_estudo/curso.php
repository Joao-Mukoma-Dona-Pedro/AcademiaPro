<?php
session_start();
include 'conexao.php';


if (!isset($_SESSION['nome'])) {
  header("Location: login.php");
  exit();
}


$curso_id = $_GET['id'];


$sql_curso = "SELECT * FROM cursos WHERE id = $curso_id";
$resultado_curso = mysqli_query($conn, $sql_curso);
$curso = mysqli_fetch_assoc($resultado_curso);


$sql_disc = "SELECT * FROM disciplinas WHERE curso_id = $curso_id";
$resultado_disc = mysqli_query($conn, $sql_disc);
?>
<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $curso['nome']; ?> AcademiaPro</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <style>
    .curso-hero {
      text-align: center;
      padding: 120px 20px 60px;
      background: linear-gradient(135deg, rgba(74,222,128,0.08), rgba(26,58,110,0.3));
      border-bottom: 1px solid rgba(74,222,128,0.1);
    }

    .curso-hero .icone-grande {
      font-size: 5rem;
      display: block;
      margin-bottom: 20px;
    }

    .curso-hero h2 {
      font-size: 3rem;
      font-weight: 800;
      margin-bottom: 12px;
    }

    .curso-hero p {
      color: #8899bb;
      font-size: 1.05rem;
      max-width: 600px;
      margin: 0 auto;
    }

    .disciplinas-secao {
      max-width: 900px;
      margin: 0 auto;
      padding: 60px 40px;
    }

    .disciplinas-secao h3 {
      font-size: 1.8rem;
      font-weight: 800;
      margin-bottom: 32px;
    }

    .disciplina-item {
      background: rgba(15, 36, 71, 0.6);
      border: 1px solid rgba(255,255,255,0.08);
      border-radius: 16px;
      padding: 24px 28px;
      margin-bottom: 16px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      transition: border-color 0.3s, transform 0.3s;
      text-decoration: none;
      color: #f0f4ff;
    }

    .disciplina-item:hover {
      border-color: rgba(74,222,128,0.3);
      transform: translateX(6px);
    }

    .disciplina-nome {
      font-weight: 700;
      font-size: 1rem;
      margin-bottom: 4px;
    }

    .disciplina-desc {
      color: #8899bb;
      font-size: 0.85rem;
    }

    .disciplina-seta {
      color: #4ade80;
      font-size: 1.5rem;
    }

    /* Barra de progresso */
    .progresso-barra-fundo {
      width: 100%;
      height: 6px;
      background: rgba(255,255,255,0.08);
      border-radius: 50px;
      margin-top: 10px;
      overflow: hidden;
    }

    .progresso-barra {
      height: 100%;
      background: #4ade80;
      border-radius: 50px;
    }
  </style>
</head>
<body>

  <header>
    <h1>AdemiaPro</h1>
    <nav>
      <a href="index.html">Início</a>
      <a href="cursos.php">Cursos</a>
      <a href="biblioteca.html">Biblioteca</a>
      <a href="dashboard.php"><?php echo $_SESSION['nome']; ?></a>
      <a href="logout.php">Sair</a>
    </nav>
  </header>

  <!-- HERO DO CURSO -->
  <div class="curso-hero">
    <span class="icone-grande"><?php echo $curso['icone']; ?></span>
    <h2><?php echo $curso['nome']; ?></h2>
    <p><?php echo $curso['descricao']; ?></p>
  </div>

  <!-- DISCIPLINAS DO CURSO -->
  <div class="disciplinas-secao">
    <h3> Disciplinas</h3>

    <?php while($disc = mysqli_fetch_assoc($resultado_disc)): ?>
    <a href="disciplina.php?id=<?php echo $disc['id']; ?>" class="disciplina-item">
      <div>
        <p class="disciplina-nome"><?php echo $disc['nome']; ?></p>
        <p class="disciplina-desc"><?php echo $disc['descricao']; ?></p>
        <div class="progresso-barra-fundo">
          <div class="progresso-barra" style="width: 0%;"></div>
        </div>
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
