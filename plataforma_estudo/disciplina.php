<?php
session_start();
include 'conexao.php';


if (!isset($_SESSION['nome'])) {
  header("Location: login.php");
  exit();
}


$disciplina_id = $_GET['id'];


$sql = "SELECT d.*, c.nome as curso_nome, c.id as curso_id 
        FROM disciplinas d 
        JOIN cursos c ON d.curso_id = c.id 
        WHERE d.id = $disciplina_id";
$resultado = mysqli_query($conn, $sql);
$disciplina = mysqli_fetch_assoc($resultado);


$utilizador_id = $_SESSION['id'];
$sql_prog = "SELECT percentagem FROM progresso 
             WHERE utilizador_id = $utilizador_id 
             AND disciplina_id = $disciplina_id";
$resultado_prog = mysqli_query($conn, $sql_prog);
$progresso = mysqli_fetch_assoc($resultado_prog);
$percentagem = $progresso ? $progresso['percentagem'] : 0;
?>
<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $disciplina['nome']; ?>AcademiaPro</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <style>
    .disciplina-hero {
      text-align: center;
      padding: 120px 20px 50px;
      background: linear-gradient(135deg, rgba(74,222,128,0.08), rgba(26,58,110,0.3));
      border-bottom: 1px solid rgba(74,222,128,0.1);
    }

    .breadcrumb {
      font-size: 0.85rem;
      color: #8899bb;
      margin-bottom: 16px;
    }

    .breadcrumb a {
      color: #4ade80;
      text-decoration: none;
    }

    .disciplina-hero h2 {
      font-size: 2.5rem;
      font-weight: 800;
      margin-bottom: 12px;
    }

    .disciplina-hero p {
      color: #8899bb;
      font-size: 1rem;
    }

    /* Barra de progresso grande */
    .progresso-secao {
      max-width: 900px;
      margin: 40px auto 0;
      padding: 0 40px;
    }

    .progresso-topo {
      display: flex;
      justify-content: space-between;
      margin-bottom: 8px;
      font-size: 0.9rem;
    }

    .progresso-topo span:last-child {
      color: #4ade80;
      font-weight: 700;
    }

    .progresso-barra-fundo {
      width: 100%;
      height: 10px;
      background: rgba(255,255,255,0.08);
      border-radius: 50px;
      overflow: hidden;
    }

    .progresso-barra {
      height: 100%;
      background: linear-gradient(90deg, #4ade80, #22c55e);
      border-radius: 50px;
      transition: width 1s ease;
    }

    /* Botões de actualizar progresso */
    .progresso-botoes {
      display: flex;
      gap: 10px;
      margin-top: 16px;
      flex-wrap: wrap;
    }

    .btn-progresso {
      padding: 8px 18px;
      border-radius: 50px;
      border: 1px solid rgba(74,222,128,0.3);
      background: transparent;
      color: #4ade80;
      font-size: 0.85rem;
      cursor: pointer;
      transition: all 0.3s;
    }

    .btn-progresso:hover {
      background: #4ade80;
      color: #0a1628;
      font-weight: 700;
    }

    /* Conteúdo principal */
    .conteudo-principal {
      max-width: 900px;
      margin: 0 auto;
      padding: 60px 40px;
    }

    /* Separador de secção */
    .secao-titulo {
      font-size: 1.5rem;
      font-weight: 800;
      margin-bottom: 24px;
      padding-bottom: 12px;
      border-bottom: 1px solid rgba(255,255,255,0.08);
    }

    /* Resumos */
    .resumo-box {
      background: rgba(15, 36, 71, 0.6);
      border: 1px solid rgba(255,255,255,0.08);
      border-radius: 16px;
      padding: 32px;
      margin-bottom: 40px;
      line-height: 1.8;
      color: #c8d8f0;
    }

    .resumo-box h4 {
      color: #4ade80;
      margin-bottom: 12px;
      font-size: 1.1rem;
    }

    /* Vídeo-aulas */
    .videos-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
      gap: 20px;
      margin-bottom: 40px;
    }

    .video-card {
      background: rgba(15, 36, 71, 0.6);
      border: 1px solid rgba(255,255,255,0.08);
      border-radius: 16px;
      overflow: hidden;
      transition: transform 0.3s;
    }

    .video-card:hover {
      transform: translateY(-4px);
    }

    /* Container do vídeo YouTube responsivo */
    .video-container {
      position: relative;
      padding-bottom: 56.25%;
      height: 0;
      overflow: hidden;
    }

    .video-container iframe {
      position: absolute;
      top: 0; left: 0;
      width: 100%; height: 100%;
      border: none;
    }

    .video-info {
      padding: 16px;
    }

    .video-titulo {
      font-weight: 700;
      font-size: 0.95rem;
      margin-bottom: 4px;
    }

    .video-duracao {
      color: #8899bb;
      font-size: 0.8rem;
    }

    /* PDFs */
    .pdf-lista {
      display: flex;
      flex-direction: column;
      gap: 12px;
      margin-bottom: 40px;
    }

    .pdf-item {
      background: rgba(15, 36, 71, 0.6);
      border: 1px solid rgba(255,255,255,0.08);
      border-radius: 12px;
      padding: 20px 24px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      transition: border-color 0.3s;
    }

    .pdf-item:hover {
      border-color: rgba(74,222,128,0.3);
    }

    .pdf-nome {
      font-weight: 600;
      font-size: 0.95rem;
    }

    .pdf-tamanho {
      color: #8899bb;
      font-size: 0.8rem;
      margin-top: 4px;
    }

    .btn-download {
      background: #4ade80;
      color: #0a1628;
      padding: 8px 20px;
      border-radius: 50px;
      font-weight: 700;
      font-size: 0.85rem;
      text-decoration: none;
      transition: background 0.3s;
    }

    .btn-download:hover {
      background: #22c55e;
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
      <a href="dashboard.php"><?php echo $_SESSION['nome']; ?></a>
      <a href="logout.php">Sair</a>
    </nav>
  </header>

  <!-- HERO DA DISCIPLINA -->
  <div class="disciplina-hero">
    <p class="breadcrumb">
      <a href="cursos.php">Cursos</a> → 
      <a href="curso.php?id=<?php echo $disciplina['curso_id']; ?>">
        <?php echo $disciplina['curso_nome']; ?>
      </a> → 
      <?php echo $disciplina['nome']; ?>
    </p>
    <h2><?php echo $disciplina['nome']; ?></h2>
    <p><?php echo $disciplina['descricao']; ?></p>
  </div>
  <div class="progresso-secao">
    <div class="progresso-topo">
      <span>O teu progresso nesta disciplina</span>
      <span id="percentagem-texto"><?php echo $percentagem; ?>% concluído</span>
    </div>
    <div class="progresso-barra-fundo">
      <div class="progresso-barra" id="barra" style="width: <?php echo $percentagem; ?>%;"></div>
    </div>
    <div class="progresso-botoes">
      <button class="btn-progresso" onclick="actualizarProgresso(25)">25%</button>
      <button class="btn-progresso" onclick="actualizarProgresso(50)">50%</button>
      <button class="btn-progresso" onclick="actualizarProgresso(75)">75%</button>
      <button class="btn-progresso" onclick="actualizarProgresso(100)">✅ Concluído</button>
    </div>
  </div>

  <!-- CONTEÚDO PRINCIPAL -->
  <div class="conteudo-principal">

    <!-- RESUMOS -->
    <h3 class="secao-titulo">Resumos</h3>
    <div class="resumo-box">
      <h4>Introdução</h4>
      <p>
        Aqui colocas o resumo da disciplina. Podes escrever directamente 
        neste espaço ou copiar um determinado livros e materiais de estudo.
        O texto aparece formatado e fácil de ler para os alunos.
      </p>
      <br>
      <h4>Conceitos principais</h4>
      <p>
        Adiciona aqui os conceitos mais importantes da disciplina,
        definições, fórmulas, datas ou qualquer conteúdo relevante
        para o estudo e preparação para exames.
      </p>
    </div>

    <!-- VÍDEO-AULAS -->
    <h3 class="secao-titulo"> Vídeo-aulas</h3>
    <div class="videos-grid">

      <!-- Para adicionar um vídeo do YouTube:
           1. Vai ao YouTube e abre o vídeo
           2. Clica em Partilhar → Incorporar
           3. Copia o código que aparece
           4. Cola dentro do video-container -->

      <div class="video-card">
        <div class="video-container">
          <!-- Substitui este src pelo link do YouTube real -->
          <iframe 
            src="https://www.youtube.com/embed/dQw4w9WgXcQ" 
            allowfullscreen>
          </iframe>
        </div>
        <div class="video-info">
          <p class="video-titulo">Aula 1 — Introdução</p>
          <p class="video-duracao"> 15 minutos</p>
        </div>
      </div>

      <div class="video-card">
        <div class="video-container">
          <iframe 
            src="https://www.youtube.com/embed/dQw4w9WgXcQ" 
            allowfullscreen>
          </iframe>
        </div>
        <div class="video-info">
          <p class="video-titulo">Aula 2 — Conceitos Básicos</p>
          <p class="video-duracao">22 minutos</p>
        </div>
      </div>

    </div>

    <!-- PDFs PARA DESCARREGAR -->
    <h3 class="secao-titulo"> Materiais para descarregar</h3>
    <div class="pdf-lista">

      <div class="pdf-item">
        <div>
          <p class="pdf-nome"> Resumo Completo <?php echo $disciplina['nome']; ?></p>
          <p class="pdf-tamanho">PDF • 2.4 MB</p>
        </div>
        <a href="livros/resumo.pdf" download class="btn-download">⬇️ Descarregar</a>
      </div>

      <div class="pdf-item">
        <div>
          <p class="pdf-nome"> Exercícios Práticos</p>
          <p class="pdf-tamanho">PDF • 1.1 MB</p>
        </div>
        <a href="livros/exercicios.pdf" download class="btn-download">⬇️ Descarregar</a>
      </div>

      <div class="pdf-item">
        <div>
          <p class="pdf-nome"> Provas dos Anos Anteriores e exames nacionais</p>
          <p class="pdf-tamanho">PDF • 3.8 MB</p>
        </div>
        <a href="livros/provas.pdf" download class="btn-download">⬇️ Descarregar</a>
      </div>

    </div>

  </div>

  <footer>
    <p class="footer-copy">© 2026 AcademiaPro</p>
  </footer>

 <script>
  function actualizarProgresso(percentagem) {
    document.getElementById('barra').style.width = percentagem + '%';
    document.getElementById('percentagem-texto').textContent = percentagem + '% concluído';

    fetch('guardar_progresso.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
      body: 'disciplina_id=<?php echo $disciplina_id; ?>&percentagem=' + percentagem
    });
  }
</script>

</body>
</html>
