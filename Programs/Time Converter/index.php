<?php
function converterTempo($segundos) {
    // Calcula horas, minutos e segundos
    $horas = floor($segundos / 3600);
    $segundos %= 3600;
    $minutos = floor($segundos / 60);
    $segundos %= 60;

    // Formata o resultado
    $resultado = sprintf('%02d:%02d:%02d', $horas, $minutos, $segundos);
    
    return $resultado;
}

// Exemplos de uso:
$tempo1 = 3661; // 1 hora, 1 minuto e 1 segundo
$tempo2 = 12345; // 3 horas, 25 minutos e 45 segundos

echo "Tempo 1: " . converterTempo($tempo1) . "<br>";
echo "Tempo 2: " . converterTempo($tempo2) . "<br>";
?>
