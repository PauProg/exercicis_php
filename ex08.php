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