<html>
<head>
    <title>Jogo de Labirinto</title>
    <style>
        .maze {
            display: flex;
            flex-wrap: wrap;
            width: 400px;
            margin: auto;
            border: 2px solid black;
        }
        .cell {
            width: 40px;
            height: 40px;
            line-height: 40px;
            text-align: center;
            border: 1px solid #ccc;
            font-size: 20px;
        }
        .wall {
            background-color: #333;
            color: white;
        }
        .space {
            background-color: #fff;
        }
        .player {
            background-color: yellow;
            font-weight: bold;
        }
        .start {
            background-color: green;
            color: white;
            font-weight: bold;
        }
        .exit {
            background-color: red;
            color: white;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Jogo de Labirinto</h1>
    <div class="maze">
        <?php
        // Função para renderizar o labirinto
        function renderizarLabirinto($labirinto, $posicaoJogador) {
            foreach ($labirinto as $linha => $colunas) {
                echo '<div class="row">';
                foreach ($colunas as $coluna => $celula) {
                    $classe = 'cell';
                    switch ($celula) {
                        case '#':
                            $classe .= ' wall';
                            break;
                        case ' ':
                            $classe .= ' space';
                            break;
                        case 'P':
                            $classe .= ' player';
                            break;
                        case 'S':
                            $classe .= ' start';
                            break;
                        case 'E':
                            $classe .= ' exit';
                            break;
                    }
                    echo "<div class='$classe'>$celula</div>";
                }
                echo '</div>';
            }
        }

        // Posição inicial do jogador
        $posicaoInicial = array('linha' => 1, 'coluna' => 1);
        $labirinto[$posicaoInicial['linha']][$posicaoInicial['coluna']] = 'S';

        // Posição da saída
        $posicaoSaida = array('linha' => 4, 'coluna' => 8);
        $labirinto[$posicaoSaida['linha']][$posicaoSaida['coluna']] = 'E';

        // Renderiza o labirinto
        renderizarLabirinto($labirinto, $posicaoInicial);
        ?>
    </div>
</body>
</html>
