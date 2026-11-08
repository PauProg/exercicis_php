<?php
declare(strict_types=1);

/**
 * Muestra la cabecera de la tienda
 * 
 * @return void Solo muestra por pantalla
 */
function cabecera(): void
{
  echo '<header>
    <h1>Ampitazas</h1>
    <p>Bienvenido a nuestra tienda</p>
  </header>';
}

/**
 * Muestra el pie de la tienda
 * 
 * @return void Solo muestra por pantalla
 */
function pie(): void
{
  echo '<footer>
    <p>Todos los derechos reservados a Ampeter &copy; ' . date('Y') . '</p>
  </footer>';
}

/**
 * Escribe el mejor mensaje de la historia por pantalla
 * 
 * @return void Solo muestra por pantalla
 */
function loReconozco(): void
{
  echo '<p>Lo reconozco, soy Ampeter</p>';
}

// Esta funcion no se llama en ningun sitio, pero si la llamamos, nos mostrara un mensaje por pantalla

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
    cabecera();
  ?>



  <?php
    pie();
    pie();
    pie();
  ?>
</body>
</html>