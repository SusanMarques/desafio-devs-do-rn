<?php
require_once 'base.php'; 


$pesquisa = isset($_POST['busca']) ? $_POST['busca'] : '';


$conteudoTabela = include "../controllers/listar_associados_controller.php";

$content = <<<HTML
    <h2>Listar Associados</h2>
    <div>
        <form class="formulario-cadastro" method="POST" action="listar_associados.php">
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
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            $conteudoTabela
        </tbody>
    </table>
HTML;

renderContent($content);
?>
