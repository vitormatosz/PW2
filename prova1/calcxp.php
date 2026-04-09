<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $difi = $_POST['dificul'];
    $acumu = $_POST['xp'];
    $nvatual = $_POST['nivel'];
    $vbase = 100;

    $xptotal = $acumu + $vbase;

    if (($difi) == "m") {
        $xp = $xptotal * 1.5;
        $xptotal += $xp;
    } else if (($difi) == "d") {
        $xp = $xptotal * 2;
        $xptotal += $xp;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="calcxp.css">
    <title>Calculadora de XP</title>
</head>

<body>
    <h1>Calculador de XP</h1>
    <form method="POST" action="calcxp.php">
        <label>Nível Atual</label>
        <input type="text" name="nivel" required>

        <label>Xp Acumulado</label>
        <input type="text" name="xp" required>

        <label>Dificuldade de Missão</label>

        <div class="escolha">

            <label class="opcao">
                <input type="radio" name="dificul" value="f" required>
                <label class="lrad">Fácil</label>
                <br>
            </label>

            <label class="opcao">
                <input type="radio" name="dificul" value="m" required>
                <label  class="lrad">Médio</label>
                <br>
            </label>

            <label class="opcao">
                <input type="radio" name="dificul" value="d" required>
                <label  class="lrad">Díficil</label>
                <br>
            </label>

        </div>

        <button type="submit">Calcular</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (floatval($xptotal) >= 1000) {
            $nvnovo = (floatval($nvatual) + 1);
            echo "<div><h4>Parabéns você subiu para o nível " . $nvnovo . "</h4>";
            echo "<h4>XP Total:" . $xptotal . "</h4></div>";
        } else {
            echo "<div><h4>XP Total:" . $xptotal . "</h4>";
            echo "<h4>Nivel:" . $nvatual . "</h4></div>";
        }
    }
    ?>

</body>

</html>