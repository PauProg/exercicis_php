<?php
// Si una página se olvida del título, no queremos un aviso en pantalla.
if (!isset($pageTitle)) {
    $pageTitle = 'Inicio';
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($pageTitle) ?> · <?= SHOP_NAME ?></title>
  <link rel="stylesheet" href="<?= STYLESHEET ?>">
</head>
<body>

  <header class="site-header">
    <div class="site-header__inner">
      <img src="./src/assets/ampitaza-logo.webp" alt="Logo de <?= SHOP_NAME ?>">
      <div class="site-header__text">
        <h1><?= SHOP_NAME ?></h1>
        <p><?= SHOP_SLOGAN ?></p>
      </div>
    </div>
  </header>

  <main>
