<?php
session_start();
include 'conexao.php';

// Verifica sessão
if (!isset($_SESSION['id'])) {
  http_response_code(401);
  exit();
}

// Valida os dados recebidos
if (!isset($_POST['disciplina_id']) || !isset($_POST['percentagem'])) {
  http_response_code(400);
  exit();
}

$utilizador_id = (int)$_SESSION['id'];
$disciplina_id = (int)$_POST['disciplina_id'];
$percentagem   = (int)$_POST['percentagem'];

// Garante que a percentagem está entre 0 e 100
if ($percentagem < 0)   $percentagem = 0;
if ($percentagem > 100) $percentagem = 100;

// Verifica se já existe registo de progresso
$sql_check = "SELECT id FROM progresso 
              WHERE utilizador_id = $utilizador_id 
              AND disciplina_id = $disciplina_id";
$resultado = mysqli_query($conn, $sql_check);

if (mysqli_num_rows($resultado) > 0) {
  // Actualiza o progresso existente
  $sql = "UPDATE progresso 
          SET percentagem = $percentagem 
          WHERE utilizador_id = $utilizador_id 
          AND disciplina_id = $disciplina_id";
} else {
  // Insere novo registo de progresso
  $sql = "INSERT INTO progresso (utilizador_id, disciplina_id, percentagem) 
          VALUES ($utilizador_id, $disciplina_id, $percentagem)";
}

mysqli_query($conn, $sql);

// Responde com JSON para o fetch() em disciplina.php
echo json_encode(['sucesso' => true, 'percentagem' => $percentagem]);
?>