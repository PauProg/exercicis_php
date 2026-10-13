<?php

/*
EXERCICI 1

- Amb el teu array de grups, genera una llista <ul> amb un <li> per grup, fent servir foreach i la sintaxi alternativa.
- Fes-ne una segona versió que mostri també la posició de cada grup.
*/

$grups = array('DISOBEY', 'roomtrash6', 'cybernene', 'yyy891', '8belial');

/*
EXERCICI 2

- Amb l'array associatiu grup => estil, genera una taula HTML amb dues columnes.
- Afegeix una fila al final amb el total de grups.
*/

$estils = array(
  $grups[0] => 'swag',
  $grups[1] => 'reggae',
  $grups[2] => 'reggaeton',
  $grups[3] => 'drill',
  $grups[4] => 'locurote'
);

/*
EXERCICI 3

- Recorre el mateix array associatiu amb do-while i les funcions reset(), key(), current() i next().
- Comprova que la sortida és idèntica a la de l'E2.
- Escriu en un comentari quina de les dues maneres et sembla més clara i per què.
*/

/*
EXERCICI 4

- Escriu la funció recorrerInvers(array $llista) que mostri els elements de l'últim al primer amb end(), key(), current() i prev().
- Crida-la passant-li l'array de grups i estils.
- Després de cridar-la, recorre l'array original amb un foreach normal i comprova que no s'ha vist afectat.
*/

function recorrerInvers(array $llista) {
  // Ens situem a l'última casella
  end($llista);

  do {
    $index = key($llista);
    $valor = current($llista);
    echo "$index => $valor\n";
  } while (prev($llista)); // retrocedim; a la primera, prev() torna false
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Apartat 2</title>
</head>
<body>

  <h1>EXERCICI 1</h1>

  <h2>Llista de grups</h2>
  <ul>
    <?php foreach ($grups as $grup): ?>
      <li><?= $grup ?></li>
    <?php endforeach; ?>
  </ul>

  <h2>Llista de grups amb posició</h2>
  <ul>
    <?php foreach ($grups as $index => $grup): ?>
      <li>Grup <?= $index ?> - <?= $grup ?></li>
    <?php endforeach; ?>
  </ul>

  <h1>EXERCICI 2</h1>

  <h2>Taula amb foreach</h2>
  <table>
    <thead>
      <tr>
        <th>Grup</th>
        <th>Estil musical</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($estils as $grup => $estil): ?>
        <tr>
          <td><?= $grup ?></td>
          <td><?= $estil ?></td>
        </tr>
      <?php endforeach; ?>
      <tr>
        <td>Total grups</td>
        <td><?= count($estils) ?></td>
      </tr>
    </tbody>
  </table>

  <h1>EXERCICI 3</h1>

  <h2>Taula amb do-while</h2>
  <table>
    <thead>
      <tr>
        <th>Grup</th>
        <th>Estil musical</th>
      </tr>
    </thead>
    <tbody>
      <?php
      // Ens situem a la primera casella
      reset($estils);

      do {
        $grup = key($estils);
        $estil = current($estils);
        echo "<tr><td>$grup</td><td>$estil</td></tr>";
      } while (next($estils)); // avancem; al final, next() torna false

      ?>
      <tr>
        <td>Total grups</td>
        <td><?= count($estils) ?></td>
      </tr>
    </tbody>
  </table>

  <!-- 
  Em sembla moltísim més clar amb el foreach, amb el do-while estem
  fent el mateix que fa aquest pero de manera manual i amb més codi
  -->

  <h1>EXERCICI 4</h1>

  <h2>Grups recorreguts a l'inrevés</h2>
  <pre><?php recorrerInvers($grups); ?></pre>

  <h2>Estils recorreguts a l'inrevés</h2>
  <pre><?php recorrerInvers($estils); ?></pre>

  <h2>Arrays originals amb foreach (no han canviat)</h2>
  <ul>
    <?php foreach ($grups as $index => $grup): ?>
      <li>Grup <?= $index ?> - <?= $grup ?></li>
    <?php endforeach; ?>
  </ul>
  <ul>
    <?php foreach ($estils as $grup => $estil): ?>
      <li><?= $grup ?> - <?= $estil ?></li>
    <?php endforeach; ?>
  </ul>

</body>
</html>