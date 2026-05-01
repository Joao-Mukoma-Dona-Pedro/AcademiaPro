<?php
session_start();
include 'conexao.php';


$sql = "SELECT * FROM cursos";
$resultado = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cursos — AcademiaPro</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <style>
    .cursos-topo {
      text-align: center;
      padding: 120px 20px 60px;
    }

    .cursos-topo h2 {
      font-size: 3rem;
      font-weight: 800;
      margin-bottom: 12px;
    }

    .cursos-topo p {
      color: #8899bb;
      font-size: 1.05rem;
    }

    .grelha-cursos {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
      gap: 28px;
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 40px 80px;
    }

    .curso-card {
      background: rgba(15, 36, 71, 0.6);
      border: 1px solid rgba(255,255,255,0.08);
      border-radius: 20px;
      padding: 36px 32px;
      transition: transform 0.3s, box-shadow 0.3s, border-color 0.3s;
      text-decoration: none;
      color: #f0f4ff;
      display: block;
      position: relative;
      overflow: hidden;
    }

    .curso-card::before {
      content: '';
      position: absolute;
      top: 0; left: 24px; right: 24px;
      height: 2px;
      background: linear-gradient(90deg, transparent, #4ade80, transparent);
      opacity: 0;
      transition: opacity 0.3s;
    }

    .curso-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 20px 50px rgba(0,0,0,0.3);
      border-color: rgba(74,222,128,0.2);
    }

    .curso-card:hover::before { opacity: 1; }

    .curso-icone {
      font-size: 3rem;
      margin-bottom: 20px;
      display: block;
    }

    .curso-nome {
      font-size: 1.3rem;
      font-weight: 800;
      margin-bottom: 12px;
    }

    .curso-descricao {
      color: #8899bb;
      font-size: 0.9rem;
      line-height: 1.6;
      margin-bottom: 20px;
    }

    .curso-entrar {
      display: inline-block;
      background: #4ade80;
      color: #0a1628;
      padding: 10px 24px;
      border-radius: 50px;
      font-weight: 700;
      font-size: 0.85rem;
    }
  </style>
</head>
<body>

  <header>
    <h1>AcademiaPro</h1>
    <nav>
      <a href="index.html">Início</a>
      <a href="cursos.php">Cursos</a>
      <a href="biblioteca.html">Biblioteca</a>
      <?php if(isset($_SESSION['nome'])): ?>
        <a href="dashboard.php"><?php echo $_SESSION['nome']; ?></a>
        <a href="logout.php">Sair</a>
      <?php else: ?>
        <a href="login.php">Login</a>
        <a href="cadastro.php" class="btn-nav">Cadastro</a>
      <?php endif; ?>
    </nav>
  </header>

  <div class="cursos-topo">
    <h2> Os nossos Cursos</h2>
    <p>Escolhe a tua área e começa a estudar hoje mesmo.</p>
  </div>

  <div class="grelha-cursos">
    <?php while($curso = mysqli_fetch_assoc($resultado)): ?>
    <a href="curso.php?id=<?php echo $curso['id']; ?>" class="curso-card">
      <span class="curso-icone"><?php echo $curso['icone']; ?></span>
      <h3 class="curso-nome"><?php echo $curso['nome']; ?></h3>
      <p class="curso-descricao"><?php echo $curso['descricao']; ?></p>
      <span class="curso-entrar">Entrar no curso →</span>
    </a>
    <?php endwhile; ?>
  </div>

  <footer>
    <p class="footer-copy">© AcademiaPro</p>
  </footer>

</body>
</html>
