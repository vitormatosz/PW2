<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de XP</title>
</head>
<body>
    <form method="POST" action="calxp.php">
        <label>Nível Atual</label>
        <input type="text" name="nivel">

        <label>Xp Acumulado</label>
        <input type="text" name="acumu">

        <label>Dificuldade de Missão</label>
        <input type="text" name="dificul" placeholder="Ex: Fácil, Média ou Difícil">

        <button type="submit">Calcular</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $difi = $_POST['dificul'];
        $acumu = $_POST['acumu'];
        $nvatual = $_POST['nivel'];
        $vbase = 100;

        $xptotal += $vbase;

        if(($difi) == "media") {
            $xp = $xptotal * 1.5;
            $xptotal += $xp;
        } else if(($difi) == "dificil") {
            $xp = $xptotal * 2;
            $xptotal += $xp;
        }

        if(floatval($xptotal) >= 1000) {
            $nivelnovo = "Parabéns você subiu para o nível ". (floatval($nvatual) + 1);
        }

        header("Location: calcxp.php?xp=" . number_format($xptotal, 2)) . "&nivel=" . $nvatual;
    }

    ?>
</body>
</html>