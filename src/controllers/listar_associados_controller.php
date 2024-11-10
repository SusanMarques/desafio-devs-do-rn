<?php
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
        $conteudoTabela .= "<tr>
            <td>{$linha['nome']}</td>
            <td>{$linha['CPF']}</td>
            <td>{$linha['email']}</td>
            <td>{$linha['datadefiliacao']}</td>
            <td>
                <button class='botao-acao editar'>Editar</button>
                <button class='botao-acao excluir'>Excluir</button>
            </td>
        </tr>";
    }
} else {
    $conteudoTabela = "<tr><td colspan='6'>Nenhum associado encontrado.</td></tr>";
}


return $conteudoTabela;
?>
