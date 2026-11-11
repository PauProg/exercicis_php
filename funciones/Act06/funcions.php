<?php
/**
 * Funciones propias del proyecto.
 * Este archivo NO escribe nada en pantalla.
 */

/**
 * Recoge un campo de texto del formulario ya limpio de espacios.
 *
 * @param string $field   Nombre del campo (el atributo name del formulario)
 * @param string $default Valor si el campo no ha llegado
 * @return string         El valor limpio
 */
function field(string $field, string $default = ''): string
{
    return trim($_POST[$field] ?? $default);
}

/**
 * Convierte la clave del array en una etiqueta legible.
 *
 * @param string $key Clave del array ('postal-code', 'birthdate'...)
 * @return string     Etiqueta para mostrar en la tabla
 */
function label(string $key): string
{
    $labels = [
        'name'              => 'Nombre',
        'surnames'          => 'Apellidos',
        'birthdate'         => 'Fecha de nacimiento',
        'phone'             => 'Teléfono',
        'email'             => 'Correo',
        'username'          => 'Nombre de usuario',
        'passwordHash'      => 'Contraseña',
        'street'            => 'Calle y número',
        'city'              => 'Población',
        'postal-code'       => 'Código postal',
        'type'              => 'Tipo de cliente',
        'how-found-us'      => 'Cómo nos ha conocido',
        'accept-bulletin'   => 'Promociones',
        'accept-conditions' => 'Condiciones aceptadas',
        'usercode'          => 'Código de usuario',
    ];

    return $labels[$key] ?? ucfirst($key);
}

/**
 * Convierte una fecha del formulario al formato de pantalla.
 *
 * @param string $date Fecha en formato Y-m-d
 * @return string      Fecha en formato d/m/Y, o el valor original si no es válida
 */
function formatDate(string $date): string
{
    $parsed = DateTimeImmutable::createFromFormat('!Y-m-d', $date);
    $errors = DateTimeImmutable::getLastErrors();

    if ($parsed === false || ($errors !== false && $errors['warning_count'] > 0)) {
        return $date;
    }

    return $parsed->format('d/m/Y');
}

/**
 * Genera el código de usuario a partir de los apellidos.
 *
 * @param string $surnames Apellidos del usuario
 * @return string          Prefijo de tres letras en mayúsculas y cuatro cifras
 */
function userCode(string $surnames): string
{
    $prefix = mb_strtoupper(mb_substr($surnames, 0, 3), 'UTF-8');
    $prefix = $prefix === '' ? 'USR' : $prefix;

    return $prefix . '-' . random_int(1000, 9999);
}
