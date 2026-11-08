<?php
declare(strict_types=1);

/**
 * Calcula el precio con IVA y lo muestra
 * 
 * @param float $base Precio base del producto
 * @return void Solo muestra el precio con IVA
 */
function precioConIvaEcho(float $base): void
{
  echo $base * 1.21;
}

/**
 * Devuelve el precio con IVA
 * 
 * @param float $base Precio base del producto
 * @return float Precio con IVA
 */
function precioConIva(float $base): float
{
  return $base * 1.21;
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

$precios = [3.99, 9.99, 5.99];
$total = 0.0;

foreach ($precios as $precio) {
  $total += precioConIva($precio);
}

echo '<p>Total con IVA: ' . formatPrecio($total) . '</p>';

echo '<p>Más caro con IVA: ' . formatPrecio(precioConIva(max($precios))) . '</p>';

/*
  Con precioConIvaEcho() no se puede reutilizar el resultado:
    $total += precioConIvaEcho($precio);
  La función es void: imprime el precio y devuelve null, así que la suma
  añade 0 y el IVA se queda fuera del total. El valor ya se ha impreso y
  no hay forma de recuperarlo.

  Además, con strict_types=1, esto lanza un TypeError:
    formatPrecio(precioConIvaEcho($precio));
  TypeError: formatPrecio(): Argument #1 ($precio) must be of type float, null given
*/