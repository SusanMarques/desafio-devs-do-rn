<?php
require_once 'base.php';

$content = <<<HTML
    <h3>Dashboard</h3>
    <h2>Cadastrar Associado</h2>
    <form action="processar_cadastro.php" method="POST">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required>
        
        <label for="cpf">CPF:</label>
        <input type="text" id="cpf" name="cpf" required>
        
        <label for="Email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="Datadefiliacao">Data de filiação:</label>
        <input type="date" id="data" name="data" required>
        
        <button type="submit">Cadastrar</button>
    </form>
HTML;

renderContent($content);
?>