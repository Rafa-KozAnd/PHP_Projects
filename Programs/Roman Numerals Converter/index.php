<?php
// Função para converter número romano para número arábico
function romanToArabic($roman) {
    // Tabela de conversão de números romanos para arábicos
    $romans = array(
        'I' => 1,
        'V' => 5,
        'X' => 10,
        'L' => 50,
        'C' => 100,
        'D' => 500,
        'M' => 1000
    );

    $arabic = 0;
    $lastValue = 0;

    // Percorre cada caractere do número romano da direita para a esquerda
    for ($i = strlen($roman) - 1; $i >= 0; $i--) {
        $currentValue = $romans[$roman[$i]];

        // Verifica se precisamos subtrair (ex: IV, IX, XL, XC, etc)
        if ($currentValue < $lastValue) {
            $arabic -= $currentValue;
        } else {
            $arabic += $currentValue;
        }

        // Atualiza o último valor
        $lastValue = $currentValue;
    }

    return $arabic;
}

// Exemplo de uso:
$romanNumber = 'XXIV'; // Número romano a ser convertido
$arabicNumber = romanToArabic($romanNumber);

echo "Número Romano: $romanNumber<br>";
echo "Número Arábico: $arabicNumber<br>";
?>
