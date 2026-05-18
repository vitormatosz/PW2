<?php
declare(strict_types=1);

class Playlist {
    // TODO: Criar atributos privados, definir construtor, métodos e Getters utilizados no index.php

    private string $nome;
    private string $caminhoPasta;

    private array $musicas = [];
    public function __construct(String $nome, string $caminhoPasta) {
       $this->nome = $nome;
       $this->caminhoPasta = $caminhoPasta;
    }

    public function adicionar(Musica $musica) {
        $this->musicas[] = $musica;
    }

    public function getNome(): string {
        return $this->nome;
    }

    public function getCaminhoPasta(): string {
        return $this->caminhoPasta;
    }

    public function getMusicas(): array
    {
        return $this->musicas;
    }
}