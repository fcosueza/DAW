<?php
  require "vendor/autoload.php";

  // Comprobamos el parametro GET

  if (isset($_GET['ubicacion']) && is_numeric($_GET['ubicacion'])) {
      $ubicacionTaller = $_GET['ubicacion'];
  } else {
      $ubicacionTaller = 2;
  }

  $client = new GuzzleHttp\Client(["http_errors" => false]);

  // Utilización del endpoint /ubicaciones/{idUbicacion}/talleres
  $response = $client->request('GET', 'http://localhost:8000/api/ubicaciones/' . $ubicacionTaller . '/talleres');
  $json = $response->getBody()->getContents();
  $dataTalleres = json_decode($json, true);
?>


<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="author" content="Francisco Sueza Rodríguez" />
        <meta name="description" content="Página para visualizar los resultado de las llamadas a la API" />

        <link rel="stylesheet" href="style/style.css">

        <title>API de la Asociación Respira</title>

    </head>
    <body>
        <h1>Talleres de la Ubicación</h1>

        <?php if (!isset($dataTalleres["error"])): ?>
              <table>
                  <thead>
                      <tr>
                          <th>ID</th>
                          <th>Nombre</th>
                          <th>Descripcion</th>
                          <th>Dia de la Semana</th>
                          <th>Hora de Inicio</th>
                          <th>Hora de Fin</th>
                          <th>Cupo Máximo</th>
                          <th>ID Ubicación</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php foreach ($dataTalleres as $taller): ?>
                          <tr>
                              <td><?php echo $taller['id']; ?></td>
                              <td><?php echo $taller['nombre']; ?></td>
                              <td><?php echo $taller['descripcion']; ?></td>
                              <td><?php echo $taller['dia_semana']; ?></td>
                              <td><?php echo $taller['hora_inicio']; ?></td>
                              <td><?php echo $taller['hora_fin']; ?></td>
                              <td><?php echo $taller['cupo_maximo']; ?></td>
                              <td><?php echo $taller['ubicacion_id']; ?></td>
                          </tr>
                      <?php endforeach; ?>
                  </tbody>
              </table>
          <?php else: ?>
              <h2>Error: La ubicación seleccionada no existe</h2>
        <?php endif; ?>
    </body>
</html>