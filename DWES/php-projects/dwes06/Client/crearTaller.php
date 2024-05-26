<?php
  require "vendor/autoload.php";

  // Comprobamos los datos que se han enviado por el formulario y los almacenamos
  if (isset($_POST["nombre"]) && is_string($_POST["nombre"])) {
      $nombre = htmlspecialchars(strip_tags($_POST["nombre"]));
  }

  if (isset($_POST["descripcion"]) && is_string($_POST["descripcion"])) {
      $descripcion = htmlspecialchars(strip_tags($_POST["descripcion"]));
  }

  if (isset($_POST["dia_semana"]) && is_string($_POST["dia_semana"])) {
      $diaSemana = htmlspecialchars(strip_tags($_POST["dia_semana"]));
  }

  if (isset($_POST["hora_inicio"]) && is_string($_POST["hora_inicio"])) {
      $horaInicio = htmlspecialchars(strip_tags($_POST["hora_inicio"]));
  }

  if (isset($_POST["hora_fin"]) && is_string($_POST["hora_fin"])) {
      $horaFin = htmlspecialchars(strip_tags($_POST["hora_fin"]));
  }

  if (isset($_POST["cupo_maximo"]) && is_numeric($_POST["cupo_maximo"])) {
      $cupoMaximo = htmlspecialchars($_POST["cupo_maximo"]);
  }

  if (isset($_POST["ubicacion_id"]) && is_numeric($_POST["ubicacion_id"])) {
      $ubicacionID = htmlspecialchars($_POST["ubicacion_id"]);
  }

  if (!isset($nombre) || !isset($descripcion) || !isset($diaSemana) || !isset($horaInicio) || !isset($horaFin) || !isset($cupoMaximo) || !isset($ubicacionID)) {
      header("Location: nuevoTaller.php");
      die();
  }


  // Utilización del endpoint /ubicaciones
  $client = new GuzzleHttp\Client(["http_errors" => false]);

  // Realizamos la consulta añadiendo los parametros
  $response = $client->request('POST', 'http://localhost:8000/api/ubicaciones/' . $ubicacionID . '/creartaller', [
      'form_params' => [
          'nombre' => $nombre,
          'descripcion' => $descripcion,
          'dia_semana' => $diaSemana,
          'hora_inicio' => $horaInicio,
          'hora_fin' => $horaFin,
          'cupo_maximo' => $cupoMaximo,
      ]
  ]);

  $json = $response->getBody()->getContents();
  $statusCode = $response->getStatusCode();
  $payload = json_decode($json, true);
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
        <h1>Resultado Creación Taller</h1>
        <div>
            <div class="result">
                <?php if ($statusCode == 200): ?>
                      <h3> (<?php echo $statusCode; ?>) OK: El taller se ha creado correctamente </h3>
                  <?php elseif ($statusCode == 404): ?>
                      <h3>(<?php echo $statusCode; ?>) No Existe: La Ubicación indicada no existe </h3>
                  <?php elseif ($statusCode == 422): ?>
                      <h3>(<?php echo $statusCode; ?>) Error: Los datos indicados no son válidos: </h3>


                      <ul class="errorList">
                          <?php foreach ($payload["errores"] as $error => $msg): ?>
                              <li> <?php echo $error . ": " . $msg[0]; ?>
                              <?php endforeach; ?>
                      </ul>
                  <?php endif; ?>
            </div>
        </div>
    </body>
</html>