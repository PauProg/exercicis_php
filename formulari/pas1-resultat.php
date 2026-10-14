<?php

/**
 * PHPDoc:
 * PAS 1: Les dades arriben per GET
 * Mirar la url si van les dades
 */

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Resultat PAS 1</title>
  <link rel="stylesheet" href="style.css">
</head>
<body class="result-page">
  <main>
    <p class="eyebrow">Pas 1 · Dades rebudes</p>
    <h1>Què ha arribat al servidor?</h1>
    <p class="intro">Aquest és el contingut rebut pel servidor després d’enviar el formulari.</p>

    <section class="data-block">
      <h2>$_GET</h2>
      <pre><?php echo htmlspecialchars(print_r($_GET, true), ENT_QUOTES, 'UTF-8'); ?></pre>
    </section>

    <section class="data-block">
      <h2>$_POST</h2>
      <pre><?php echo htmlspecialchars(print_r($_POST, true), ENT_QUOTES, 'UTF-8'); ?></pre>
    </section>

    <a href="./pas1-formulari.html">Tornar al formulari</a>
  </main>

</body>
</html>