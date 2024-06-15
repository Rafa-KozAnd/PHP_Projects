<?php
// Função para converter XML para JSON
function xmlToJson($xmlString) {
    // Carrega o XML a partir da string
    $xml = simplexml_load_string($xmlString);

    // Converte para JSON
    $json = json_encode($xml);

    return $json;
}

// Exemplo de XML
$xmlString = '<?xml version="1.0" encoding="UTF-8"?>
<data>
    <name>John Doe</name>
    <age>30</age>
    <city>New York</city>
</data>';

// Convertendo XML para JSON
$jsonOutput = xmlToJson($xmlString);

// Exibindo o JSON resultante
echo "JSON resultante:\n";
echo $jsonOutput;
?>
