<?php
session_start();


if (!isset($_SESSION['anoAnuidade'])) {
    $_SESSION['anoAnuidade'] = date('Y');
}
if (!isset($_SESSION['valorAnuidade'])) {
    $_SESSION['valorAnuidade'] = 100.00;
}

function renderContent($content)
{
    ?>
    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard gerente</title>
        <link rel="stylesheet" href="../../assets/css/dashboard.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@200;400;600;700&display=swap"
            rel="stylesheet">
    </head>

    <body>
        <header class="menu-superior">
            <div class="logo">
                <a href="/devs_rn_mysql/src/views/dashboard.php">
                    <img src="/devs_rn_mysql/assets/images/logo.png" alt="Logo da associacao" class="logo-img">
                </a>
            </div>
            <div class="usuario">
                <a href="/devs_rn_mysql/public/login.php" class="login-btn">
                    <img src="/devs_rn_mysql/assets/icons/user-icon.svg" alt="Logo da associacao" class="icone-login">
                </a>
            </div>
        </header>

        <nav class="menu-lateral">
            <a href="/devs_rn_mysql/src/views/dashboard.php" class="botao">Home</a>

            <div class="gerenciar-associados">
                <h3>Gerenciar Associados</h3>
                <div>
                    <a href="/devs_rn_mysql/src/views/listar_associados.php" class="botao">Listar</a>
                    <a href="/devs_rn_mysql/src/views/cadastrar_associado.php" class="botao">Cadastrar</a>
                </div>
            </div>
            <hr class="separator">
            <div class="gerenciar-anuidades">
                <form method="POST" action="/devs_rn_mysql/src/controllers/cadastrar_anuidade_controller.php">
                    <h3>Selecione o ano:</h3>
                    <input list="anos" name="anoAnuidade" id="anoAnuidade" class="input" placeholder="Digite o ano"
                        value="<?php echo date('Y'); ?>" required>
                    <datalist id="anos">
                        <?php
                        $anoAtual = date("Y");
                        for ($ano = $anoAtual; $ano > $anoAtual - 10; $ano--) {
                            echo "<option value='$ano'>$ano</option>";
                        }
                        ?>
                    </datalist>

                    <h3>Valor da anuidade:</h3>
                    <input type="number" id="valorAnuidade" name="valorAnuidade" class="input"
                        placeholder="Digite o valor da anuidade" value="100.00" required>
                    <button type="submit" class="botao-salvar">Salvar</button>
                </form>

            </div>
        </nav>

        <main class="conteudo-principal">
            <?php echo $content;
            ?>
        </main>
    </body>

    </html>
    <?php
}
?>