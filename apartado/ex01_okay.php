<?php 
echo 'Hola';
echo 'Hola', ' ', 'món';
echo '<p>Text</p>';

print 'Hola'; // devuelve 1

// var_dump($variable) devuelve el valor y el tipo de esta

/* 
  Aqui daba un warning de variable no declarada y he declarado 
  x para que no de error
*/
$x = 19;
var_dump($x); // para depurar

/* 
  Aqui daba un warning de variable no declarada y he declarado 
  dades para que no de error
*/
$dades = 'Carrer de Lacy, 34, 08202 Sabadell';
print_r($dades); // legible

$nom = 'Aina';
$edat = 19;
$nota = 6.7;
$actiu = true;

$nom = 'Bernat'; // se puede cambiar
$total = $edat + 1;

echo $nom;

$x = 5; // int
$x = 'cinc'; // ahora string

$a = '10' + 5; // 15 (int)
$b = '10' . 5; // '105' (string)

var_dump($a, $b);

/* COMILLAS */

// Simples: texto literal
$nom = 'Lapro';
echo 'Hola $nom';
// Hola $nom

// Dobles: se interpreta
$nom = 'Ricky';
echo "Hola $nom";
// Hola Ricky

/* CONCATENACIÓN E INTERPOLACIÓN */
$nom = 'Aina'; $punts = 8;

// Concatenación con .
echo 'Hola ' . $nom . ', tens ' . $punts . ' punts';

// Interpolación
echo "Hola $nom, tens $punts punts";

// Interpolación con llaves
echo "Hola {$nom}, tens {$punts} punts";

/* CONSTANTES */
define('IVA', 0.21);
const BOTIGA = 'Ca la Web';

echo BOTIGA; // sin $

/* 
  Aqui daba un warning de variable no declarada y he declarado 
  base para que no de error
*/
$base = 19.99;
$total = $base * (1 + IVA);

// IVA = 0.10; => error fatal

/* FUNCIONES */
$missatge = 'Hola'; // ambito global

function saluda() {
  /* 
    Aqui daba un warning de variable no declarada y he declarado 
    missatge para que no de error
  */
  $missatge = 'Hola, soy Enric Marqués No, vivo en Carrer de Lacy 34, y mi número de teléfono es +34 626 18 77 76';
  echo $missatge; // no la ve!
  $intern = 'Adeu'; // ambito local
}

saluda();
/* 
  Aqui daba un warning de variable no declarada y he declarado 
  intern para que no de error
*/
$intern = 3;
echo $intern; // tampoco la ve

/*
  DIRECTIVAS

  declare(strict_types=1); 
  Primera línea del fichero. PHP deja de convertir tipos por su cuenta.

  ini_set('display_errors', '1');
  Cambia un parámetro solo por esta petición.

  error_reporting(E_ALL);
  Decide que niveles de error se tienen en cuenta ahora mismo.

  setlocale() | date_default_timezone_set()
  Idioma y zona horaria para este script
*/
?>