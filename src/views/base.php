<?php
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
            <div class="gerenciar-associados">
                <h3>Gerenciar Associados</h3>
                <div>
                    <a href="/devs_rn_mysql/src/views/listar_associados.php" class="botao">Listar</a>
                    <a href="/devs_rn_mysql/src/views/cadastrar_associado.php" class="botao">Cadastrar</a>
                </div>
            </div>
            <hr class="separator">
            <div class="gerenciar-anuidades">
                <h3>Gerenciar Anuidades</h3>
                <div>
                    <h3>Selecione o ano:</h3>
                    <input list="anos" name="anoAnuidade" id="anoAnuidade" class="input" placeholder="Digite o ano">
                    <datalist id="anos">
                        <?php
                        $anoAtual = date("Y");

                        // Exibir os últimos 5 anos no topo
                        for ($ano = $anoAtual; $ano > $anoAtual - 10; $ano--) {
                            echo "<option value='$ano'>$ano</option>";
                        }
                        ?>
                    </datalist>

                    <h3>Valor da anuidade:</h3>
                    <input type="number" id="valorAnuidade" class="input" placeholder="Digite o valor da anuidade">
                    <button class="botao-salvar">Salvar</button>
                </div>

            </div>
        </nav>

        <main class="conteudo-principal">
            <?php echo $content; // Aqui será colocado o conteúdo da página ?>
        </main>
    </body>

    </html>
    <?php
}
