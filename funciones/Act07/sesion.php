<?php
// Aquesta línia ha de ser la PRIMERA de totes, sempre
session_start();

$_SESSION['visitas'] = ($_SESSION['visitas'] ?? 0) + 1;

echo 'Visitas: ' . $_SESSION['visitas'] . '<br>';
echo 'ID de sesión: ' . session_id() . '<br>';
echo 'Carpeta de sesiones: ' . session_save_path();