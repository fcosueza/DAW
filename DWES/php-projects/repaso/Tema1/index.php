<?php
  $puntuaciones = [
      "Jugador1" => 100,
      "Jugador2" => 200,
      "Jugador3" => 150,
      "Jugador4" => 120
  ];

  function mostrarPuntuaciones($puntuaciones) {
      foreach ($puntuaciones as $jugador => $puntuacion) {
          print "<p> El $jugador tiene una puntuación de $puntuacion";
      }
  }

  function agregarPuntuaciones(&$puntuaciones, $jugador, $puntuacion) {
      if (is_string($jugador) && is_int($puntuacion)) {
          $puntuaciones[$jugador] = $puntuacion;
      }
  }

  function promedioPuntuaciones($puntuaciones) {
      return array_sum($puntuaciones) / count($puntuaciones);
  }

  function mejorJugador($puntuaciones) {
      return implode(array_keys($puntuaciones, max($puntuaciones)));
  }

  function eliminarJugador(&$puntuaciones, $jugador) {
      if (in_array($jugador, array_keys($puntuaciones))) {
          unset($puntuaciones[$jugador]);
          return "El jugador se ha elimnado correctamente.";
      }

      return "Error: El jugador no existe.";
  }
?>

<!DOCTYPE html>

<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Fco Sueza" />
        <meta name="description" content="Proyecto para repasar el Tema 1 de la Asignatura DWES" />

        <title>Repaso Tema 1</title>
    </head>

    <body>
        <h1> Puntuaciones de los Jugadores </h1>
        <?php mostrarPuntuaciones($puntuaciones) ?>

        <?php agregarPuntuaciones($puntuaciones, "Jugador5", 500) ?>

        <h1> Puntuaciones Actualizadas </h1>
        <?php mostrarPuntuaciones($puntuaciones) ?>

        <h1> Media de las Puntuaciones </h1>
        <p> Media: <?= promedioPuntuaciones($puntuaciones) ?>

        <h1> Jugador con la Puntuación más alta </h1>
        <p> Jugador: <?= mejorJugador($puntuaciones) ?>

        <h1> Eliminar al Jugador2 </h1>
        <p> Resultado: <?= eliminarJugador($puntuaciones, "Jugador2") ?>

        <h1> Puntuaciones Actualizadas </h1>
        <?php mostrarPuntuaciones($puntuaciones) ?>

        <h1>Formulario de Contacto</h1>
        <form action="procesar_formulario.php" method="post">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required><br><br>

            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" required><br><br>

            <label for="mensaje">Mensaje:</label><br>
            <textarea id="mensaje" name="mensaje" rows="5" cols="40" required></textarea><br><br>

            <input type="checkbox" id="suscripcion1" name="suscripcion[]" value="noticias">
            <label for="suscripcion1">Suscribirme al boletín de noticias</label><br><br>
            <input type="checkbox" id="suscripcion2" name="suscripcion[]" value="eventos">
            <label for="suscripcion2">Suscribirme al boletín de eventos</label><br><br>
            <input type="checkbox" id="suscripcion3" name="suscripcion[]" value="lanzamientos">
            <label for="suscripcion3">Suscribirme al boletín de lanzamientos</label><br><br>

            <label for="pais">País:</label>
            <select id="pais" name="pais">
                <option value="es">España</option>
                <option value="mx">México</option>
                <option value="ar">Argentina</option>
                <option value="co">Colombia</option>
                <option value=""></option>
            </select><br><br>

            <input type="submit" value="Enviar">
        </form>
    </body>
</html>
