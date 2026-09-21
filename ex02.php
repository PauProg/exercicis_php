<?php
// Declaramos una constante IVA (no cambia valor)
const IVA = 0.21;

$producto = 'Teclado';
$base = 79.90;
$stock = 4;
$total = round($base * (1 + IVA), 2);

$nombre = 'Pau';
$apellido = 'Medina';
$direccion = 'Carrer de Lacy, 34';
?>

<!-- Equivale a ?php echo $producto ? -->
<h2><?= $producto ?></h2>

<p>Preu amb IVA: <?= $total; ?> EUR</p>
<p>Disponibilidad: <?= $stock ?></p>

<h2>Datos personales</h2>
<p>Nombre completo: <?= $nombre . ' ' . $apellido ?></p>
<p>Dirección: <?php echo $direccion ?></p>