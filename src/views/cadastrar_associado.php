<?php
require_once 'base.php';

$content = <<<HTML
    <h2>Cadastrar Associado</h2>
    <form class="formulario-cadastro" action="../controllers/processar_cadastro.php" method="POST">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required>
        
        <label for="cpf">CPF:</label>
        <input type="text" id="cpf" name="CPF" required>
        
        <label for="Email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="datadefiliacao">Data de Filiação:</label>
        <input type="date" name="datadefiliacao" max="<?= date('Y-m-d'); ?>" required><br>
        
        <button type="submit">Cadastrar</button>
    </form>
HTML;

renderContent($content);
?>