<?php
  require 'vendor/autoload.php';

  // Utilización del endpoint /ubicaciones
  $client = new GuzzleHttp\Client(["http_errors" => false]);

  $response = $client->request('GET', 'http://localhost:8000/api/ubicaciones');
  $json = $response->getBody()->getContents();
  $dataUbicaciones = json_decode($json, true);
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
        <h1>Ubicaciones Disponible</h1>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Dias</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($dataUbicaciones as $ubicacion): ?>
                      <tr>
                          <td><?php echo $ubicacion['id']; ?></td>
                          <td><?php echo $ubicacion['nombre']; ?></td>
                          <td><?php echo $ubicacion['descripcion']; ?></td>
                          <td><?php echo $ubicacion['dias']; ?></td>
                      </tr>
                  <?php endforeach; ?>
            </tbody>
        </table>
    </body>
</html>