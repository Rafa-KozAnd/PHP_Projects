<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name']);
    $comment = trim($_POST['comment']);
    $timestamp = time();

    if (!empty($name) && !empty($comment)) {
        $entry = htmlspecialchars($name) . '|' . htmlspecialchars($comment) . '|' . $timestamp . PHP_EOL;
        file_put_contents('comments.txt', $entry, FILE_APPEND);
    }
}

header('Location: index.php');
exit;
?>
