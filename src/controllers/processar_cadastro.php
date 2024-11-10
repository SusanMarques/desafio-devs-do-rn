<?php
require_once '../views/base.php';
include "../../config/database.php";

$mensagem = "";

$nome = $_POST["nome"];
$email = $_POST["email"];
$CPF = $_POST["CPF"];
$datadefiliacao = $_POST["datadefiliacao"];

$sql = "INSERT INTO `associado`(`nome`, `email`, `CPF`, `datadefiliacao`) VALUES ('$nome','$CPF','$email','$datadefiliacao')";

if(mysqli_query($conn, $sql)) {
    $mensagem = "associado cadastrado com SUCESSO!";
}else{
    $mensagem = "associado NÃO foi cadastrado";
}

$content = <<<HTML
    <h3>Dashboard</h3>
    <h2>Processar cadastro</h2>
    <div class="mensagem-sucesso">
        <p>{$mensagem}</p>
    </div>
    <a href="/devs_rn_mysql/src/views/dashboard.php" class="btn-voltar">Voltar</a>
    
HTML;

renderContent($content);


?>