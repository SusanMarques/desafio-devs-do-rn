<?php
require_once 'base.php';
include "../../config/database.php";
$conteudoTabela = '';
$pesquisa = '';


if (isset($_POST['busca']) && !empty($_POST['busca'])) {
    $pesquisa = $_POST['busca'];
    $sql = "SELECT * FROM associado WHERE nome LIKE '%$pesquisa%'";
} else {
    $sql = "SELECT * FROM associado";
}

$dados = mysqli_query($conn, $sql);


if ($dados && mysqli_num_rows($dados) > 0) {
    while ($linha = mysqli_fetch_assoc($dados)) {

        $associadoId = $linha['id'];
        $sqlPagamento = "SELECT * FROM pagamento WHERE associadoid = $associadoId";
        $dadosPagamento = mysqli_query($conn, $sqlPagamento);


        $status = 'Pago';
        $pendente = false;
        while ($pagamento = mysqli_fetch_assoc($dadosPagamento)) {
            if ($pagamento['pago'] == 0) {
                $pendente = true;
                break;
            }
        }

        if ($pendente) {
            $status = 'Pendente';
        }


        $conteudoTabela .= "<tr>
            <td>{$linha['nome']}</td>
            <td>{$linha['CPF']}</td>
            <td>{$linha['email']}</td>
            <td>{$linha['datadefiliacao']}</td>
           <td>
                <a href='/devs_rn_mysql/src/controllers/detalhar_associado_controller.php?id={$associadoId}' class='botao-acao detalhar'>
                    Detalhar
                </a>
            </td>
            <td>$status</td>
        </tr>";
    }
} else {
    $conteudoTabela = "<tr><td colspan='6'>Nenhum associado encontrado.</td></tr>";
}

$content = <<<HTML
    <h3>Dashboard</h3>
    <div>
        <form class="formulario-pesquisa" method="POST" action="listar_associados.php">
            <input type="text" id="pesquisa" name="busca" placeholder="Pesquisar..." value="$pesquisa">
            <button type="submit" class="botao-buscar">Pesquisar</button>
        </form>
    </div>

    <table class="tabela-associados">
        <thead>
            <tr>
                <th>Nome</th>
                <th>CPF</th>
                <th>Email</th>
                <th>Data de Filiação</th>
                <th>Detalhar</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            $conteudoTabela
        </tbody>
    </table>
    
HTML;

renderContent($content);
?>