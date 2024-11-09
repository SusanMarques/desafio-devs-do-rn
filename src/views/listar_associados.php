<?php
require_once 'base.php'; //importa o arquivo base

$content = <<<HTML
    <h3>Dashboard</h3>
    <h2>Listar Associados</h2>
    <p>Aqui será exibida a lista de associados...</p>
HTML;

renderContent($content);
?>
