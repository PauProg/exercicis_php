<?php 
  const TIENDA = 'Klavier';
  const DESCRIPCION = 'Esto es la tienda online Klavier';
  const FOOTER = 'Footer de Klavier©';
  const IVA = 0.21;
  const MONEDA = '€';
  const DESCUENTO_SOCIO = 0.067;
  const PRODUCTO = 'Roland FP30x';
  const DESC_PRODUCTO = 'Piano digital Roland de 88 teclas';
  const REFERENCIA = 'PIA-1867923';

  $unidades = 5;

  $precio = 578.50;
  $iva_producto = $precio * IVA;
  $total = $precio * (IVA + 1);
  $total_socio = $precio * (DESCUENTO_SOCIO + 1);
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= TIENDA ?></title>
  <link rel="stylesheet" href="style.css">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
</head>
<body>

  <!-- 
  Da este error:

  Warning: Constant MONEDA already defined in
  /Applications/MAMP/htdocs/M0613/clase/exercicis_php/ex06/index.php
  on line 35

  <?php 
  const MONEDA = '$';
  ?> 
  -->

  <header>
    <h1><?= TIENDA ?></h1>
    <p><?= DESCRIPCION ?></p>
  </header> 

  <main>
    <article class="producto">
      <h2> <?= PRODUCTO ?> </h2>
      <p class="descripcion"><?= DESC_PRODUCTO ?></p>
      <p class="precio">Precio: <?= number_format($precio, 2, ',') . MONEDA ?></p>
      <p class="precio">IVA (<?= IVA * 100 ?>%): <?= number_format($iva_producto, 2, ',') . MONEDA ?></p>
      <p class="total">TOTAL: <?= number_format($total, 2, ',') . MONEDA ?></p>
      <p class="precio">PRECIO SOCIOS (6.7%): <?= number_format($total_socio, 2, ',') . MONEDA ?></p>

      <p class="stock">Unidades disponibles: <?= $unidades ?></p>
      <p class="ref"><?= REFERENCIA ?></p>
    </article>
  </main>

  <footer>
    <p><?= FOOTER ?></p>
  </footer>

</body>
</html>