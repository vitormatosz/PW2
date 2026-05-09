<?php
declare(strict_types=1);

// --- 1. LÓGICA DE PROCESSAMENTO ---
$erros = [];
$sucesso = false;

// Variáveis para persistência e exibição segura
$nome = $email = $idade = $website = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    /**
     * TODO: SANITIZAÇÃO
     * Utilize filter_input para capturar e limpar o 'nome' e o 'email'.
     * Dica: Use FILTER_SANITIZE_SPECIAL_CHARS e FILTER_SANITIZE_EMAIL.
     */
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS); // Implementar aqui
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    ; // Implementar aqui

    /**
     * TODO: VALIDAÇÃO DE E-MAIL
     * Verifique se o e-mail sanitizado acima é um formato válido.
     * Se for inválido, adicione a mensagem "E-mail inválido" ao array $erros.
     */
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);


    if ($email === false) {
        $erros[] = "E-mail inválido!";
    }

    /**
     * TODO: VALIDAÇÃO DE IDADE (INTERVALO)
     * Utilize filter_input com FILTER_VALIDATE_INT e o array de 'options'.
     * A regra é: idade mínima 18 e máxima 60.
     */
    $opcoes_idade = [
        "options" => [
            "min_range" => 18,
            "max_range" => 60
        ]
    ]; // Definir o range aqui
    $idade_validada = filter_input(INPUT_POST, 'idade', FILTER_VALIDATE_INT, $opcoes_idade);
    ; // Implementar filter_input aqui

    if ($idade_validada === false || $idade_validada === null) {
        $erros[] = "A idade deve estar entre 18 e 60 anos.";
    } else {
        $idade = (string) $idade_validada;
    }

    /**
     * TODO: VALIDAÇÃO DE URL
     * Verifique se o campo 'website' é uma URL válida.
     */

    $website = filter_input(INPUT_POST, 'website', FILTER_VALIDATE_URL);

    // Lógica de decisão: Se o array de erros estiver vazio, mude $sucesso para true.
    if (empty($erros)) {
        $sucesso = true;
    }

} else {
    // Bloqueio de acesso direto
    header("Location: ./aula07/index.html");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Resultado do Cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-7">

                <?php if ($sucesso): ?>
                    <!-- TODO: EXIBIÇÃO DE SUCESSO -->
                    <div class="alert alert-success shadow border-0 p-4">
                        <h4 class="alert-heading fw-bold">Cadastro Realizado!</h4>
                        <hr>
                        <ul class="list-unstyled mb-0">
                            <!-- TODO: Exibir Nome, Email, Idade e Website aqui -->
                            <!-- Dica: Use htmlspecialchars() para exibir strings com segurança. -->

                            <li>Nome: <?= htmlspecialchars($nome) ?></li>
                            <li>Email: <?= htmlspecialchars($email) ?></li>
                            <li>Idade: <?= htmlspecialchars($idade) ?></li>
                            <li>Website: <?= htmlspecialchars($website) ?></li>
                        </ul>
                    </div>
                    <a href="index.html" class="btn btn-primary mt-3">Novo Cadastro</a>

                <?php else: ?>
                    <!-- TODO: EXIBIÇÃO DE ERROS -->
                    <div class="alert alert-danger shadow border-0 p-4">
                        <h4 class="alert-heading fw-bold">Erros Encontrados</h4>
                        <ul class="mt-2">
                            <!-- TODO: Criar um foreach para listar as mensagens do array $erros. -->
                            <?php foreach ($erros as $erro): ?>
                                <li><?= htmlspecialchars($erro) ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <hr>
                        <a href="javascript:history.back()" class="btn btn-outline-danger">Voltar ao Formulário</a>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>

</body>

</html>