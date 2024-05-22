<?php
  require "vendor/autoload.php";

  // Utilización del endpoint /ubicaciones
  $client = new GuzzleHttp\Client(["http_errors" => false]);

  $response = $client->request('POST', 'http://localhost:8000/api/ubicaciones');
  $json = $response->getBody()->getContents();
  $dataUbicaciones = json_decode($json, true);
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="author" content="Francisco Sueza Rodríguez" />
        <meta name="description" content="Formulario para la creación de un nuevo taller" />

        <link rel="stylesheet" href="style/style.css">

        <title>API de la Asociación Respira</title>

    </head>
    <body>
        <h1>Formulario de Creación del Taller</h1>

        <form method="POST" action="/nuevoTaller.php">
        </form>

    </body>
</html>

