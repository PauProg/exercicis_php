<?php

$nota = 7.5;

/*
Si la condición es muy larga, la podemos guardar en una
variable como $puedeComprar que sea Bool
*/

if ($nota >= 9) {
  $qualif = 'Excel·lent';
} elseif ($nota >= 7) {
  $qualif = 'Notable';
} elseif ($nota >= 5) {
  $qualif = 'Aprovat';
} else {
  $qualif = 'Suspés';
}

$zona = 'local';

// switch - clasico
switch ($zona) {
  case 'local':
    $enviament = 0;
    break;
  case 'peninsula':
    $enviament = 4.95;
    break;
  default:
    $enviament = 9.95;
}

// match - PHP8
/* 
  IMPORTANTE acabar en coma y poner ; al final ya que 
  estás asignando una variable
*/

$enviament = match ($zona) {
  'local'     => 0,
  'peninsula' => 4.95,
  default     => 9.95,
};

// for
for ($i = 1; $i <= 10; $i++) {
  echo $i;
}

$saldo = 100;
$objectiu = 300;
$anys = 1;

// while
while ($saldo < $objectiu) {
  $saldo *= 1.03;
  $anys++;
}

// do-while
do {
  $n = rand(1, 6);
} while ($n !== 6);

// arrays
$colors = ['vermell', 'verd', 'blau'];

echo $colors[0];      // vermell
echo count($colors);  // 3

$colors[] = 'groc';   // añade al final

print_r($colors);

// arrays asociativos
$producte = [
  'nom'   => 'Teclat mecanic',
  'preu'  => 79.90,
  'estoc' => 4,
];

echo $producte['nom'];
$producte['preu'] = 69.90;

// Solo los valores
foreach ($colors as $color) {
  echo "<li>$color</li>";
}

// Clave y valor
foreach ($producte as $clau => $valor) {
  echo "<dt>$clau</dt>";
  echo "<dd>$valor</dd>";
}

$productes = [
  ['nom' => 'Teclat', 'preu' => 79.9],
  ['nom' => 'Ratolí', 'preu' => 24.5],
  ['nom' => 'Monitor', 'preu' => 189],
];

/* 
  Funciones de arrays
  count($a)                   | Cuantos elementos tiene
  in_array($x, $a, true)      | Si hay un valor (el true hace la comparación estricta)
  array_key_exists('k', $a)   | Si una llave existe
  sort / rsort / ksort        | Ordena por valor o por clave
  array_sum / max / min       | Suma, máximo y mínimo
  array_column($a, 'preu')    | Saca una columna de un array de arrays
  implode(', ', $a) / explode | Array a texto y texto a array
*/

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  
  <table>
    <?php foreach ($productes as $p): ?>
      <tr>
        <td><?= $p['nom'] ?></td>
        <td><?= $p['preu'] ?> EUR</td>
      </tr>
    <?php endforeach; ?>
  </table>

  <?php
    $estoc = 3;
  ?>

  <!-- 
  if (...): ... endif;        foreach (...): ... endforeach;
  for (...): ... endfor;      while (...): ... endwhile;
  -->

  <!-- if con llaves -->
  <?php if ($estoc > 0) { ?>
    <p>En estoc</p>
  <?php } else { ?>
    <p>Esgotat</p>
  <?php } ?>

  <!-- if con dos puntos -->
  <?php if ($estoc > 0): ?>
    <p>En estoc</p>
  <?php else: ?>
    <p>Esgotat</p>
  <?php endif; ?>

  <table>
  <?php for ($i = 1; $i <= 10; $i++) : ?>
    <tr>
      <td><?= $i ?> x 7</td>
      <td><?= $i * 7 ?></td>
    </tr>
  <?php endfor; ?>
  </table>

</body>
</html>