<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['vote'])) {
    $vote = $_POST['vote'];
    $file = 'results.txt';

    // Lê os resultados atuais
    $results = file($file, FILE_IGNORE_NEW_LINES);
    $voteCounts = [];

    foreach ($results as $result) {
        list($option, $count) = explode('|', $result);
        $voteCounts[$option] = (int)$count;
    }

    // Incrementa o voto para a opção selecionada
    if (isset($voteCounts[$vote])) {
        $voteCounts[$vote]++;
    }

    // Salva os novos resultados no arquivo
    $newResults = [];
    foreach ($voteCounts as $option => $count) {
        $newResults[] = $option . '|' . $count;
    }
    file_put_contents($file, implode("\n", $newResults));
}

header('Location: index.php');
exit;
?>
