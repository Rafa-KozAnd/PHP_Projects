<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Contador de Visitas</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; margin-top: 50px; }
        .counter { font-size: 2em; }
    </style>
</head>
<body>
    <h1>Bem-vindo!</h1>

    <?php
    $file = 'counter.txt';

    // Verifica se o arquivo existe, caso contrário, cria um com valor inicial de 0
    if (!file_exists($file)) {
        file_put_contents($file, '0');
    }

    // Lê o valor atual do contador
    $counter = (int)file_get_contents($file);

    // Incrementa o contador
    $counter++;

    // Salva o novo valor no arquivo
    file_put_contents($file, $counter);

    // Exibe o contador
    echo '<p class="counter">Número de visitas: ' . $counter . '</p>';
    ?>
</body>
</html>
