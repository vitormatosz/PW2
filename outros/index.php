<?php
$produtos = [
    ["produto" => "Mouse Gamer", "preco" => 150.00],
    ["produto" => "Teclado Mecanico", "preco" => 350.00],
    ["produto" => "Monitor 144hz", "preco" => 1200.00],
    ["produto" => "Headset 7.1", "preco" => 280.00]
];

foreach ($produtos as $key => $produto) {
    $ordem = ($key +1);
    echo "<p>$ordem - {$produto['produto']}: R$ {$produto['preco']}</p>";
}
