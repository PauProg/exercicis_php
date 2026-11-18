<?php
/*
  Pedimos al navegador que se guarde la hora, durante una hora
  Ahora podemos usar las varaibles con camelCase, más adelante,
  en las BBDD, usaremos las variables con '_'
*/
// echo 'Ampeter';
setCookie('ultimaVisita', date('H:i:s'), time() + 3600);

// Si existe la cookie ultimaVisita
if (isset($_COOKIE['ultimaVisita'])) {
  echo 'Estabas a las ' . $_COOKIE['ultimaVisita'];
} else {
    echo 'Todavía no hay ninguna cookie.';
}