<?php
/**
 * PAS 4 - Validar, control de errores y escapar
 * 
 * 
 */

// Declaración de variables
$nom = '';
$correu = '';
$dia = '';
$errors = [];
$inscrit = false;

// Si recibimos los datos
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nom = trim($_POST['nom'] ?? '');
  $correu = trim($_POST['correu'] ?? '');
  $dia = trim($_POST['dia'] ?? '');

  // Validar los errores
  if ($nom === '') {
    $errors['nom'] = 'El nom és obligatori';
  }

  if ($correu === '') {
    $errors['correu'] = 'El correu és obligatori';
  } elseif (filter_var($correu, FILTER_VALIDATE_EMAIL) === false) {
    // Si han añadido un formato correcto de email
    $errors['correu'] = 'Aquest correu no és un format vàlid.';
  }

  if ($dia !== 'divendres' && $dia !== 'dissabte') {
    $errors['dia'] = 'Has de triar un día.';
  }

  // Si el count del array $errors es 0 => No hay errores
  if (count($errors) === 0) {
    $inscrit = true;
  }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inscripció al festival</title>
</head>
<body>

  <h1>Inscripció al festival</h1>

  <?php if ($inscrit): ?>
    <!-- ESCAPAR LOS DATOS RECIBIDOS -->
    <p class="ok">Inscripció feta, <?= htmlspecialchars($nom) ?></p>
    <p class="ok">T'esperem el <?= htmlspecialchars($dia) ?></p>

  <?php else: ?>
    <!-- 
    novalidate en el form para ver los errores 
    desde el php
    -->
    <form method="post" novalidate>
      <label for="nom">Nom</label>
      <input 
        type="text" 
        placeholder="Enric Marquès" 
        name="nom"
        id="nom"
        value="<?= htmlspecialchars($nom) ?>"
      >
      <?php if(isset($errors['nom'])): ?>
        <p class="error"><?= $errors['nom'] ?></p>
      <?php endif; ?>

      <label for="correu">Correu</label>
      <input 
        type="text" 
        placeholder="marquesnoenric@gmail.com" 
        name="correu"
        id="correu"
        value="<?= htmlspecialchars($correu) ?>"
      >
      <?php if(isset($errors['correu'])): ?>
        <p class="error"><?= $errors['correu'] ?></p>
      <?php endif; ?>

      <label for="dia">Día</label>
      <select name="dia" id="dia">
        <option value="">---</option>
        <option value="divendres" <?= $dia === 'divendres' ? 'selected' : '' ?>>Divendres</option>
        <option value="dissabte" <?= $dia === 'dissabte' ? 'selected' : '' ?>>Dissabte</option>
      </select>
      <?php if(isset($errors['dia'])): ?>
        <p class="error"><?= $errors['dia'] ?></p>
      <?php endif; ?>

      <button type="submit">Inscriure'm</button>
    </form>

  <?php endif; ?>


</body>
</html>