<?php

// Funciones preestablecidas de php

// isset() => Permite sabes si una variable 
// existe en nuestro programa

$var = "10";

if (isset($var)) {
  echo "La variable $var existe";
}

// unset() => Liberar espacio en memoria 
// (destruir) una variable

unset($var);

if (isset($var)) {
  echo "La variable $var existe";
} else {
  echo "La variable $var no existe";
}

echo '<br>';
echo '<br>';

// gettype() => Nos retorna el tipo de variable
// que pasamos por parámetro

// settype() => Asignamos un tipo de dato a la
// variable que pasamos por parámetro

// empty() => Función que mira si una variable
// está vacía, no existe o su valor es 0

// is_integer(), is_double(), is_array(), 
// is_string() => Para saber si una variable es
// integer, double, string, array, etc.

// Ex1: for para la tabla de multiplicar del 5
// var existe?
$num = 5;

if (isset($num)) {
  for ($i = 1; $i <= 10; $i++) {
    echo "$num x $i = " . $num * $i;
    echo '<br>';
  }
} else {
  echo 'La variable $num no existe';
}

echo '<br>';
echo '<br>';

// Ex2: mostrar los números pares del 1 al 1000
for ($i = 1; $i <= 1000; $i++) {
  if ($i % 2 == 0) {
    echo "$i, ";
  }
}

echo '<br>';
echo '<br>';

// Ex3: dibuja una tabla html donde salgan
// las tablas de multiplicar del 1 al 10

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tablas de multiplicar</title>
</head>
<body>

  <table>
    <?php

      for ($i = 1; $i <= 10; $i++) {
        echo '<thead>';
        echo "<th colspan='2'>Tabla del $i</th>";
        echo '</thead>';
        for ($j = 1; $j <= 10; $j++) {
          echo '<tr>';
          echo "<td>$i x $j</td>";
          echo '<td>' . $i*$j . '</td>';
          echo '</tr>';
        }
      }

    ?>
  </table>

</body>
</html>