<?php

/**
 * PAS 3 - Una sola pàgina
 * Fins ara teníem dos fitxers, el formuari i el resultat
 * Mira com es fa la petició i així farà una cosa o altre
 * La primera visita es amb GET i aquan es prem el botò 
 * d'enviar és amb POST
 */

$nom = '';
$correu = '';
$dia = '';
// var de control
$enviat = false;

/* 
Array predefinido $_SERVER nos da información del
servidor 
*/

// echo '<pre>';
// print_r($_SERVER);
// echo '</pre>';

// Si el request method es POST es que ya se ha
// clicado el botón de enviar del formulario
// con method=post
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nom = trim($_POST['nom'] ?? '');
  $correu = trim($_POST['correu'] ?? '');
  $validar_correu = trim($_POST['validar-correu'] ?? '');
  $dia = trim($_POST['dia'] ?? 'sense triar');
  $telefon = trim($_POST['telefon'] ?? '');
  $carrer = trim($_POST['carrer'] ?? '');
  $num_casa = trim($_POST['num-casa'] ?? '');
  $enviat = true;
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inscripció al Festival</title>
  <link rel="stylesheet" href="style2.css">
</head>
<body class="festival-page">

  <div class="festival-heading">
    <h1 class="festival-title">Inscripció <span>al Festival</span></h1>
    <p class="festival-subtitle">M0613 · Una nit per recordar</p>
  </div>

  <?php if($enviat): ?>
    <section class="confirmation" aria-live="polite">
      <p class="confirmation-kicker">ENTRADA CONFIRMADA</p>
      <p class="confirmation-title">Ens veiem, <?= htmlspecialchars($nom) ?>.</p>
      <p class="confirmation-data">
        <?= htmlspecialchars($correu) ?> · <?= htmlspecialchars($dia) ?><br>
        <?= htmlspecialchars($telefon) ?> · <?= htmlspecialchars($carrer) ?> <?= htmlspecialchars($num_casa) ?>
      </p>
    </section>
  <?php endif; ?>

  <!-- <form action="pas3-resultat.php" method="post"> -->
  <form class="festival-form" method="post">
    <p class="form-kicker">RESERVA EL TEU ACCÉS</p>
    <p class="form-intro">Assegura la teva plaça en menys d'un minut.</p>

    <div class="form-fields">
      <label class="form-label" for="nom">Nom</label>
      <input class="form-input" type="text" name="nom" id="nom">

      <label class="form-label" for="correu">Correu</label>
      <input class="form-input" type="email" name="correu" id="correu">

      <label class="form-label" for="validar-correu">Validar Correu</label>
      <input class="form-input" type="email" name="validar-correu" id="validar-correu">

      <label class="form-label" for="telefon">Teléfon</label>
      <input class="form-input" type="tel" name="telefon" id="telefon">

      <label class="form-label" for="carrer">Carrer</label>
      <input class="form-input" type="text" name="carrer" id="carrer">

      <label class="form-label" for="num-casa">Nº Casa</label>
      <input class="form-input" type="number" name="num-casa" id="num-casa">

      <label class="form-label" for="dia">Dia</label>
      <select class="form-input form-select" name="dia" id="dia">
        <option value="divendres">Divendres</option>
        <option value="dissabte">Dissabte</option>
      </select>
    </div>

    <button class="form-button" type="submit">Inscriure’m <span aria-hidden="true">&#8594;</span></button>
    <p class="form-footnote"><span aria-hidden="true">✦</span> Entrada gratuïta · Aforament limitat</p>
  </form>

</body>
</html>