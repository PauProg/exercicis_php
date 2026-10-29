<?php

/**
 * PAS 2 - Recollir les dades correctament
 * 
 */

/** trim: para sacar los espacios y inicializar si la
 * variable venía vacía
*/
$nom = trim($_POST['nom'] ?? '');
$correu = trim($_POST['correu'] ?? '');
$dia = trim($_POST['dia'] ?? 'sense triar');

// echo '<p>Hola, ' . $_POST['nom'] . '</p>';

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Resultat PAS 2</title>
  <link rel="stylesheet" href="style.css">
</head>
<body class="confirmation-page">
  <h1 class="result-title">Dades recollides:</h1>

  <ul class="result-list">
    <li class="result-item">Nom: <?= $nom ?></li>
    <li class="result-item">Correu: <?= $correu ?></li>
    <li class="result-item">Dia: <?= $dia ?></li>
  </ul>

  <p class="result-count">El nom té <?= strlen($nom) ?> caràcters.</p>

</body>
</html>