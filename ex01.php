<?php 
echo 'Hola';
echo 'Hola', ' ', 'món';
echo '<p>Text</p>';

print 'Hola'; // devuelve 1

// var_dump($variable) devuelve el valor y el tipo de esta
var_dump($x); // para depurar
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
$total = $base * (1 + IVA);

// IVA = 0.10; => error fatal

/* FUNCIONES */
$missatge = 'Hola'; // ambito global

function saluda() {
  echo $missatge; // no la ve!
  $intern = 'Adeu'; // ambito local
}

saluda();
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