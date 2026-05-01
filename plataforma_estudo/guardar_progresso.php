<?php
session_start();
include 'conexao.php';

if (!isset($_SESSION['id'])) {
  exit();
}

$utilizador_id = $_SESSION['id'];
$disciplina_id = $_POST['disciplina_id'];
$percentagem   = $_POST['percentagem'];


$sql_check = "SELECT id FROM progresso 
              WHERE utilizador_id = $utilizador_id 
              AND disciplina_id = $disciplina_id";
$resultado = mysqli_query($conn, $sql_check);

if (mysqli_num_rows($resultado) > 0) {
  
  $sql = "UPDATE progresso SET percentagem = $percentagem 
          WHERE utilizador_id = $utilizador_id 
          AND disciplina_id = $disciplina_id";
} else {
  
  $sql = "INSERT INTO progresso (utilizador_id, disciplina_id, percentagem) 
          VALUES ($utilizador_id, $disciplina_id, $percentagem)";
}

mysqli_query($conn, $sql);
?>


