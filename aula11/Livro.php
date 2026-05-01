<?php
 class Livro{

 public function __construct(
    private $titulo,
    private $autor, 
    private $ano,
    private $genero
 ) {}

 public function getDetalhes(): string {
        return "{$this->titulo} ({$this->ano})";
    }

 public function getAutor(): String{
    return $this->autor;
 }

 public function getGenero(): String{
    return $this->genero;
 }
 

}

?>