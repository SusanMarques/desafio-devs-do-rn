<?php
session_start();
include "../../config/database.php";

$associadoId = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($associadoId <= 0) {
    die("Erro: ID de associado inválido.");
}


if (!$conn) {
    die("Erro ao conectar com o banco de dados: " . mysqli_connect_error());
}


$sqlAssociado = "SELECT nome, email, CPF, datadefiliacao FROM associado WHERE id = $associadoId";
$result = mysqli_query($conn, $sqlAssociado);

if (!$result) {
    die("Erro na consulta SQL para buscar associado: " . mysqli_error($conn));
}


if (mysqli_num_rows($result) == 0) {
    die("Erro: Associado não encontrado no banco de dados.");
}

$associado = mysqli_fetch_assoc($result);


$currentYear = date('Y');
$startYear = date('Y', strtotime($associado['datadefiliacao']));
$anosDevido = range($startYear, $currentYear);


if (isset($_POST['pagar']) && isset($_POST['anuidadeId'])) {
    $anuidadeId = $_POST['anuidadeId'];

    $sqlPagamento = "UPDATE pagamento SET pago = 1 WHERE associadoid = $associadoId AND anuidadeid = $anuidadeId";
    if (mysqli_query($conn, $sqlPagamento)) {
        $message = "Dívida paga com sucesso!";
    } else {
        $message = "Erro ao atualizar o status do pagamento: " . mysqli_error($conn);
    }
}


$dividasContent = '';
foreach ($anosDevido as $ano) {
    
    $sqlAnuidade = "SELECT id, valor FROM anuidade WHERE ano = $ano";
    $resultAnuidade = mysqli_query($conn, $sqlAnuidade);
    
    if ($resultAnuidade && mysqli_num_rows($resultAnuidade) > 0) {
        $anuidade = mysqli_fetch_assoc($resultAnuidade);
        $anuidadeId = $anuidade['id'];
        $valor = $anuidade['valor'];

       
        $sqlPagamento = "SELECT pago FROM pagamento WHERE associadoid = $associadoId AND anuidadeid = $anuidadeId";
        $resultPagamento = mysqli_query($conn, $sqlPagamento);
        $pago = 0;  
        if ($resultPagamento && mysqli_num_rows($resultPagamento) > 0) {
            $pagamento = mysqli_fetch_assoc($resultPagamento);
            $pago = $pagamento['pago'];
        }

        
        $status = $pago == 0 ? 'Pendente' : 'Pago';

       
        $dividasContent .= "<tr>
            <td>$ano</td>
            <td>$valor</td>
            <td>$status</td>
            <td>
                <form method='POST' action=''>
                    <input type='hidden' name='anuidadeId' value='$anuidadeId'>
                    <button type='submit' name='pagar' " . ($pago == 1 ? "disabled" : "") . ">Pagar</button>
                </form>
            </td>
        </tr>";
    }
}


$content = <<<HTML
<h3>Detalhes do Associado</h3>
<table class="tabela-associados">
    <tr>
        <th>Nome:</th>
        <td>{$associado['nome']}</td>
    </tr>
    <tr>
        <th>Email:</th>
        <td>{$associado['email']}</td>
    </tr>
    <tr>
        <th>CPF:</th>
        <td>{$associado['CPF']}</td>
    </tr>
    <tr>
        <th>Data de Filiação:</th>
        <td>{$associado['datadefiliacao']}</td>
    </tr>
</table>

<h3>Pagamentos Pendentes</h3>
<table class="tabela-associados">
    <thead>
        <tr>
            <th>Ano</th>
            <th>Valor Devido</th>
            <th>Status</th>
            <th>Ação</th>
        </tr>
    </thead>
    <tbody>
        $dividasContent
    </tbody>
</table>


<p style="color: green;">$message</p>
HTML;


require_once '../views/base.php';
renderContent($content);
?>
