<?php
declare(strict_types=1);

require_once 'Musica.php';
require_once 'Playlist.php';

// 1. Instanciar a Playlist passando o nome e a subpasta de músicas
$minhaPlaylist = new Playlist("Favoritas", "musicas");

/**
 * PASSO 1: Instanciar objetos Musica manualmente
 * Importante: O nome do ficheiro deve existir na pasta /nome-da-pasta-com-as-musicas
 */
$musica1 = new Musica("Domingas", "Jorge Ben Jor", "Jorge Ben", "Domingas-jorgeBen.mp3");

$musica2 = new Musica("Amanhecer", "BK'", "Icarus", "amanhecer-BK.mp3");

$musica3 = new Musica("Giz", "Sotam", "Fique o tempo que precisar", "Giz-Sotam.mp3");

/**
 * PASSO 2: Adicionar as instâncias à Playlist através do método adicionar()
 */
$minhaPlaylist->adicionar($musica1);
$minhaPlaylist->adicionar($musica2);
$minhaPlaylist->adicionar($musica3);

// PASSO 3: Recuperar a lista para exibição
$musicasParaExibir = $minhaPlaylist->getMusicas();
?>

<!DOCTYPE html>
<html lang="pt-pt">

<head>
  <meta charset="UTF-8">
  <title>Player POO - Atividade Prática</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
  <style>
    body {
      background: #121212;
      color: #eee;
      font-family: sans-serif;
    }

    .card {
      background: #181818;
      border: 1px solid #282828;
    }

    .list-group-item {
      background: #181818;
      color: #eee;
      border-color: #282828;
      cursor: pointer;
      transition: 0.3s;
    }

    .list-group-item:hover {
      background: #282828;
    }

    .playing {
      background-color: #1DB954 !important;
      color: white !important;
    }

    audio {
      filter: invert(100%) hue-rotate(80deg) brightness(1.5);
      width: 100%;
    }
  </style>
</head>

<body>

  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-md-6">

        <div class="card shadow-lg">
          <div class="card-body text-center py-4">
            <h2 class="h5 text-uppercase tracking-wider opacity-75 text-light"><?= $minhaPlaylist->getNome() ?></h2>

            <div class="my-4">
              <i class="bi bi-disc-fill display-1 text-success"></i>
            </div>

            <audio id="audioPlayer" controls>
              <source id="srcPlayer" src="" type="audio/mpeg">
            </audio>
          </div>

          <div class="list-group list-group-flush">
            <?php if (empty($musicasParaExibir)): ?>
            <div class="p-4 text-center text-muted">Nenhuma música adicionada à playlist.</div>
            <?php endif; ?>

            <?php foreach ($musicasParaExibir as $musica): ?>
            <button class="list-group-item list-group-item-action d-flex justify-content-between align-items-center"
              onclick="tocar('<?= $minhaPlaylist->getCaminhoPasta() . '/' . $musica->getArquivo() ?>', this)">
              <div>
                <i class="bi bi-play-fill me-2"></i>
                <strong><?= $musica->getTitulo() ?></strong><br>
                <small class="opacity-50"><?= $musica->getArtista() ?> • <?= $musica->getAlbum() ?></small>
              </div>
            </button>
            <?php endforeach; ?>
          </div>
        </div>

        <div class="mt-3 text-center small text-muted">
          <p>Aula 12: Membros da Classe e uso do <code>$this</code></p>
        </div>
      </div>
    </div>
  </div>

  <script>
    function tocar(caminhoCompleto, botao) {
      const player = document.getElementById('audioPlayer');
      const source = document.getElementById('srcPlayer');

      // Atualiza a fonte e carrega
      source.src = caminhoCompleto;

      // Estilo visual
      document.querySelectorAll('.list-group-item').forEach(el => el.classList.remove('playing'));
      botao.classList.add('playing');

      player.load();
      player.play();
    }
  </script>

</body>

</html>