<?php
declare(strict_types=1);

/**
 * Devuelve el precio con IVA
 * 
 * @param float $base Precio base del producto
 * @param float $iva Porcentaje de IVA
 * @return float Precio con IVA
 */
function precioConIva(float $base, float $iva = 0.21): float
{
  return $base * (1 + $iva);
}

echo '<p>Precio con IVA (21%): ' . precioConIva(100) . ' EUR</p>';
echo '<p>Precio con IVA (10%): ' . precioConIva(100, 0.10) . ' EUR</p>';
echo '<p>Precio con IVA (4%): ' . precioConIva(100, 0.04) . ' EUR</p>';

/**
 * Aplica un descuento al precio
 * 
 * @param float $precio Precio del producto
 * @param int $descuento Porcentaje de descuento 
 * @return float Precio con descuento
 */
function aplicarDescuento(float $precio, int $descuento = 10): float
{
  return $precio * (1 - ($descuento / 100));
}

echo '<p>Precio con descuento (10%): ' . aplicarDescuento(100) . ' EUR</p>';
echo '<p>Precio con descuento (25%): ' . aplicarDescuento(100, 25) . ' EUR</p>';

/**
 * Saluda a un nombre dado con un saludo personalizado
 * 
 * @param string $nombre Nombre de la persona a saludar
 * @param string $saludo Saludo personalizado
 * @return string Saludo completo
 */
function bienvenida(string $nombre, string $saludo = 'Hola'): string
{
  return "$saludo, $nombre!";
}

echo '<p>' . bienvenida('Pau') . '</p>';
echo '<p>' . bienvenida('Pau', 'Bon dia') . '</p>';

/*
Aviso que da php si ponemos el param opcional primero:
Deprecated: bienvenida(): Optional parameter $saludo declared before required parameter $nombre 
is implicitly treated as a required parameter in 
/Applications/MAMP/htdocs/M0613/clase/exercicis_php/funciones/Act05/apartats/apartat4.php on line 42
*/