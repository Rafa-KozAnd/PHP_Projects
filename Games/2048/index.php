<?php
session_start();

// Função para iniciar um novo jogo
function iniciarJogo() {
    $_SESSION['tabuleiro'] = array(
        array(0, 0, 0, 0),
        array(0, 0, 0, 0),
        array(0, 0, 0, 0),
        array(0, 0, 0, 0)
    );

    adicionarNumero();
    adicionarNumero();
}

// Função para adicionar um novo número aleatório (2 ou 4) ao tabuleiro
function adicionarNumero() {
    $vazias = encontrarCelulasVazias();
    if (!empty($vazias)) {
        $posicao = $vazias[array_rand($vazias)];
        $numero = rand(1, 2) * 2; // Gera 2 ou 4
        $_SESSION['tabuleiro'][$posicao[0]][$posicao[1]] = $numero;
    }
}

// Função para encontrar células vazias no tabuleiro
function encontrarCelulasVazias() {
    $vazias = array();
    for ($i = 0; $i < 4; $i++) {
        for ($j = 0; $j < 4; $j++) {
            if ($_SESSION['tabuleiro'][$i][$j] == 0) {
                $vazias[] = array($i, $j);
            }
        }
    }
    return $vazias;
}

// Função para movimentar os números para a esquerda
function moverEsquerda() {
    $tabuleiro = $_SESSION['tabuleiro'];
    $alterado = false;

    for ($i = 0; $i < 4; $i++) {
        for ($j = 1; $j < 4; $j++) {
            if ($tabuleiro[$i][$j] != 0) {
                $k = $j;
                while ($k > 0 && $tabuleiro[$i][$k - 1] == 0) {
                    $tabuleiro[$i][$k - 1] = $tabuleiro[$i][$k];
                    $tabuleiro[$i][$k] = 0;
                    $k--;
                    $alterado = true;
                }
                if ($k > 0 && $tabuleiro[$i][$k - 1] == $tabuleiro[$i][$k]) {
                    $tabuleiro[$i][$k - 1] *= 2;
                    $tabuleiro[$i][$k] = 0;
                    $alterado = true;
                }
            }
        }
    }

    if ($alterado) {
        $_SESSION['tabuleiro'] = $tabuleiro;
        adicionarNumero();
    }
}

// Função para renderizar o tabuleiro em HTML
function renderizarTabuleiro() {
    echo '<table>';
    for ($i = 0; $i < 4; $i++) {
        echo '<tr>';
        for ($j = 0; $j < 4; $j++) {
            echo '<td>' . $_SESSION['tabuleiro'][$i][$j] . '</td>';
        }
        echo '</tr>';
    }
    echo '</table>';
}

// Iniciar um novo jogo se necessário
if (!isset($_SESSION['tabuleiro'])) {
    iniciarJogo();
}

// Processar os movimentos
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['esquerda'])) {
        moverEsquerda();
    }
    // Implementar outros movimentos: direita, cima, baixo
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>2048 em PHP</title>
    <style>
        table {
            border-collapse: collapse;
        }
        td {
            width: 50px;
            height: 50px;
            border: 1px solid #ccc;
            text-align: center;
            font-size: 24px;
        }
    </style>
</head>
<body>
    <h1>2048 em PHP</h1>
    <form method="post">
        <?php renderizarTabuleiro(); ?>
        <br>
        <button type="submit" name="esquerda">Esquerda</button>
        <!-- Implementar os outros botões de movimento: direita, cima, baixo -->
    </form>
</body>
</html>
