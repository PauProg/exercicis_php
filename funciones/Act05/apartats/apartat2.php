<?php
declare(strict_types=1);

/**
 * Muestra un mensaje de bienvenida al usuario.
 * 
 * @param string $nombre El nombre del usuario.
 * @return void Solo muestra el mensaje
 */
function saluda(string $nombre): void {
    echo "<p>¡Hola, $nombre! Bienvenido a Ampitazas!!!!!</p>";
}

/**
 * Muestra la ficha de un producto
 * 
 * @param string $nombre El nombre del producto
 * @param float $precio El precio del producto
 * @param int $cantidad La cantidad de productos disponibles
 * @return void Solo muestra la ficha del producto
 */
function fichaProducto(string $nombre, float $precio, int $cantidad): void {
    echo "<div>
        <h2>$nombre</h2>
        <p>Precio: " . number_format($precio, 2, ',', '.') . "€</p>
        <p>Cantidad disponible: $cantidad</p>
    </div>";
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
  <?php
    saluda("Pau");
    saluda("Enric");
    saluda("Victor");
  ?>

  <div class="cuadricula">
    <?php
      fichaProducto("Taza de Ampeter sexy", 9.99, 5);
      fichaProducto("Taza de Ampeter guay", 7.99, 10);
      fichaProducto("Taza de Ampeter musical", 12.99, 2);
    ?>
  </div>

  <?php
    // Ejemplo de uso de la función con un producto mal puesto
    /*
      Nos da un fatal error de tipo TypeError porque el precio no es un float y la cantidad no es un int.
    */
    // fichaProducto(8.49, "Taza de Ampeter divertida", 7);
  ?>
</body>
</html>