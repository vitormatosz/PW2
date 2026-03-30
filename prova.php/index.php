<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prova</title>
</head>
<body>
    <h1>Calculo de Frete</h1>
    <form method="POST" action="index.php">
        <label>Quilometro(km)</label>
        <input type="text" name="km" >

        <label>Peso(kg)</label>
        <input type="text" name="peso" >

        <label>Tipo de Envio</label>
        <input type="text" name="envio" placeholder="Ex: Normal ou Expresso">

        <button type="submit">Calcular</button>
    </form>


    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $km = $_POST['km'];
        $peso = $_POST['peso'];
        $envio = $_POST['envio'];
        $vbase = 10;

        $kmrod = (floatval($km) * 0.50);
        
        $vt = $vbase + $kmrod;

        if(floatval($peso) >= 20) {
            (float) $vt += 30;
        }

        if($envio == "expresso") {
            $adicional = (floatval($vt) * 0.20);
            floatval($vt += $adicional);
        }

        header("Location: index.php?resultado=" . number_format($vt, 2));
    }
        echo "<div><h4>Valor do Frete: R$" . $_GET['resultado'] . "</h4></div>";

    ?>
</body>
</html>