<?php

// nom, curs, edat, nota_mitjana * 10;
$estudiantes = [
  ['nombre' => 'Pau', 'curso' => 'DAW2', 'edad' => 19, 'nota_media' => 9.6],
  ['nombre' => 'Enric', 'curso' => 'DAW2', 'edad' => 63, 'nota_media' => 4.3],
  ['nombre' => 'Victor', 'curso' => 'DAW2', 'edad' => 20, 'nota_media' => 9.2],
  ['nombre' => 'Oscar', 'curso' => 'DAW2', 'edad' => 19, 'nota_media' => 3],
  ['nombre' => 'Borja', 'curso' => 'DAW2', 'edad' => 30, 'nota_media' => 1],
  ['nombre' => 'Blas', 'curso' => 'ASIX2', 'edad' => 45, 'nota_media' => 2.2],
  ['nombre' => 'Alex', 'curso' => 'DAW2', 'edad' => 20, 'nota_media' => 6.7],
  ['nombre' => 'Genís', 'curso' => 'ASIX2', 'edad' => 19, 'nota_media' => 7.3],
  ['nombre' => 'Arnau', 'curso' => 'DAW2', 'edad' => 19, 'nota_media' => 7.8],
  ['nombre' => 'Eliot', 'curso' => 'ASIX2', 'edad' => 19, 'nota_media' => 5.6],
];

// count — Cuenta todos los elementos de un array o en un objeto Countable
echo '<p>Estudiantes: ' . count($estudiantes) . '</p>';

// in_array — Indica si un valor pertenece a un array
$buscar = 'Blas';

// Recorro cada fila del array para que sea indexado y no asociativo
foreach ($estudiantes as $e) {
  if (in_array($buscar, $e, true)) {
    echo "<p>$buscar existe</p>";
    break;
  }
}

// array_key_exists — Verifica si una clave existe en un array
$columna = 'edad';

if (array_key_exists($columna, $estudiantes[0])) {
  echo "<p>La columna $columna existe en el array 'estudiantes'</p>";
}

// sort — Ordena un array en orden creciente
/*
  He creado una array indexado porque sino, al ordenar una
  fila del array asociativo, luego da error al crear la
  tabla
*/

$frutas = ["Poma", "Pera", "Mandarina", "Enric"];
sort($frutas);
foreach ($frutas as $f) {
  echo $f . " ";
}

echo "<br>";

// rsort — Ordena un array en orden decreciente
rsort($frutas);
foreach ($frutas as $f) {
  echo $f . " ";
}

echo "<br>";

// ksort — Ordena un array según las claves en orden ascendente
$estudiante = $estudiantes[1];
ksort($estudiante);
foreach ($estudiante as $key => $val) {
  echo "$key -> $val, ";
}

echo "<br>";

// array_sum — Calcula la suma de los valores del array
$nums = [6, 7, 2, 3];
echo 'Suma -> ' . array_sum($nums);

echo "<br>";

// max — El valor más grande
echo 'Máximo -> ' . max($nums);

echo "<br>";

// min — El valor más pequeño
echo 'Mínimo -> ' . min($nums);

echo '<br>';

// array_column — Devuelve los valores de una columna de un array de entrada
$nombres = array_column($estudiantes, 'nombre');
print_r($nombres);

echo '<br>';

// implode — Une elementos de un array en un string
echo implode(", ", $frutas);

echo '<br>';

// explode — Divide una string en segmentos
$datos = "pau,19,daw2,polinya,piano";
$datos_separados = explode(",", $datos);
foreach ($datos_separados as $d) {
  echo $d . "<br>";
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tabla estudiantes</title>

  <style>
    table {
      border: 1px solid black;
      border-collapse: collapse;
    }

    table td,
    table th {
      border: 1px solid black;
      padding: 3px 5px;
    }
  </style>
</head>
<body>

  <main>
    <h1>Estudiantes</h1>

    <table>
        <thead>
          <th>Nombre</th>
          <th>Curso</th>
          <th>Edad</th>
          <th>Nota media</th>
        </thead>

        <?php foreach ($estudiantes as $e): ?>
          <tr>
            <td><?= $e['nombre'] ?></td>
            <td><?= $e['curso'] ?></td>
            <td><?= $e['edad'] ?></td>
            <td><?= $e['nota_media'] ?></td>
          </tr>
        <?php endforeach; ?>
    </table>
  </main>

</body>
</html>