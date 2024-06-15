<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Gerador de Lorem Ipsum</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        form { margin-bottom: 20px; }
        .lorem { margin-top: 20px; padding: 10px; border: 1px solid #ccc; background: #f9f9f9; }
    </style>
</head>
<body>
    <h1>Gerador de Lorem Ipsum</h1>

    <form action="" method="post">
        <label for="paragraphs">Número de Parágrafos:</label>
        <input type="number" id="paragraphs" name="paragraphs" min="1" max="10" value="1" required>
        <input type="submit" value="Gerar">
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $paragraphs = (int)$_POST['paragraphs'];
        
        // Texto Lorem Ipsum padrão
        $loremIpsum = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.";

        echo '<div class="lorem">';
        for ($i = 0; $i < $paragraphs; $i++) {
            echo '<p>' . $loremIpsum . '</p>';
        }
        echo '</div>';
    }
    ?>
</body>
</html>
