<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teste</title>
</head>
<body>

<h2> Média do aluno </h2>
    <form method="POST" action="teste.php">
        <label>Nome: </label><br>
        <input type="text" name="nome" placeholder="Ex: João">

        <label>Nota 1:</label><br>
        <input type="text" name="nota1" placeholder="Ex: 10">

        <label>Nota 2:</label><br>
        <input type="text" name="nota2" placeholder="Ex: 10">

        <label>Nota 3:</label><br>
        <input type="text" name="nota3" placeholder="Ex: 10">

        <button type="submit">Calcular Agora</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nome = $_POST['nome'];
        $nota1 = $_POST['nota1'];
        $nota2 = $_POST['nota2'];
        $nota3 = $_POST['nota3'];
        $md = (floatval($nota1) + floatval($nota2) + floatval($nota3)) / 3;

        if($md >= 7) {
            $situacao = "Aprovado";
        } else if ($md >= 5 && $md <= 6.9) {
            $situacao = "Recuperação";
        } else if ($md < 5){
            $situacao = "Reprovado";
        }


    header("Location: teste.php?nome=" . $nome . "&media=" . number_format($md,  1) . "&situacao=" . $situacao);

    }

     if (isset($_GET['nome'])) {
    echo "<h3>Nome do Aluno: " . $_GET['nome'] . "</h3>";
    echo "<h3>Média: " . $_GET['media'] . "</h3>";
    echo "<h3>Situacao: " . $_GET['situacao'] . "</h3>";
  }

    

    ?>
</body>
</html>