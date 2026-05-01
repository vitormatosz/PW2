<?php
require_once 'Livro.php';
session_start();

if (!isset($_SESSION['livros']))
  $_SESSION['livros'] = [];

// Adicionar Livro usando o Construtor
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['titulo'])) {
  $novoLivro = new Livro(
    $_POST['titulo'],
    $_POST['autor'],
    $_POST['ano'],
    $_POST['genero']
  );
  $_SESSION['livros'][] = $novoLivro;
  header("Location: index.php");
  exit;
}

if (isset($_GET['del'])) {
  unset($_SESSION['livros'][$_GET['del']]);
  $_SESSION['livros'] = array_values($_SESSION['livros']);
  header("Location: index.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Biblioteca Técnica</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container py-5">
    <h1>Livros</h1>
    <div class="row">
      <div class="col-md-4">
        <div class="card shadow-sm border-0">
          <div class="card-body">
            <h5 class="card-title mb-4">Novo Registro</h5>
            <form method="POST">
              <div class="mb-2">
                <label class="form-label small">Título</label>
                <input type="text" name="titulo" class="form-control" required>
              </div>
              <div class="mb-2">
                <label class="form-label small">Autor</label>
                <input type="text" name="autor" class="form-control" required>
              </div>
              <div class="row">
                <div class="col-md-6 mb-2">
                  <label class="form-label small">Ano</label>
                  <input type="number" name="ano" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                  <label class="form-label small">Gênero</label>
                  <input type="text" name="genero" class="form-control" required>
                </div>
              </div>
              <button type="submit" class="btn btn-primary w-100">Salvar Livro</button>
            </form>
          </div>
        </div>
      </div>
      <div class="col-md-8">
        <div class="card shadow-sm border-0">
          <div class="table-responsive">
            <table class="table table-hover mb-0">
              <thead class="table-dark">
                <tr>
                  <th>Livro (Ano)</th>
                  <th>Autor</th>
                  <th>Gênero</th>
                  <th class="text-center">Ações</th>
                </tr>
              </thead>
              <tbody>
                <?php if (empty($_SESSION['livros'])): ?>
                  <tr>
                    <td colspan="4" class="text-center py-4 text-muted">Estante vazia</td>
                  </tr>
                <?php endif; ?>
                <?php foreach ($_SESSION['livros'] as $i => $livro): ?>
                  <tr>
                    <td class="align-middle fw-bold"><?= $livro->getDetalhes() ?></td>
                    <td class="align-middle"><?= $livro->getAutor() ?></td>
                    <td class="align-middle"><span class="badge bg-secondary"><?= $livro->getGenero() ?></span></td>
                    <td class="text-center">
                      <a href="?del=<?= $i ?>" class="btn btn-sm btn-danger">Excluir</a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>