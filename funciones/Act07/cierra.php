<?php
session_start();

$_SESSION = [];
session_destroy();

echo 'Sesión cerrada. <a href="sesion.php">Volver al contador</a>';