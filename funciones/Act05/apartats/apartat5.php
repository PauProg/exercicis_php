<?php
declare(strict_types=1);

/**
 * Calcula el area de un rectangulo
 * 
 * @param float $base Base del rectangulo
 * @param float $altura Altura del rectangulo
 * @return float Area del rectangulo
 */
function area(float $base, float $altura): float
{
  return $base * $altura;
}

/**
 * Devuelve un booleano indicando si está
 * agotado o no un producto
 * 
 * @param int $stock Cantidad de stock del producto
 * @return bool True si está agotado, false si hay stock
 */
function estaAgotado(int $stock): bool
{
  return $stock <= 0;
}

// Prueba de estaAgotado() (aunque no se pida en el ejercicio)
echo '<p>Producto agotado: ' . (estaAgotado(0) ? 'Sí' : 'No') . '</p>';
echo '<p>Producto agotado: ' . (estaAgotado(5) ? 'Sí' : 'No') . '</p>';

echo '<p>Area del rectangulo con dos decimales: ' . area(5.4, 10.2) . '</p>';
echo '<p>Area del rectangulo con dos enteros: ' . area(5, 10) . '</p>';
// Funcionan ambas

try {
    echo '<p>Area con un string: ' . area('3', 4.0) . '</p>';
} catch (TypeError $e) {
    echo '<p>Error de tipo: ' . $e->getMessage() . '</p>';
}
/*
El error que da PHP es:
TypeError: area(): Argument #1 ($base) must be of type float, string given
*/

echo '<p>Area con un string: ' . area((float) '3', 4.0) . '</p>';
// Ahora si que va
/*
  Es mejor que PHP avise: si convierte solo, un string como "3"
  pasa desapercibido y el problema de tipo se descubre más tarde y más
  lejos del origen. Con strict_types la función cumple su contrato y la
  conversión la hacemos nosotros, explícita y en un solo lugar.
*/