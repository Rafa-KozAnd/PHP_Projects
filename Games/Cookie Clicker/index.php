<?php
session_start();

// Inicializar as variáveis de sessão se necessário
if (!isset($_SESSION['cookies'])) {
    $_SESSION['cookies'] = 0;
}

if (!isset($_SESSION['producao_por_segundo'])) {
    $_SESSION['producao_por_segundo'] = 0;
}

// Função para clicar no botão e ganhar cookies
function clicarCookie() {
    $_SESSION['cookies']++;
}

// Função para atualizar a produção por segundo
function atualizarProducaoPorSegundo() {
    $_SESSION['producao_por_segundo']++;
}

// Função para exibir o número de cookies e produção por segundo
function exibirStatus() {
    echo "<p>Cookies: {$_SESSION['cookies']}</p>";
    echo "<p>Produção por segundo: {$_SESSION['producao_por_segundo']}</p>";
}

// Ações quando o formulário é enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['clicar'])) {
        clicarCookie();
    }
    if (isset($_POST['atualizar'])) {
        // Implementar lógica para comprar atualizações automáticas
        // Exemplo básico: Aumentar a produção por segundo
        if ($_SESSION['cookies'] >= 10) {
            $_SESSION['cookies'] -= 10;
            atualizarProducaoPorSegundo();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cookie Clicker em PHP</title>
    <style>
        body {
            text-align: center;
            font-family: Arial, sans-serif;
        }
        button {
            padding: 10px 20px;
            font-size: 18px;
            margin: 10px;
        }
    </style>
</head>
<body>
    <h1>Cookie Clicker em PHP</h1>
    <form method="post">
        <?php exibirStatus(); ?>
        <button type="submit" name="clicar">Clicar no Cookie</button>
        <br>
        <button type="submit" name="atualizar">Atualizar Produção (+1/s - 10 Cookies)</button>
    </form>
</body>
</html>
