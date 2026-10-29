<?php

/*
EXERCICI 1

- Copia l'array $concerts al teu fitxer.
- Mostra'l tot en una taula HTML amb les cinc columnes, fent servir foreach i la sintaxi alternativa.
- Mostra a part el nom del tercer concert accedint-hi directament, sense bucle.
- Formata el preu amb number_format().
*/

$concerts = [
  ['nom' => 'Lo', 'escenari' => 'Gran', 'hora' => '22:30', 'assistents' => 4200, 'preu' => 28.0],
  ['nom' => 'Reconozco', 'escenari' => 'Petit', 'hora' => '20:00', 'assistents' => 1850, 'preu' => 18.0],
  ['nom' => 'Soy', 'escenari' => 'Gran', 'hora' => '00:30', 'assistents' => 3600, 'preu' => 24.0],
  ['nom' => 'Ampeter', 'escenari' => 'Petit', 'hora' => '21:15', 'assistents' => 2100, 'preu' => 20.0],
  ['nom' => 'By', 'escenari' => 'Gran', 'hora' => '23:30', 'assistents' => 5100, 'preu' => 32.0],
  ['nom' => '7', 'escenari' => 'Petit', 'hora' => '18:45', 'assistents' => 900, 'preu' => 15.0],
];

/*
EXERCICI 2

- Copia l'array $escenaris: és associatiu als dos nivells.
- Mostra la capacitat de l'escenari Gran accedint-hi directament.
- Recorre'l amb dos foreach niats: el de fora per als escenaris i el de dins per als camps de cadascun.
*/

$escenaris = [
  'Gran' => [
    'capacitat' => 6000,
    'coberta' => 'no',
    'ubicacio' => 'Pista central',
  ],
  'Petit' => [
    'capacitat' => 2500,
    'coberta' => 'sí',
    'ubicacio' => 'Pavelló',
  ],
];

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Apartat 4</title>
</head>
<body>

  <h1>EXERCICI 1</h1>

  <table>
    <thead>
      <tr>
        <th>Nom</th>
        <th>Escenari</th>
        <th>Hora</th>
        <th>Assistents</th>
        <th>Preu</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($concerts as $concert): ?>
        <tr>
          <?php foreach ($concert as $camp => $valor): ?>
            <?php if ($camp == 'preu'): ?>
              <td><?= number_format($valor, 2, ',', '.') ?> €</td>
            <?php else: ?>
              <td><?= $valor ?></td>
            <?php endif; ?>
          <?php endforeach; ?>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

  <h2>Nom del tercer concert</h2>
  <p><?= $concerts[2]['nom'] ?></p>

  <h1>EXERCICI 2</h1>

  <h2>Capacitat de l'escenari Gran</h2>
  <p><?= $escenaris['Gran']['capacitat'] ?></p>

  <?php foreach ($escenaris as $nom => $dades): ?>
    <h2>Escenari <?= $nom ?></h2>
    <table>
      <thead>
        <tr>
          <th>Capacitat</th>
          <th>Coberta</th>
          <th>Ubicació</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <?php foreach ($dades as $valor): ?>
            <td><?= $valor ?></td>
          <?php endforeach; ?>
        </tr>
      </tbody>
    </table>
  <?php endforeach; ?>

</body>
</html>