<?php

// Funciones con cadenas de texto (strings)
$cadena = 'Hola';
$cadena[0] = 'C';

echo "Ahora cadena es: $cadena"; // Saldrá Cola en vez de Hola
echo "<br>";

// Funciones preestablecidas de php
// strlen() => medir la longitud de la cadena
$cadena = "Aquesta cadena té moltes lletres";
$num_caracters = strlen($cadena);

echo "El total de carácteres es: $num_caracters";
echo "<br>";

// strpos() => retorna la casella on troba la subcadena
// sempre retorna la primera ocurrencia
$email = "hola@jviladoms.cat";
echo 'Posició @: ' . strpos($email, '@');
echo "<br>";

// strcmp => string compare, compara dos cadenas
// si retorna 0
// si retorna < 0 la primera cadena es mas pequeña
// si retorna > 0 la primera cadena es mas grande

echo 'Utilizamos strcmp: ' . strcmp('Pau', 'Pau');
echo "<br>";

// substr => retorna una subcadena de caracteres de una
// cadena a partir de una posición específica fins al
// final. La cadena original no se modifica

$cadena = 'PHP és un llenguatge fàcil';
echo 'El substr de 0 a 3 es: ' . substr($cadena, 0, 3);
echo "<br>";
echo 'El substr de 21 es: ' . substr($cadena, 21);
echo "<br>";

// trim: eliminar los espacios en blanco y saltos
// de línea al principio y al final

echo 'Ejemplo de trim: ' . trim('        hola que 
tal       ');
echo "<br>";

// ltrim: elimina el principio
echo 'Ejemplo de trim: ' . ltrim('        hola que 
tal       ');
echo "<br>";

// str_replace($antiga, $nova, $cadena)
$cadena = "PHP es facil";
$antiga = "es facil";
$nova = "no es difícil";

echo "Ejemplo con str_replace: " .str_replace($antiga, $nova, $cadena) . "<br>";

//ereg_replace / eregi_replace() 

//strtolower($cadena): pasa la cadena a minusculas
//strtoupper($cadena): pasa la cadena a mayusculas

//explode: permet dividir una cadena segons uncaracter o patro

//ex1: Busca en php.net la funcio str_word_count() y pon un ejemplo
// str_word_count — Cuenta el número de palabras utilizadas en un string
$string = 'Me llamo enric y vivo en Carrer de Lacy 34.';
// Con esto solo cuenta palabras
print_r(str_word_count($string, 1));
echo '<br>';

// Poniendo eso al final cuenta el 34 también como palabra
print_r(str_word_count($string, 1, '34'));
echo '<br>';

//ex2: Busca en php.net la funcio levenshtein() y pon un ejemplo
// levenshtein — Calcula la distancia Levenshtein entre dos strings
/*
  He buscado lo que es levenshtein porque me sonaba chino, lo explico con 
  mis palabras para que veas que lo he hecho yo y soy super aplicado.

  La distancia levenshtein es un número que dicta cuan diferentes son dos
  palabras mirando cual es la cantidad mínima de cambios que hay que hacer
  para llegar de una palabra a otra.

  Por ejemplo:
  const PALABRA = 'manzana';
    1. manzano => manzana
    2. naranjo => maranjo => mananjo => manznjo, sabes?
*/
$palabra_buscar = 'enric';
$palabras_verificar = ['perro', 'victor', 'oscar', 'eric', 'pau'];
$menos_nivel = -1; // Como no tenemos ninguna buscada ponemos -1

foreach ($palabras_verificar as $p) {
  // Calculamos la distancia
  $lev = levenshtein($palabra_buscar, $p);

  // Si el nivel es 0, hemos encontrado la palabra
  if ($lev == 0) {
    $mas_cercana = $p;
    $menos_nivel = 0;

    break; // Salimos del bucle
  }

  // Esto lo hacemos si el nivel es menos al anterior o es la primera ejecución
  if ($lev <= $menos_nivel || $menos_nivel < 0) {
    $mas_cercana = $p;
    $menos_nivel = $lev;
  }
}

echo "Palabra ingresada: $palabra_buscar\n";
if ($menos_nivel == 0) {
    echo "Coincidencia exacta encontrada: $mas_cercana\n";
} else {
    echo "¿Quiso decir: $mas_cercana?\n";
}
echo '<br>';

// He usado el mismo ejemplo que en php.net, pero lo he entendido perfectamente

//ex03: Busca que es un operador ternario y pon un ejemplo
/*
  Un operador ternario es un atajo para escribir un condicional sencillo
  en una sola línea.

  condición a cumplir ? que pasa si se cumple : que pasa si no se cumple;
*/
$edad = 19;
$mayor = $edad >= 18 ? 'Mayor de edad' : 'Menor de edad';
echo $mayor;
echo '<br>';

//ex04: Explicar que hace esta funcion:
/* 
function funcioMultipleReturns($v1, $v2, $v3){
  $v1 = "variable1";
  $v2 = "variable2";
  $v3 = "variable3";
  
  return array($v1, $v2, $v3);
}

Devuelve un array que es esto:
['variable1', 'variable2', 'variable3']
*/

/* 
ex05: Crea una funcion comprova_email(..) que reciba una 
cadena de caracteres como parametro que contine un email 
y hace la siguientes comprobaciones:
  - convertir a minusculas
  - eliminar todos los espacios en blanco
  - comprovar si tiene el caracter @
  - contar el numero de caracteres
*/

function comprova_email($email) {
  // Lo pasamos a minusculas
  $email = strtolower($email);

  // Eliminamos los espacios en blanco
  $email = trim($email);

  // Buscamos el arroba
  $te_arroba = strpos($email, '@') !== false;

  // Contamos los carácteres
  $num_caracters = strlen($email);

  echo "Email normalitzat: $email<br>";
  echo "Té el caràcter @: " . ($te_arroba ? 'Sí' : 'No') . "<br>";
  echo "Nombre de caràcters: $num_caracters<br>";
}

comprova_email('  pAuMediNA@jViladOMS.CAT  ');
comprova_email('  enRICMarques#jviladoms.CT  ');

?>