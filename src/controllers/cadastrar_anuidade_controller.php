<?php
session_start();
require_once '../views/base.php';
include "../../config/database.php";

$mensagem = ""; 


if (isset($_POST['anoAnuidade']) && isset($_POST['valorAnuidade'])) {
    $_SESSION['anoAnuidade'] = $_POST['anoAnuidade'];
    $_SESSION['valorAnuidade'] = $_POST['valorAnuidade'];
}

$anoAnuidade = $_SESSION['anoAnuidade'];
$valorAnuidade = $_SESSION['valorAnuidade'];


$sqlAnuidade = "INSERT INTO anuidade (ano, valor) VALUES ('$anoAnuidade', '$valorAnuidade')";

if (mysqli_query($conn, $sqlAnuidade)) {
    $mensagem = "Anuidade cadastrada com sucesso!";
} else {
    $mensagem = "Erro ao cadastrar anuidade: " . mysqli_error($conn);
}


$content = <<<HTML
    <h3>Dashboard</h3>
    <h2>Cadastro de Anuidade</h2>
    <div class="mensagem-sucesso">
        <p>{$mensagem}</p>
    </div>
    <a href="/devs_rn_mysql/src/views/dashboard.php" class="btn-voltar">Voltar</a>
HTML;


renderContent($content);
?>
