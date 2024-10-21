<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora da Sequência de Fibonacci</title>
</head>
<body>
    <h1>Calculadora da Sequência de Fibonacci</h1>
    <form method="GET" action="">
        <label for="numero">Digite um número:</label>
        <input type="number" id="numero" name="numero" required>
        <button type="submit">Calcular Fibonacci</button>
    </form>

    <?php
    // Função para calcular a sequência de Fibonacci
    function fibonacci($n) {
        if ($n < 0) {
            return "Número inválido. Por favor, insira um número não negativo.";
        }
        $sequencia = [];
        $a = 0;
        $b = 1;
        for ($i = 0; $i < $n; $i++) {
            $sequencia[] = $a;
            $temp = $a;
            $a = $b;
            $b = $temp + $b;
        }
        return $sequencia;
    }

    // Lógica para processar a requisição
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['numero'])) {
        $numero = intval($_GET['numero']);
        $resultado = fibonacci($numero);
        
        if (is_array($resultado)) {
            echo "<h2>Sequência de Fibonacci até $numero termos:</h2>";
            echo implode(", ", $resultado);
        } else {
            echo "<h2>$resultado</h2>";
        }
    }
    ?>
</body>
</html>
