<?php
  require "vendor/autoload.php";

  // Utilización del endpoint /ubicaciones
  $client = new GuzzleHttp\Client(["http_errors" => false]);

  $response = $client->request('GET', 'http://localhost:8000/api/ubicaciones');
  $json = $response->getBody()->getContents();
  $dataUbicaciones = json_decode($json, true);

  // Utilización del endpoint /ubicaciones/{idUbicacion}/talleres

  $ubicacionTaller = 2;

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
        <h1>Utilización API Respira</h1>
        <h2> Todas las Ubicaciones</h2>

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
                <?php
                  if (isset($dataUbicaciones)) {
                      foreach ($dataUbicaciones as $ubicacion) {
                          print '<tr>';
                          print '<td>' . $ubicacion['id'] . '</td>';
                          print '<td>' . $ubicacion['nombre'] . '</td>';
                          print '<td>' . $ubicacion['descripcion'] . '</td>';
                          print '<td>' . $ubicacion['dias'] . '</td>';
                          print '</tr>';
                      }
                  }
                ?>
            </tbody>
        </table>

        <h2> Talleres en una Ubicación</h2>
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
                <?php
                  if (isset($dataTalleres)) {
                      foreach ($dataTalleres as $taller) {
                          print '<tr>';
                          print '<td>' . $taller['id'] . '</td>';
                          print '<td>' . $taller['nombre'] . '</td>';
                          print '<td>' . $taller['descripcion'] . '</td>';
                          print '<td>' . $taller['dia_semana'] . '</td>';
                          print '<td>' . $taller['hora_inicio'] . '</td>';
                          print '<td>' . $taller['hora_fin'] . '</td>';
                          print '<td>' . $taller['cupo_maximo'] . '</td>';
                          print '<td>' . $taller['ubicacion_id'] . '</td>';
                          print '</tr>';
                      }
                  }
                ?>
            </tbody>
        </table>
    </body>
</html>