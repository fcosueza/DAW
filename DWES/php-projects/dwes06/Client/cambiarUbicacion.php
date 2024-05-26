<?php
  require "vendor/autoload.php";

  if (isset($_POST["tallerID"]) && is_numeric($_POST["tallerID"])) {
      $tallerID = htmlspecialchars($_POST["tallerID"]);

      $client = new GuzzleHttp\Client(["http_errors" => false]);
      $response = $client->request("PATCH", "http://localhost:8000/api/talleres/" . $tallerID . "/cambiarubicacion", [
          "json" => [
              "nueva_ubicacion" => $_POST["ubicacionID"]
          ]
      ]);

      $payload = json_decode($response->getBody()->getContents());
      $statusCode = $response->getStatusCode();
  }
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

        <?php if (isset($statusCode)): ?>
              <h1>Resultado Modificación Taller</h1>
              <div>
                  <div class="result">
                      <?php if ($statusCode == 200): ?>
                          <h3> (<?php echo $statusCode; ?>) OK: El taller se ha modificado correctamente. </h3>
                      <?php else: ?>
                          <h3><?php echo "(" . $statusCode . ") Error: " . $payload->error; ?>  </h3>
                      <?php endif; ?>
                  </div>
              </div>

          <?php else: ?>
              <h1>Formulario para Modificar la Ubicación de un Taller</h1>

              <form method="POST" action="./cambiarUbicacion.php">
                  <div>
                      <label>Id del Taller:</label>
                      <input type="number" name="tallerID">
                  </div>
                  <div>
                      <label>Id de la ubicación:</label>
                      <input type="number" name="ubicacionID">
                  </div>
                  <button type="submit">Enviar</button>
              </form>
        <?php endif; ?>

    </body>
</html>

