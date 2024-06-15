<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Livro de Visitas</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        form { margin-bottom: 20px; }
        .message { border-bottom: 1px solid #ccc; padding: 10px 0; }
    </style>
</head>
<body>
    <h1>Livro de Visitas</h1>

    <form action="add_message.php" method="post">
        <label for="name">Nome:</label>
        <input
        type="text" id="name" name="name" required><br><br>
        <label for="message">Mensagem:</label><br>
        <textarea id="message" name="message" rows="4" cols="50" required></textarea><br><br>
        <input type="submit" value="Enviar">
    </form>

    <h2>Mensagens</h2>

    <?php
    $file = 'messages.txt';

    if (file_exists($file)) {
        $messages = file($file, FILE_IGNORE_NEW_LINES);

        foreach ($messages as $msg) {
            list($name, $message) = explode('|', $msg);
            echo '<div class="message">';
            echo '<strong>' . htmlspecialchars($name) . ':</strong><br>';
            echo nl2br(htmlspecialchars($message));
            echo '</div>';
        }
    } else {
        echo 'Nenhuma mensagem ainda.';
    }
    ?>
</body>
</html>
