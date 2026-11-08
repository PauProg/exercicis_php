<?php
declare(strict_types=1);

$productes = [
  ['nom' => 'Teclat mecanic RGB', 'categoria' => 'teclats',
  'preu' => 79.90, 'estoc' => 4],
  ['nom' => 'Ratoli vertical', 'categoria' => 'ratolins',
  'preu' => 29.95, 'estoc' => 7],
  ['nom' => 'Monitor 27" QHD', 'categoria' => 'monitors',
  'preu' => 289.00, 'estoc' => 0],
  ['nom' => 'Auriculars ANC', 'categoria' => 'audio',
  'preu' => 129.00, 'estoc' => 2],
  ['nom' => 'Hub USB-C 7 en 1', 'categoria' => 'accessoris',
  'preu' => 34.90, 'estoc' => 20],
  ['nom' => 'Suport per a portatil','categoria' => 'accessoris',
  'preu' => 24.50, 'estoc' => 0],
];

// FUNCIONES QUE DEVUELVEN UN VALOR

/**
 * Devuelve el valor total que tenemos en
 * el catálogo
 * 
 * @param array $productos Array de productos
 * @return float Valor total del catálogo
 */
function valorStock(array $productos): float
{
  $total = 0.0;
  foreach ($productos as $producto) {
    $total += $producto['preu'] * $producto['estoc'];
  }
  return round($total, 2);
}

/**
 * Devuelve cuantos productos están agotados
 * 
 * @param array $productos Array de productos
 * @return int Número de productos agotados
 */
function cuantosAgotados(array $productos): int
{
  $agotados = 0;
  foreach ($productos as $producto) {
    if ($producto['estoc'] <= 0) {
      $agotados++;
    }
  }
  return $agotados;
}

/**
 * Devuelve la media de precio de los productos con dos decimales
 * 
 * @param array $productos Array de productos
 * @return float Media de precio de los productos
 */
function precioMedio(array $productos): float
{
  if (count($productos) === 0) {
    return 0.0;
  }

  $total = 0.0;
  foreach ($productos as $producto) {
    $total += $producto['preu'];
  }
  return round($total / count($productos), 2);
}

// FUNCIONES QUE DEVUELVEN UN ARRAY

/**
 * Devuelve los productos con stock
 * 
 * @param array $productos Array de productos
 * @return array Array de productos con stock
 */
function soloDisponibles(array $productos): array
{
  $conStock = [];
  foreach ($productos as $producto) {
    if ($producto['estoc'] > 0) {
      $conStock[] = $producto;
    }
  }
  return $conStock;
}

/**
 * Devuelve el producto más caro
 * 
 * @param array $productos Array de productos
 * @return array Producto más caro
 */
function elMasCaro(array $productos): array
{
  $masCaro = [];
  $precioMaximo = 0.0;
  foreach ($productos as $producto) {
    if ($producto['preu'] > $precioMaximo) {
      $precioMaximo = $producto['preu'];
      $masCaro = $producto;
    }
  }
  return $masCaro;
}

/**
 * Devuelve un resumen del catálogo con total, disponibles, y más caro
 * 
 * @param array $productos Array de productos
 * @return array Resumen del catálogo
 */
function resumenCatalogo(array $productos): array
{
  return [
    'total' => count($productos),
    'disponibles' => count(soloDisponibles($productos)),
    'masCaro' => elMasCaro($productos),
  ];
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ampitazas</title>
  <link rel="stylesheet" href="../estils.css">
</head>
<body>

  <h2>Funciones que devuelven un valor</h2>
  <p>Valor total del catálogo: <?= valorStock($productes) ?> EUR</p>
  <p>Número de productos agotados: <?= cuantosAgotados($productes) ?></p>
  <p>Precio medio de los productos: <?= precioMedio($productes) ?> EUR</p>
  <p>Precio medio de los productos (Con array vacía): <?= precioMedio([]) ?> EUR</p>

  <h2>Funciones que devuelven un array</h2>
  <h3>Productos con stock</h3>
  <ul>
    <?php foreach (soloDisponibles($productes) as $producto): ?>
      <li><?= $producto['nom'] ?> - <?= $producto['preu'] ?> EUR</li>
    <?php endforeach; ?>
  </ul>

  <h3>Producto más caro</h3>
  <?php $masCaro = elMasCaro($productes); ?>
  <p><?= $masCaro['nom'] ?> - <?= $masCaro['preu'] ?> EUR</p>

  <h3>Resumen del catálogo</h3>
  <?php $resumen = resumenCatalogo($productes); ?>
  <ul>
    <?php foreach ($resumen as $clave => $valor): ?>
      <li>
        <?= $clave ?>:
        <?php if (is_array($valor)): ?>
          <?= $valor['nom'] ?> - <?= $valor['preu'] ?> EUR
        <?php else: ?>
          <?= $valor ?>
        <?php endif; ?>
      </li>
    <?php endforeach; ?>
  </ul>

</body>
</html>