<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="desconto.css">
    <title>Desconto</title>
</head>
<body>
    <h1>Cálculo de Desconto</h1>

    <div class="formu">
        <form method="POST" action="desconto.php">

        <label>Valor da Compra</label>
        <input type="text" name="valor" required>

        <label>Código do Cupom</label>
        <input type="text" name="cupom" placeholder="Ex: AMIGAO10" required>

        <button type="submit">Calcular</button>
    </form>
    </div>
    

    <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $vl = floatval($_POST['valor']);
            $vfixo = floatval($_POST['valor']);
            $cp = $_POST['cupom'];

            if ($vl > 500.00) {
                $desc += ($vl * 0.1);
            }
            if ($cp == "AMIGAO10") {
                $desc += 10.00;
            }

            $vl = ($vfixo - $desc);

            header("Location: desconto.php?vlfixo=" . number_format($vfixo, 2) . "&desconto=" . number_format($desc, 2) . "&vfinal=" . number_format($vl, 2));
        }

        if(isset($_GET['vlfixo'])){
            echo "<div><h4>Valor Original: R$ ".$_GET['vlfixo']. "</h4>";
            echo "<h4>Desconto Aplicado: R$ ".$_GET['desconto']. "</h4>";
            echo "<h4>Valor Final: R$ ".$_GET['vfinal']. "</h4></div>";
        }
    ?>
</body>
</html>