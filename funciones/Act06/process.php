<?php
require_once 'config.php';
require_once 'funcions.php';

/* EXPLICACION DEL PASSWORD HASH Y PORQUE SE ENCRIPTA

Las contraseñas nunca se guardan tal cual en una BBDD, ya que
si esta se llegara a filtrar o incluso en alguna peticion que
hagamos, cualquiera podría verlas. password_hash() crea un
hash irreversible, es decir, que no se puede desencriptar,
pero permite validar la contraseña sin almacenar la original.

*/

// Si el usuario entra directo a process.php no hay nada que procesar
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  $pageTitle = 'Acceso directo';

  require 'header.php';
  ?>

  <h2>Aquí no se llega directamente</h2>
  <a class="back-link" href="<?= FORM_PAGE ?>">Ir al formulario</a>

  <?php
  require 'footer.php';
  exit;
}

$errors = [];

// Las contraseñas van aparte porque no se limpian con trim()
$pass    = $_POST['pass'] ?? '';
$repPass = $_POST['rep-pass'] ?? '';

$repEmail  = field('rep-email');
$birthdate = field('birthdate');

// Guardamos los datos del formulario
$user = [
  'name'              => field('name'),
  'surnames'          => field('surnames'),
  'birthdate'         => $birthdate,
  'phone'             => field('phone'),
  'email'             => field('email'),
  'username'          => field('username'),
  'passwordHash'      => password_hash($pass, PASSWORD_DEFAULT),
  'street'            => field('street'),
  'city'              => field('city'),
  'postal-code'       => field('postal-code'),
  'type'              => field('type'),
  'how-found-us'      => field('how-found-us'),
  'accept-bulletin'   => isset($_POST['accept-bulletin']) ? 'Sí' : 'No',
  'accept-conditions' => isset($_POST['accept-conditions']) ? 'Sí' : 'No',
];

// Formateamos la fecha para mostrarla en la tabla
$user['birthdate'] = formatDate($birthdate);

// Validamos la edad solo si la fecha ha llegado
if ($birthdate !== '') {
  $parsedDate = DateTimeImmutable::createFromFormat('!Y-m-d', $birthdate);
  $dateErrors = DateTimeImmutable::getLastErrors();

  if ($parsedDate === false || ($dateErrors !== false && $dateErrors['warning_count'] > 0)) {
    $errors[] = 'La fecha de nacimiento no es válida.';
  } else {
    $minimumBirthDate = (new DateTimeImmutable('today'))->modify('-' . MIN_AGE . ' years');

    if ($parsedDate > $minimumBirthDate) {
      $errors[] = 'Debes tener al menos ' . MIN_AGE . ' años.';
    }
  }
}

// Creamos el código de usuario
$user['usercode'] = userCode($user['surnames']);

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

if (strlen($user['phone']) !== PHONE_LENGTH) {
  $errors[] = 'El número de teléfono tiene que tener ' . PHONE_LENGTH . ' dígitos.';
}

if ($user['email'] === '' || filter_var($user['email'], FILTER_VALIDATE_EMAIL) === false) {
  $errors[] = 'El correo electrónico es obligatorio y debe tener un formato válido.';
}

if ($user['email'] !== $repEmail) {
  $errors[] = 'Los correos no coinciden.';
}

if (strlen($user['username']) < MIN_USER) {
  $errors[] = 'El nombre de usuario debe tener como mínimo ' . MIN_USER . ' carácteres.';
}

if (strlen($pass) < MIN_PASS) {
  $errors[] = 'La contraseña debe tener como mínimo ' . MIN_PASS . ' carácteres.';
}

if ($pass !== $repPass) {
  $errors[] = 'Las contraseñas no coinciden.';
}

if (strlen($user['postal-code']) !== POSTAL_CODE_LENGTH) {
  $errors[] = 'El código postal debe tener ' . POSTAL_CODE_LENGTH . ' carácteres.';
}

if ($user['type'] === '') {
  $errors[] = 'Debes seleccionar qué tipo de cliente eres.';
}

if ($user['accept-conditions'] === 'No') {
  $errors[] = 'Debes aceptar las condiciones de uso.';
}

// El título depende de si hay errores, por eso se calcula antes del header
$pageTitle = count($errors) > 0 ? 'No se ha creado la cuenta' : 'Cuenta creada';

require 'header.php';
?>

  <?php if (count($errors) > 0): ?>

    <div class="error-box">
      <h2 class="error-title">No se ha podido crear la cuenta</h2>
      <ul class="error-list">
        <?php foreach ($errors as $error): ?>
          <li><?= htmlspecialchars($error) ?></li>
        <?php endforeach; ?>
      </ul>
    </div>

    <a class="back-link" href="<?= FORM_PAGE ?>">Volver al formulario</a>

  <?php else: ?>

    <h2 class="success-title">Bienvenido <?= htmlspecialchars($user['name']) ?></h2>
    <p class="success-message">
      <?php switch ($user['type']) {
        case 'ampeter-fan':
          echo 'Como gran fan de Ampeter que eres, podrás disfrutar de sus fantásticas tazas en ' . SHOP_NAME . '!';
          break;

        case 'ampeter-lover':
          echo 'Ostia estás enamorado de un youtuber? Bueno rarillo eso, pero bueno.';
          break;

        case 'ampeter-stalker':
          echo '...';
          break;

        default:
          echo 'Tipo de cliente no reconocido.';
          break;
      } ?>
    </p>

    <table class="summary-table">
      <?php foreach ($user as $key => $value): ?>
        <tr>
          <th><?= label($key) ?></th>
          <td><?= $key === 'passwordHash' ? '••••••••' : htmlspecialchars($value) ?></td>
        </tr>
      <?php endforeach; ?>
    </table>

    <?php if ($user['name'] === 'Ampeter'): ?>
      <img class="success-photo" src="./src/assets/foto-ampeter.jpeg" alt="Ampeter">
    <?php endif; ?>

    <a class="back-link" href="<?= THANKS_PAGE ?>">Continuar</a>

  <?php endif; ?>

<?php
require 'footer.php';
