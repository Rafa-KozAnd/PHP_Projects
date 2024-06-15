<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Sistema de Comentários</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        form { margin-bottom: 20px; }
        .comment { border-bottom: 1px solid #ccc; padding: 10px 0; }
        .comment strong { display: block; }
        .comment time { font-size: 0.9em; color: #555; }
    </style>
</head>
<body>
    <h1>Sistema de Comentários</h1>

    <form action="add_comment.php" method="post">
        <label for="name">Nome:</label>
        <input type="text" id="name" name="name" required><br><br>
        <label for="comment">Comentário:</label><br>
        <textarea id="comment" name="comment" rows="4" cols="50" required></textarea><br><br>
        <input type="submit" value="Enviar">
    </form>

    <h2>Comentários</h2>

    <?php
    $file = 'comments.txt';

    if (file_exists($file)) {
        $comments = file($file, FILE_IGNORE_NEW_LINES);

        foreach ($comments as $cmt) {
            list($name, $comment, $timestamp) = explode('|', $cmt);
            echo '<div class="comment">';
            echo '<strong>' . htmlspecialchars($name) . ':</strong>';
            echo '<time>' . date('d/m/Y H:i:s', $timestamp) . '</time>';
            echo '<p>' . nl2br(htmlspecialchars($comment)) . '</p>';
            echo '</div>';
        }
    } else {
        echo 'Nenhum comentário ainda.';
    }
    ?>
</body>
</html>
