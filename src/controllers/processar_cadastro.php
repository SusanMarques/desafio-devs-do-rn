<?php
session_start();
require_once '../views/base.php';
include "../../config/database.php";

$mensagem = "";


$anoAnuidade = $_SESSION['anoAnuidade'];
$valorAnuidade = $_SESSION['valorAnuidade'];


$nome = $_POST["nome"];
$email = $_POST["email"];
$CPF = $_POST["CPF"];
$datadefiliacao = $_POST["datadefiliacao"];


$sqlAssociado = "INSERT INTO `associado`(`nome`, `email`, `CPF`, `datadefiliacao`) 
                 VALUES ('$nome','$email','$CPF','$datadefiliacao')";
if(mysqli_query($conn, $sqlAssociado)) {
    $associadoId = mysqli_insert_id($conn);

    
    $sqlAnuidade = "INSERT INTO `anuidade`(`ano`, `valor`) VALUES ('$anoAnuidade', '$valorAnuidade')";
    if(mysqli_query($conn, $sqlAnuidade)) {
        $anuidadeId = mysqli_insert_id($conn);

        $sqlPagamento = "INSERT INTO `pagamento`(`associadoid`, `anuidadeid`, `pago`) VALUES ('$associadoId', '$anuidadeId', 0)";
        if(mysqli_query($conn, $sqlPagamento)) {
            $mensagem = "Associado e anuidade cadastrados com sucesso! Pagamento pendente criado.";
        } else {
            $mensagem = "Erro ao cadastrar pagamento pendente.";
        }
    } else {
        $mensagem = "Erro ao cadastrar anuidade.";
    }
} else {
    $mensagem = "Erro ao cadastrar associado.";
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
