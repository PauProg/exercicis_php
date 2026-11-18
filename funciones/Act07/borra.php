<?php
setcookie('ultimaVisita', '', time() - 3600);

echo 'Cookie borrada. <a href="cookie.php">Volver al contador</a>';