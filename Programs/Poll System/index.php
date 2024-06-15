<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Sistema de Enquetes</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        form { margin-bottom: 20px; }
        .results { margin-top: 20px; padding: 10px; border: 1px solid #ccc; background: #f9f9f9; }
    </style>
</head>
<body>
    <h1>Enquete: Qual sua linguagem de programação favorita?</h1>

    <form action="vote.php" method="post">
        <label><input type="radio" name="vote" value="PHP" required> PHP</label><br>
        <label><input type="radio" name="vote" value="JavaScript"> JavaScript</label><br>
        <label><input type="radio" name="vote" value="Python"> Python</label><br>
        <label><input type="radio" name="vote" value="Java"> Java</label><br><br>
        <input type="submit" value="Votar">
    </form>

    <h2>Resultados</h2>

    <?php
    $file = 'results.txt';

    // Inicializa os resultados se o arquivo não existir
    if (!file_exists($file)) {
        $initial_results = ["PHP|0", "JavaScript|0", "Python|0", "Java|0"];
        file_put_contents($file, implode("\n", $initial_results));
    }

    // Lê os resultados do arquivo
    $results = file($file, FILE_IGNORE_NEW_LINES);
    $totalVotes = 0;
    $voteCounts = [];

    foreach ($results as $result) {
        list($option, $count) = explode('|', $result);
        $voteCounts[$option] = (int)$count;
        $totalVotes += (int)$count;
    }

    // Exibe os resultados
    echo '<div class="results">';
    foreach ($voteCounts as $option => $count) {
        $percentage = $totalVotes ? ($count / $totalVotes) * 100 : 0;
        echo '<p>' . htmlspecialchars($option) . ': ' . $count . ' votos (' . number_format($percentage, 2) . '%)</p>';
    }
    echo '</div>';
    ?>
</body>
</html>
