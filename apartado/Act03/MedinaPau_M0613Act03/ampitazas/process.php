<?php
/* EXPLICACION DEL PASSWORD HASH Y PORQUE SE ENCRIPTA

Las contraseñas nunca se guardan tal cual en una BBDD, ya que
si esta se llegara a filtrar o incluso en alguna peticion que
hagamos, cualquiera podría verlas. password_hash() crea un
hash irreversible, es decir, que no se puede desencriptar,
pero permite validar la contraseña sin almacenar la original.

*/

$errors = [];

// Si el usuario entra directo a process.php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  echo '<p>Tienes que llegar aquí desde el formulario. <a href="register.html">Vuelve allí</a></p>';
}

// Guardamos los datos del formulario
$user = [
  'name' => trim($_POST['name'] ?? ''),
  'surnames' => trim($_POST['surnames'] ?? ''),
  'birthdate' => $_POST['birthdate'] ?? '',
  'phone' => trim($_POST['phone'] ?? ''),
  'email' => trim($_POST['email'] ?? ''),
  'username' => trim($_POST['username'] ?? ''),
  'passwordHash' => password_hash($_POST['pass'], PASSWORD_DEFAULT),
  'street' => trim($_POST['street'] ?? ''),
  'city' => trim($_POST['city'] ?? ''),
  'postal-code' => trim($_POST['postal-code'] ?? ''),
  'type' => trim($_POST['type'] ?? ''),
  'how-found-us' => trim($_POST['how-found-us'] ?? ''),
  'accept-bulletin' => isset($_POST['accept-bulletin']) ? 'Si' : 'No',
  'accept-conditions' => isset($_POST['accept-conditions']) ? 'Si' : 'No',
];

// Formateamos la fecha
if ($user['birthdate'] !== '') {
  $date = DateTimeImmutable::createFromFormat(
    '!Y-m-d',
    $_POST['birthdate']
  );

  // Definimos a partir de cuando debes haber nacido para tener 16 años
  $minimumBirthDate = new DateTimeImmutable('today');
  $minimumBirthDate = $minimumBirthDate->modify('-16 years');

  if ($date > $minimumBirthDate) {
    $errors[] = 'Debes tener al menos 16 años.';
  }

  if ($date !== false) {
    $user['birthdate'] = $date->format('d/m/Y');
  }
}

// Creamos el código de usuario
$usernamePrefix = mb_strtoupper(
  mb_substr($user['surnames'], 0, 3),
  'UTF-8'
);

$randomNumber = random_int(1000, 9999);

$usernameCode = $usernamePrefix . '-' . $randomNumber;

$user['usercode'] = $usernameCode;

// Las contraseñas van a parte para compararlas
$pass = $_POST['pass'] ?? '';
$rep_pass = $_POST['rep-pass'] ?? '';

// Para validación del correo
$rep_email = trim($_POST['rep-email']) ?? '';

// Validamos los datos
if ($user['name'] === '') {
  $errors[] = 'El nombre es obligatorio.';
}

if ($user['surnames'] === '') {
  $errors[] = 'Los apellidos son obligatorios.';
}

if ($user['birthdate'] === '') {
  $errors[] = 'La fecha de nacimiento es obligatoria.';
}

if (strlen($user['phone']) !== 9) {
  $errors[] = 'El número de teléfono tiene que tener 9 dígitos.';
}

if ($user['email'] === '' || filter_var($user['email'], FILTER_VALIDATE_EMAIL) === false) {
  $errors[] = 'El correo electrónico es obligatorio y debe tener un formato válido.';
}

if ($user['email'] !== $rep_email) {
  $errors[] = 'Los correos no coinciden.';
}

if (strlen($user['username']) < 4) {
  $errors[] = 'El nombre de usuario debe tener como mínimo 4 carácteres.';
}

if (strlen($pass) < 6) {
  $errors[] = 'La contraseña debe tener como mínimo 6 carácteres.';
}

if ($pass !== $rep_pass) {
  $errors[] = 'Las contraseñas no coinciden.';
}

if (strlen($user['postal-code']) !== 5) {
  $errors[] = 'El código postal debe tener 5 carácteres.';
}

if ($user['type'] === '') {
  $errors[] = 'Debes seleccionar que tipo de cliente eres.';
}

if ($user['accept-conditions'] === 'No') {
  $errors[] = 'Debes aceptar las condiciones de uso.';
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="./css/style.css">
</head>
<body class="error-page">

  <?php if (count($errors) > 0): ?>

    <h2 class="error-title">No se ha podido crear la cuenta</h2>
    <ul class="error-list">
      <?php foreach ($errors as $e): ?>
        <li><?= $e ?></li>
      <?php endforeach; ?>
    </ul>

  <?php else: ?>

    <h1 class="success-title">Bienvenido <?= $user['name'] ?></h1>
    <p class="success-message">
      <?php switch ($user['type']) {
        case 'ampeter-fan':
          echo 'Como gran fan de Ampeter que eres, podrás disfrutar de sus fantásticas tazas en AmpiTazas!';
          break;

        case 'ampeter-lover':
          echo 'Ostia estás enamorado de un youtuber? Bueno rarillo eso, pero bueno.';
          break;

        case 'ampeter-stalker':
          echo '...';
          break;
      } ?>
    </p>

    <table class="summary-table">
      <?php foreach ($user as $camp => $value): ?>
          <tr>
              <th><?= $camp ?></th>
              <td><?= htmlspecialchars($value) ?></td>
          </tr>
      <?php endforeach; ?>
    </table>

    <?php if ($user['name'] === 'Ampeter') : ?>
      <img src="./src/assets/foto-ampeter.jpeg" alt="Ampeter" style="width:100%;">
    <?php endif; ?>

  <?php endif; ?>

</body>
</html>