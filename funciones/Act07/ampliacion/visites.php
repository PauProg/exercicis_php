<?php
// La sesión siempre se inicia antes de escribir nada en pantalla
session_start();

require_once 'config.php';
require_once 'funcions.php';

$pageTitle = 'Visitas';

require 'header.php';

$visitas = contarVisitas();
?>

  <h2>Visitas</h2>

  <div class="ok">
    <p>Has visto esta página <?= $visitas ?> <?= $visitas === 1 ? 'vez' : 'veces' ?>.</p>
  </div>

<?php
require 'footer.php';
