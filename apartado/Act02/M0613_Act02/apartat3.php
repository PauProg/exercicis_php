<?php

/*
EXERCICI 1

- Amb in_array(), comprova si dos grups concrets són al cartell i mostra un missatge diferent per a cada cas.
- Escriu la funció buscaGrup(array $llista, string $grup), que torni la posició on és el grup o -1 si no hi és.
- Prova-la amb un grup que hi sigui i un que no.
*/

$grups = array('DISOBEY', 'roomtrash6', 'cybernene', 'yyy891', '8belial');

function buscaGrup(array $llista, string $grup) {
  foreach ($llista as $posicio => $nom) {
    if ($nom === $grup) {
      return $posicio; // el return surt de la funció immediatament
    }
  }

  return -1;
}

/*
EXERCICI 2

- Crea un array associatiu grup => nombre d'assistents, amb cinc grups.
- Fes quatre còpies i aplica a cadascuna asort(), arsort(), ksort() i krsort().
- Mostra els quatre resultats, cadascun amb el seu títol.
- Explica en un comentari la diferència entre asort() i ksort().
*/

$assistents = array(
  'DAW1' => 18,
  'DAW2' => 23,
  'ASIX1' => 21,
  'ASIX2' => 30,
  'SMIX1' => 25
);

$a1 = $assistents;
$a2 = $assistents;
$a3 = $assistents;
$a4 = $assistents;

asort($a1);
arsort($a2);
ksort($a3);
krsort($a4);

// asort ordena per valors, ksort per clau

/*
EXERCICI 3

- Aplica shuffle() a l'array associatiu de l'exercici anterior i mostra'l amb print_r().
- Explica què ha passat amb els noms dels grups.
- Fes-ho bé: barreja un array on els noms dels grups siguin el valor, i mostra l'ordre del sorteig en una llista numerada.
*/

shuffle($assistents);

// Els noms han desaparegut, s'han assignat desde 0 (0, 1, 2...)

// Fem-ho bé: els noms dels grups com a VALORS d'un array normal
$noms = array('DAW1', 'DAW2', 'ASIX1', 'ASIX2', 'SMIX1');
shuffle($noms);

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Apartat 3</title>
</head>
<body>

  <h1>EXERCICI 1</h1>

  <h2>in_array()</h2>
  <?php

  $buscar = 'yyy891';
  $buscarNoExisteix = 'enric';

  if (in_array($buscar, $grups, true)) {
    echo "<p>$buscar és al cartell</p>";
  } else {
    echo "<p>$buscar no és al cartell</p>";
  }

  if (in_array($buscarNoExisteix, $grups, true)) {
    echo "<p>$buscarNoExisteix és al cartell</p>";
  } else {
    echo "<p>$buscarNoExisteix no és al cartell</p>";
  }

  ?>

  <h2>Funció buscaGrup</h2>
  <p>roomtrash6: posició <?= buscaGrup($grups, 'roomtrash6') ?></p>
  <p>enric: posició <?= buscaGrup($grups, 'enric') ?></p>

  <h1>EXERCICI 2</h1>

  <h2>asort()</h2>
  <pre><?php print_r($a1); ?></pre>

  <h2>arsort()</h2>
  <pre><?php print_r($a2); ?></pre>

  <h2>ksort()</h2>
  <pre><?php print_r($a3); ?></pre>

  <h2>krsort()</h2>
  <pre><?php print_r($a4); ?></pre>

  <h1>EXERCICI 3</h1>

  <h2>shuffle() sobre l'array associatiu</h2>
  <pre><?php print_r($assistents); ?></pre>

  <h2>Ordre del sorteig</h2>
  <ol>
    <?php foreach ($noms as $nom): ?>
      <li><?= $nom ?></li>
    <?php endforeach; ?>
  </ol>

</body>
</html>