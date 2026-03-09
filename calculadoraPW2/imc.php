<?php

$peso = 75;
$altura = 1.72;
$result = $peso / ($altura * $altura);

echo ("<h1>IMC CALCULADORA </h1>");
echo ("<h3>Peso: $peso kg </h3>");
echo ("<h3>Altura: $altura </h3>");
echo ("<h1>IMC: <h1>" ) .number_format($result, 2, ",");

if ($result < 18.5){
    echo("<h2>Peso Abaixo da Média</h2>");
} else if($result >= 18.5 && $result <= 25){
    echo("<h2>Peso Ideal</h2>");
} else if ($result > 25){
    echo("<h2>Peso Acima da Média</h2>");
}