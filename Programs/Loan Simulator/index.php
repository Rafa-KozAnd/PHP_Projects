<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simulador de Empréstimos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        input[type="text"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .result {
            margin-top: 20px;
            padding: 10px;
            background-color: #f0f0f0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Simulador de Empréstimos</h2>
        <form action="" method="post">
            <div class="form-group">
                <label for="loan_amount">Montante do Empréstimo (R$):</label>
                <input type="text" id="loan_amount" name="loan_amount" required>
            </div>
            <div class="form-group">
                <label for="annual_interest_rate">Taxa de Juros Anual (%):</label>
                <input type="text" id="annual_interest_rate" name="annual_interest_rate" required>
            </div>
            <div class="form-group">
                <label for="loan_term">Número de Meses:</label>
                <input type="text" id="loan_term" name="loan_term" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Simular Empréstimo">
            </div>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Obtém os valores do formulário
            $loan_amount = $_POST['loan_amount'];
            $annual_interest_rate = $_POST['annual_interest_rate'];
            $loan_term = $_POST['loan_term'];

            // Calcula a taxa de juros mensal e o pagamento mensal
            $monthly_interest_rate = $annual_interest_rate / 100 / 12;
            $monthly_payment = $loan_amount * $monthly_interest_rate / (1 - pow(1 + $monthly_interest_rate, -$loan_term));

            // Formata o pagamento mensal para exibir com duas casas decimais
            $monthly_payment_formatted = number_format($monthly_payment, 2, ',', '.');

            // Exibe o resultado
            echo "<div class='result'>";
            echo "<h3>Resultado da Simulação</h3>";
            echo "<p>Montante do Empréstimo: R$ " . number_format($loan_amount, 2, ',', '.') . "</p>";
            echo "<p>Taxa de Juros Anual: " . $annual_interest_rate . "%</p>";
            echo "<p>Número de Meses: " . $loan_term . "</p>";
            echo "<p>Pagamento Mensal Estimado: R$ " . $monthly_payment_formatted . "</p>";
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>
