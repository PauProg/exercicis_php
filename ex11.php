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

//ex2: Busca en php.net la funcio levenshtein() y pon un ejemplo

//ex03: Busca que e sun operador ternario y pon un ejemplo

//ex04: Explicar que hace esta funcion:
/* 
function funcioMultipleReturns($v1, $v2, $v3){
  $v1 = "variable1";
  $v2 = "variable2";
  $v3 = "variable3";
  
  return array($v1, $v2, $v3);
}

*/

//ex05: Crea una funcion comprova_email(..) que reciba una cadena de caracteres como parametro que contine un email y hace la siguientes comprobaciones:
// - convertir a minusculas
// - eliminar todos los espacios en blanco
// - comprovar si tiene el caracter @
// - contar el numero de caracteres
?>