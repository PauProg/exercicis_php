<?php
declare(strict_types=1); // primera linia del fitxer
function peu(): void
{
    echo '<footer>...</footer>';
}

peu();

function targeta(string $nom, float $preu, int $estoc):void
{
    echo "<h3>$nom</h3><p>Preu: $preu €</p><p>Estoc: $estoc unitats</p>";
}

targeta('Producte 1', 19.99, 10); // l'ordre importa

function preuAmbIva(
    float $base,
    float $iva = 0.21
): float
{
    return round($base * (1 + $iva), 2);
}

preuAmbIva(100); // 121
preuAmbIva(100, 0.10); // 110


// area('3', '4.0'); // 12 , no es queixa el tipus de dades, es fa la conversió automàtica

/*
$botiga = 'BitBazar';

function mostra():string {
    return '$nom a ' . $botiga; // no es pot accedir a la variable $botiga, ja que està fora de l'àmbit de la funció
}

// warning: Variable $botiga is not defined in this scope

*/
function compta():int {
    $n = 0;
    $n++;
    return $n; // sempre retorna 1, ja que la variable $n es crea i s'inicialitza a 0 cada vegada que s'executa la funció
}
// 1, 1, 1, 1, 1

function comptaStatic():int {
    static $n = 0; // la variable $n es crea només una vegada i conserva el seu valor entre crides a la funció
    $n++;
    return $n;
}

// 1, 2, 3, 4, 5

/*
function valorEstoc(array $p):float {
    $total = 0.0;
    foreach ($p as $item) {
        $total += $item['preu];
    }
    return $total;
}

function disponibles(array $p):array {
    $res = [];
    foreach ($p as $item) {
        if ($item['estoc'] > 0) {
            $res[] = $item;
        }
    }
    return $res;
}

*/

?>