<?php

$nota1 = 10;
$nota2 = 7;
$nota3 = 9;
$nota4 = 6;

$media = ($nota1+$nota2+$nota3+$nota4)/4;

if($media >= 7){
    echo("Suas notas são: $nota1 , $nota2 , $nota3 , $nota4 .<br>");
    echo("Sua media é: $media .<br>");
    echo("<b><h2>Você passou de ano.<br>");
}
else if($media >= 5 && $media <= 6.9){
    echo("Suas notas são: $nota1 , $nota2 , $nota3 , $nota4 .<br>");
    echo("Sua media é: $media .<br>");
    echo("<b><h2>Você está de recuperação.<br>");
}
else{
    echo("Suas notas são: $nota1 , $nota2 , $nota3 , $nota4 .<br>");
    echo("Sua media é: $media .<br>");
    echo("<b><h2>Você está reprovado.<br>");
}