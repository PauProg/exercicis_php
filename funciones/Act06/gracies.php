<?php
require_once 'config.php';

$pageTitle = 'Gracias';

require 'header.php';
?>

  <h2>Gracias por registrarte</h2>

  <div class="ok">
    <p>Tu cuenta de <?= SHOP_NAME ?> ya está activa.
      Si tienes algún problema, escríbenos a <?= SHOP_EMAIL ?>.</p>
  </div>

  <a class="back-link" href="<?= FORM_PAGE ?>">Registrar otra cuenta</a>

<?php
require 'footer.php';
