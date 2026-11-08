<?php
declare(strict_types=1);

$tienda = 'Ampitazas';

/**
 * Muestra el nombre de la tienda (mal)
 * 
 * @return void
 */
function mostrarTiendaMal(): void
{
  echo "<p>Tienda: $tienda</p>";
}

mostrarTiendaMal();
/*
  Warning real que genera esta llamada (es intencionado):
  PHP Warning:  Undefined variable $tienda in
  .../apartats/apartat6.php on line 13
  La función no recibe $tienda por parámetro y no puede ver la variable global.
*/

/**
 * Muestra el nombre de la tienda
 * 
 * @param string $tienda Nombre de la tienda
 * @return void
 */
function mostrarTienda(string $tienda): void
{
  echo "<p>Tienda: $tienda</p>";
}

mostrarTienda($tienda);
// La versión correcta no genera ningún warning: recibe el dato por parámetro.

/**
 * Cuenta el número de veces que se llama a la función
 * 
 * @return int Devuelve siempre 1 al no ser estático
 */
function cuentaLocal(): int
{
  $cuenta = 0;
  $cuenta++;
  return $cuenta;
}

/**
 * Cuenta el número de veces que se llama a la función
 * 
 * @return int Devuelve el número de veces que se ha llamado a la función
 */
function cuentaEstatica(): int
{
  static $cuenta = 0;
  $cuenta++;
  return $cuenta;
}

/*
  La diferencia que vemos entre las dos salidas está bastante clara,
  la primera se reinicia cada vez que se llama a la función, mientras que la segunda
  mantiene el valor de la variable estática entre llamadas. Esto es útil para
  contar el número de veces que se ha llamado a la función, o para mantener un estado
  entre llamadas sin tener que usar variables globales.
*/

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

  <?php mostrarTienda($tienda) ?>

  <p>Local: <?= cuentaLocal() ?></p>
  <p>Local: <?= cuentaLocal() ?></p>
  <p>Local: <?= cuentaLocal() ?></p>

  <p>Estática: <?= cuentaEstatica() ?></p>
  <p>Estática: <?= cuentaEstatica() ?></p>
  <p>Estática: <?= cuentaEstatica() ?></p>

</body>
</html>