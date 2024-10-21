<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cálculo de Média e Desvio Padrão</title>
</head>
<body>
    <h1>Cálculo de Média e Desvio Padrão</h1>
    <form method="GET" action="">
        <label for="numeros">Digite os números (separados por vírgula):</label>
        <input type="text" id="numeros" name="numeros" required>
        <button type="submit">Calcular</button>
    </form>

    <?php
    // Função para calcular a média
    function media($numeros) {
        return array_sum($numeros) / count($numeros);
    }

    // Função para calcular o desvio padrão
    function desvioPadrao($numeros, $media) {
        $soma = 0;
        foreach ($numeros as $numero) {
            $soma += pow($numero - $media, 2);
        }
        return sqrt($soma / count($numeros));
    }

    // Lógica para processar a requisição
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['numeros'])) {
        $entrada = $_GET['numeros'];
        $numeros = array_map('floatval', explode(',', $entrada));
        
        if (count($numeros) > 0) {
            $media = media($numeros);
            $desvio = desvioPadrao($numeros, $media);
            echo "<h2>Média: $media</h2>";
            echo "<h2>Desvio Padrão: $desvio</h2>";
        } else {
            echo "<h2>Por favor, insira pelo menos um número.</h2>";
        }
    }
    ?>
</body>
</html>
