<?php

// Função para carregar as variáveis do arquivo .env
function loadEnv($file) {
    if (file_exists($file)) {
        $lines = file($file);
        foreach ($lines as $line) {
            if (strpos($line, '=') !== false) {
                list($key, $value) = explode('=', trim($line), 2);
                putenv("$key=$value");
            }
        }
    }
}

// Carregar o arquivo .env
loadEnv(__DIR__ . '/../.env'); // O arquivo .env está na raiz do projeto

// Obter as variáveis de ambiente
$server = getenv('DB_SERVER');
$user = getenv('DB_USER');
$pass = getenv('DB_PASS');
$bd = getenv('DB_NAME');

// Conectar ao banco de dados
if (mysqli_connect($server, $user, $pass, $bd)) {
    echo "Conectado com sucesso!";
} else {
    echo "Erro ao conectar ao banco";
}
?>
