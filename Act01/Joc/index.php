<?php

const NOMBRE_JUEGO = "Ampeterby7Jump";
const VIDA_MAX = 125;
const XP_NIVEL = 67;
const FUERZA_MAX = 270;
const HERIDO_PORCENTAJE = 20;

$nombre = "Ampeter";
$clase = "Arquero";
$nivel = 19;
$xp = 28;

// Calculo cuánta XP le falta para subir de nivel
$xp_siguiente_nivel = XP_NIVEL - $xp;

// Calculo la vida actual multiplicando la vida máxima por el porcentaje de daño
// También calculo el porcentaje que representa esta vida sobre la máxima
$vida_actual = round(VIDA_MAX * (1 - (HERIDO_PORCENTAJE / 100)));
$vida_porcentaje = round(($vida_actual / VIDA_MAX) * 100, 1);

$fuerza_actual = 100;
// Calculo qué porcentaje de fuerza tiene el personaje
$fuerza_porcentaje = round(($fuerza_actual / FUERZA_MAX) * 100, 1);

$ataque_base = 3;

// Calculo cuánto ataque tiene teniendo en cuenta que aumenta con cada nivel
$poder_ataque = $ataque_base * $nivel;
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Pongo el título con un echo de la variable del nombre del personaje -->
  <title>Ficha de <?php echo $nombre ?></title>
  <link rel="stylesheet" href="style.css">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Google+Sans:ital,opsz,wght@0,17..18,400..700;1,17..18,400..700&display=swap" rel="stylesheet">
</head>
<body>

  <!-- Aquí en vez del echo he usado el = para ahorrarme código -->
  <h1><?= NOMBRE_JUEGO ?></h1>
  <p>Ficha de personaje</p>

  <div class="ficha">
    <h2><?= $nombre ?></h2>

    <!-- Aquí he usado la concatenación con comillas dobles -->
    <p><?= "$clase - Nivel $nivel" ?></p>

    <div class="barraVida">
      <div class="numeros">
        <p>Vida</p>
        <p><?= $vida_actual . ' / ' . VIDA_MAX . ' (' . $vida_porcentaje . '%)' ?></p>
      </div>

      <!-- Uso el porcentaje para darle el ancho a la barra de vida y fuerza -->
      <div class="barra"><span class="vida" style="width: <?= $vida_porcentaje ?>%"></span></div>
    </div>
    
    <div class="barraFuerza">
      <div class="numeros">
        <p>Fuerza</p>
        <p><?php echo $fuerza_actual . ' / ' . FUERZA_MAX . ' (' . $fuerza_porcentaje  . '%)' ?> </p>
      </div>
      <div class="barra"><span class="fuerza" style="width: <?= $fuerza_porcentaje ?>%"></span></div>
    </div>

    <div class="stats">
      <div class="numeros">
        <p>Poder de ataque</p>
        <p><?= $poder_ataque ?></p>
      </div>

      <div class="separador"></div>

      <div class="numeros">
        <p>Experiencia</p>
        <p><?= $xp . ' / ' . XP_NIVEL ?></p>
      </div>

      <div class="separador"></div>

      <div class="numeros">
        <p>Le faltan</p>
        <p><?= $xp_siguiente_nivel ?> puntos para subir de nivel</p>
      </div>
    </div>

    <!-- He hecho que solo si está herido, salga una etiqueta de "Herido" -->
    <?php 
      if (HERIDO_PORCENTAJE != 0) {
        echo "<p class='tag'>Herido</p>";
      }
    ?>

  </div>

</body>
</html>