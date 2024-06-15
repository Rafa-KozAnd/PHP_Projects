<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reprodutor de Música</title>
</head>
<body>
    <h2>Reproduzindo Música</h2>

    <?php
    // Verifica se o parâmetro 'music' foi passado na query string
    if (isset($_GET['music'])) {
        $musicName = $_GET['music'];
        $musicPath = 'music/' . $musicName;

        // Verifica se o arquivo de música existe
        if (file_exists($musicPath)) {
            echo "<p>Reproduzindo: {$musicName}</p>";
            echo "<audio controls autoplay><source src='{$musicPath}' type='audio/mpeg'></audio>";
        } else {
            echo "<p>Música não encontrada.</p>";
        }
    } else {
        echo "<p>Nenhuma música selecionada.</p>";
    }
    ?>

    <p><a href="index.php">Voltar para a lista de músicas</a></p>
</body>
</html>
