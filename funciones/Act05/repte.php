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

/**
 * Devuelve el precio con IVA
 * 
 * @param float $base Precio base del producto
 * @param float $iva Porcentaje de IVA (0.21 = 21%)
 * @return float Precio con IVA
 */
function precioConIva(float $base, float $iva = 0.21): float
{
  return $base * (1 + $iva);
}

/**
 * Devuelve el precio formateado
 * 
 * @param float $precio Precio del producto
 * @return string Precio formateado
 */
function formatPrecio(float $precio): string
{
  return number_format($precio, 2, ',', '.') . " EUR";
}

/**
 * Devuelve 'Agotado', 'Últimas unidades' o 'Disponible' según el stock del producto
 * 
 * @param int $stock Cantidad de stock del producto
 * @return string Estado del producto
 */
function estadoStock(int $stock): string
{
  if ($stock <= 0) {
    return 'Agotado';
  } elseif ($stock <= 3) {
    return 'Últimas unidades';
  } else {
    return 'Disponible';
  }
}

/**
 * Devuelve los productos de una categoría dada
 * 
 * @param array $productos Array de productos
 * @param string $categoria Categoría a filtrar
 * @return array Array de productos filtrados por categoría
 */
function filtraCategoria(array $productos, string $categoria): array
{

  if ($productos === []) {
    return [];
  }

  if ($categoria === 'totes') {
    return $productos;
  }

  $categorias = ['teclats', 'ratolins', 'monitors', 'audio', 'accessoris'];

  if (!in_array($categoria, $categorias)) {
    throw new InvalidArgumentException("Categoría no válida: $categoria");
  }

  $filtrados = [];

  foreach ($productos as $producto) {
    if ($producto['categoria'] === $categoria) {
      $filtrados[] = $producto;
    }
  }

  return $filtrados;
}

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
  return $total;
}

/**
 * Devuelve un array asociativo con el total de productos,
 * disponibles y agotados, y el valor del stock
 * 
 * @param array $productos Array de productos
 * @return array Array asociativo con el total de productos, disponibles y agotados, y el valor del stock
 */
function resumenCatalogo(array $productos): array
{
  return [
    'total' => count($productos),
    'disponibles' => count(soloDisponibles($productos)),
    'agotados' => cuantosAgotados($productos),
    'valorStock' => round(valorStock($productos), 2)
  ];
}

/**
 * Escribe el html de una tarjeta de producto
 * 
 * @param array $producto Array asociativo con los datos del producto
 * @return void Imprime el html de la tarjeta de producto
 */
function pintaTarjeta(array $producto): void
{
  $estado = estadoStock($producto['estoc']);
  $precioConIva = precioConIva($producto['preu']);
  $precioFormateado = formatPrecio($precioConIva);

  echo "<div class='tarjeta'>";
  echo "<h3>{$producto['nom']}</h3>";
  echo "<p>Categoría: {$producto['categoria']}</p>";
  echo "<p>Precio: {$precioFormateado}</p>";
  echo "<p>Estado: {$estado}</p>";
  echo "</div>";
}

/**
 * Pinta la cuadricula entera de productos llamando
 * a pintaTarjeta() para cada producto
 * 
 * @param array $productos Array de productos
 * @return void Imprime el html de la cuadricula de productos
 */
function pintaCuadricula(array $productos): void
{
  if (empty($productos)) {
    echo "<p>No hay productos para mostrar.</p>";
    return;
  }

  echo "<div class='cuadricula'>";
  foreach ($productos as $producto) {
    pintaTarjeta($producto);
  }
  echo "</div>";
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ampitazas · Catálogo</title>
  <link rel="stylesheet" href="estils.css">
</head>
<body>
  <header class="cabecera">
    <h1>Ampitazas</h1>
    <p>Catálogo de material informático</p>
  </header>

  <main>
    <!-- 1. Resumen del catálogo, recorrido con foreach -->
    <section class="seccion">
      <h2>Resumen del catálogo</h2>
      <?php $resumen = resumenCatalogo($productes); ?>
      <ul class="resumen">
        <?php
        $etiquetas = [
          'total' => 'Total de productos',
          'disponibles' => 'Disponibles',
          'agotados' => 'Agotados',
          'valorStock' => 'Valor del stock',
        ];

        foreach ($resumen as $clave => $valor):
            $etiqueta = $etiquetas[$clave] ?? $clave;
            $texto = $clave === 'valorStock' ? formatPrecio((float) $valor) : $valor;
        ?>
          <li><span class="etiqueta"><?= $etiqueta ?>:</span> <?= $texto ?></li>
        <?php endforeach; ?>
      </ul>
    </section>

    <!-- 2. Graella con todos los productos -->
    <section class="seccion">
      <h2>Todo el catálogo</h2>
      <?php pintaCuadricula($productes); ?>
    </section>

    <!-- 3. Graella con una sola categoría -->
    <section class="seccion">
      <h2>Categoría: teclats</h2>
      <?php pintaCuadricula(filtraCategoria($productes, 'teclats')); ?>
    </section>

    <!-- 4. Categoría inexistente: mensaje, sin graella ni error -->
    <section class="seccion">
      <h2>Categoría: impressores</h2>
      <?php
      try {
          pintaCuadricula(filtraCategoria($productes, 'impressores'));
      } catch (InvalidArgumentException $e) {
          echo '<p class="aviso">La categoría <strong>impressores</strong> no existe. '
              . 'Prueba con teclats, ratolins, monitors, audio o accessoris.</p>';
      }
      ?>
    </section>
  </main>
</body>
</html>