<?php
require_once 'config.php';

$pageTitle = 'Registrate';

require 'header.php';
?>

  <form action="process.php" method="post">
    <h2 class="form-title">Registrate</h2>

    <fieldset>
      <legend>Datos personales</legend>

      <label for="name">
        Nombre
        <input type="text" name="name" id="name" placeholder="John">
      </label>

      <label for="surnames">
        Apellidos
        <input type="text" name="surnames" id="surnames" placeholder="Doe Does">
      </label>

      <label for="birthdate">
        Fecha de nacimiento
        <input type="date" name="birthdate" id="birthdate">
      </label>

      <label for="phone">
        Teléfono
        <input type="tel" name="phone" id="phone" placeholder="678 901 234">
      </label>
    </fieldset>

    <fieldset>
      <legend>Datos de la cuenta</legend>

      <label for="email">
        Correo
        <input type="email" name="email" id="email" placeholder="johndoe@email.com">
      </label>

      <label for="rep-email">
        Repetir Correo
        <input type="email" name="rep-email" id="rep-email" placeholder="johndoe@email.com">
      </label>

      <label for="username">
        Nombre de usuario
        <input type="text" name="username" id="username" placeholder="johndoee_">
      </label>

      <label for="pass">
        Contraseña
        <input type="password" name="pass" id="pass">
      </label>

      <label for="rep-pass">
        Repetir Contraseña
        <input type="password" name="rep-pass" id="rep-pass">
      </label>
    </fieldset>

    <fieldset>
      <legend>Dirección</legend>

      <label for="street">
        Calle y número
        <input type="text" name="street" id="street" placeholder="Carrer de Lacy, 34">
      </label>

      <label for="city">
        Población
        <input type="text" name="city" id="city" placeholder="Sabadell">
      </label>

      <label for="postal-code">
        Código postal
        <input type="text" name="postal-code" id="postal-code" placeholder="08202">
      </label>
    </fieldset>

    <fieldset>
      <legend>Preferencias</legend>

      <label for="type">
        Tipo de cliente
        <select name="type" id="type">
          <option value="">---</option>
          <option value="ampeter-fan">Fan de ampeter</option>
          <option value="ampeter-lover">Enamorado de ampeter</option>
          <option value="ampeter-stalker">Acosador de ampeter</option>
        </select>
      </label>

      <div class="how-found-us-radio">
        <p>¿Cómo nos has conocido?</p>

        <label>
          <input type="radio" name="how-found-us" value="instagram">
          Instagram
        </label>

        <label>
          <input type="radio" name="how-found-us" value="tiktok">
          TikTok
        </label>

        <label>
          <input type="radio" name="how-found-us" value="youtube">
          Yutub
        </label>

        <label>
          <input type="radio" name="how-found-us" value="friend">
          Un amigo o amiga
        </label>

        <label>
          <input type="radio" name="how-found-us" value="other">
          Otro
        </label>
      </div>

      <label for="accept-bulletin">
        <input type="checkbox" name="accept-bulletin" id="accept-bulletin" value="yes">
        Acepto recibir promociones y ofertas de <?= SHOP_NAME ?>, además de envíos periodicos de fotos provocativas de ampeterby7.
      </label>

      <label for="accept-conditions">
        <input type="checkbox" name="accept-conditions" id="accept-conditions" value="yes">
        He leido y acepto las condiciones de uso y ns que más.
      </label>
    </fieldset>

    <button type="submit">Enviar</button>
  </form>

<?php
require 'footer.php';
