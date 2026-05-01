<?php

// =========================
// CONFIGURAÇÃO DO BANCO
// =========================
$host     = "localhost";
$usuario  = "root";
$senha    = "";
$database = "plataforma_estudo";

// =========================
// CONEXÃO
// =========================
$conn = mysqli_connect($host, $usuario, $senha, $database);

// =========================
// VERIFICAÇÃO
// =========================
if (!$conn) {
    die("Erro na conexão com a base de dados: " . mysqli_connect_error());
}

?>