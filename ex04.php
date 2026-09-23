<?php
/*****************************************
 * Aquest fitxer te 6 errors: 3 de sintaxi (PHP no arrenca)
 * i 3 de lógica (funciona, pero el resultat 
 * no es el correcte)
 *
 * Arreglal's d'un en un, comprovant la pagina desrpés de
 * cada canvi.
 * Anota a error-trobats.md quin era, com te n'has adonat
 * i com l'has resolt
 ****************************************/

// Error 1: nom = 'Aina'; faltaba el $
$nom = 'Aina';
// Error 2: $assignatura = 'Desenvolupament web' Faltaba el ;
$assignatura = 'Desenvolupament web';

$nota1 = 7;
$nota2 = 9;
// Error 3: $mitjana = $nota1 + $nota2 / 2; Falten els parentesis perque sino es fa la divisió primer
$mitjana = ($nota1 + $nota2) / 2;

echo '<h1>Butlleti de notes</h1>';
// Error 4: echo '<p>Alumna: $nom</p>'; Han de ser comilles dobles
echo "<p>Alumna: $nom</p>";
// Error 5: echo '<p>Assignatura: ' + $assignatura + '</p>'; Han de ser punts
echo '<p>Assignatura: ' . $assignatura . '</p>';
// Error 6: echo "<p>Mitjana: $nom</p>; Falta la comilla doble al final
echo "<p>Mitjana: $mitjana</p>";

echo '<p>Generat el ' . date('d/m/Y') . '</p>';
