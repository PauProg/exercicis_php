<?php

/*
EXERCICI 1

- Crea $grups amb assignació directa: cinc grups, i fes que un vagi a la posició 8 i el següent sense indicar posició.
- Crea $estils amb array() i $edicions amb range(2019, 2026).
- Parteix una frase en paraules amb explode() i desa-la a $paraules.
- Mostra els quatre arrays amb print_r() dins del <pre>.
- Mostra un dels arrays amb print_r(), var_dump() i var_export(), i escriu en un comentari quina diferència hi veus.
*/

/*
Atenció: mira bé els índexs de $grups després del 8. Per què el grup següent no va a la posició 2?

No va a la posició 2 (al meu cas la 3), perqué busca l'última posició que té
l'array, en aquest cas la 8, i ho possa a la següent.
*/

$grups[0] = 'DISOBEY';
$grups[1] = 'roomtrash6';
$grups[2] = 'cybernene';
$grups[8] = 'yyy891';
$grups[] = '8belial';

$estils = array('rap', 'pop', 'clasic', 'flamenc');

$edicions = range(2019, 2026);

$paraules = explode(' ', 'Lo reconozco soy ampeter');

/*
EXERCICI 2

- Crea $estils com a array associatiu on la clau sigui el nom del grup i el valor, el seu estil musical. Posa'n dos amb assignació directa i dos més amb array().
- Mostra per pantalla l'estil d'un grup concret accedint-hi per la clau.
- Afegeix-hi un grup nou i mostra l'array sencer amb print_r().
- Mostra quants grups hi ha amb count().
*/

// Dos grups amb array()
$estils2 = array(
  $grups[8] => 'swag',   // grups[8] = yyy891
  $grups[9] => 'reggae'  // grups[9] = 8belial
);

// Dos grups amb assignació directa
$estils2[$grups[1]] = 'reggaeton'; // grups[1] = roomtrash6
$estils2[$grups[2]] = 'drill';     // grups[2] = cybernene

// Grup nou
$estils2[$grups[0]] = 'locurote';  // grups[0] = DISOBEY

/*
EXERCICI 3

- Crea un array de cinc grups amb índexs numèrics i mostra count().
- Esborra el tercer grup amb unset() i torna a mostrar l'array i el count().
- Afegeix-hi un grup nou amb [] i mira a quina posició ha anat a parar.
- Explica en un comentari per què, després d'un unset(), un bucle for de 0 a count()-1 pot fallar.
*/

$compositors = array('chopin', 'liszt', 'schumann', 'rachmaninoff', 'moszkowski');

/*
El bucle falla perque va de 0 a count()-1, al meu cas en un principi sería de 0 a 4, llavors si jo faig un unset
del 2 (tercera posició) faría:

0 => chopin
1 => liszt
2 => peta

Per que no n'hi ha res
*/

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Apartat 1</title>
</head>
<body>

  <h1>EXERCICI 1</h1>

  <!--
    L'etiqueta <pre> mostra el text tal com està escrit dins d'aquesta,
    respectant els espais, els salts de línia i amb una font d'amplada
    fixa.
  -->

  <h2>print_r de cada array</h2>
  <h3>Grups</h3>
  <pre><?php print_r($grups); ?></pre>
  <h3>Estils</h3>
  <pre><?php print_r($estils); ?></pre>
  <h3>Edicions</h3>
  <pre><?php print_r($edicions); ?></pre>
  <h3>Paraules</h3>
  <pre><?php print_r($paraules); ?></pre>

  <h2>Diferències entre print_r, var_dump i var_export</h2>
  <h3>print_r()</h3>
  <!-- print_r() mostra el contingut de l'array amb els índexs de cada element -->
  <pre><?php print_r($paraules); ?></pre>

  <h3>var_dump()</h3>
  <!-- var_dump() mostra quants elements té l'array, el contingut amb els índexs, i el tipus
  de cada element que tenim dins l'array -->
  <pre><?php var_dump($paraules); ?></pre>

  <h3>var_export()</h3>
  <!-- var_export() mostra les dades prácticament igual que a print_r(), només
  canvia el format d'aquestes, tenim el número dels índexs sense '[]', i els
  elements envoltats en cometes simples -->
  <pre><?php var_export($paraules); ?></pre>

  <h1>EXERCICI 2</h1>

  <h2>Estil d'un grup</h2>
  <p><?= "Estil de $grups[2]: " . $estils2[$grups[2]] ?></p>

  <h2>Array sencer</h2>
  <pre><?php print_r($estils2); ?></pre>

  <h2>Número de grups</h2>
  <p><?= count($estils2) ?></p>

  <h1>EXERCICI 3</h1>

  <h2>Array abans d'unset</h2>
  <p>Número de compositors: <?= count($compositors) ?></p>
  <pre><?php print_r($compositors); ?></pre>

  <!-- Hago el unset aquí que sino me pilla 4 los dos count -->
  <?php unset($compositors[2]); ?>

  <h2>Array després d'unset</h2>
  <p>Número de compositors: <?= count($compositors) ?></p>
  <pre><?php print_r($compositors); ?></pre>

  <?php $compositors[] = 'griegg'; ?>

  <h2>Després d'afegir un compositor amb []</h2>
  <p>El nou ha anat a la posició <?= array_key_last($compositors) ?></p>
  <pre><?php print_r($compositors); ?></pre>

</body>
</html>