<?php

// definicion de una funcion
// function nombreFuncion($parametro1, $parametro2) {
//     // cuerpo de la funcion
//     return $resultado;
// }


function funcionTest(){
    $var = 10;
    return $var;
}

// como la funcion tiene un return, tengo que igualar el resultado a una variable para 
// recoger el valor que devuelve el return

$var_fun = funcionTest();
echo "El valor de la variable es: $var_fun" . "<br>";


// funcion sin return
function funcionTestSin(){
    // variable local, solo existe dentro de la funcion
    $var = 20;
    echo "El valor de la variable es: $var" . "<br>";
}

funcionTestSin();

// como podemos utilizar dentro de las funciones variables globales, 
// es decir, variables que estan definidas fuera de la funcion, para ello tenemos 
// que utilizar la palabra reservada global
$var2 = 50;

function funcionConGlobal(){
    global $var2; // palabra reservada global para poder utilizar la variable $var2 que esta definida fuera de la funcion
    echo "El valor de la variable es: $var2" . "<br>";
}

funcionConGlobal();

// recursividad, una funcion que se llama a si misma
function factorial($numero) {
    // factorial de 5 es 5 * 4 * 3 * 2 * 1 = 120
    if ($numero == 1) {
        return $numero;
    } else {
        return $numero * factorial($numero - 1);
    }
}

echo "El factorial de 7 es: " . factorial(7) . "<br>";

?>