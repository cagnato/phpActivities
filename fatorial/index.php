<?php
// Função para calcular o fatorial
function fatorial($n) {
    if ($n < 0) {
        return "Número inválido. O fatorial não está definido para números negativos.";
    }
    if ($n === 0) {
        return 1; // O fatorial de 0 é 1
    }
    $resultado = 1;
    for ($i = 1; $i <= $n; $i++) {
        $resultado *= $i;
    }
    return $resultado;
}

// Lógica para receber e processar a requisição
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['numero'])) {
    $numero = intval($_GET['numero']);
    $resultado = fatorial($numero);
    echo json_encode(['fatorial' => $resultado]);
} else {
    echo json_encode(['error' => 'Por favor, forneça um número.']);
}
?>
