<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="filtro.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prova</title>
</head>
<body>
    <h1>Cálculo de Donates/Sub</h1>
    <form method="POST" action="filtro.php">
        <label>Valor Total de Donates </label>
        <input type="text" name="donates" required>

        <label>Número de Subs(Inscrições)</label>
        <input type="text" name="subs" required>

        <label>Plataforma</label>
        <select name="plat" required>
            <option value="youtube">YouTube</option>
            <option value="twitch">Twitch</option>
        </select>

        <button type="submit">Calcular</button>
    </form>

    
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $plat = $_POST['plat'];
        $donates = floatval($_POST['donates']);
        $subs = floatval($_POST['subs']);        

        if($plat == "youtube") {
             $taxa = ($subs * 0.30);
            $nv = $donates - $taxa;
        } else if($plat == "twitch") {
            $taxa = ($subs * 0.5);
            $nv = $donates - $taxa;;
        }

        header("Location: filtro.php?resultado=" . number_format($nv, 2));
    }

    if (isset($_GET["resultado"])) {
    if(floatval($_GET["resultado"]) <= 100) {
        echo "<div><h4>Valor Final: R$" . $_GET["resultado"] . "</h4>";
        echo "<h4>Saldo insuficiente para saque mínimo</h4></div>";
    } else{
        echo "<div><h4>Valor Final: R$" . $_GET["resultado"] . "</h4></div>";
    }
    }
    

?>
</body>
</html>
