<?php
  /*
    DNI: 75131618w
    NOMBRE y APELLIDOS: Francisco Sueza Rodríguez
   */

  require_once "./funciones.php";

  // Comprobamos que se han introducido los datos
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (isset($_POST["estado"]) && is_string($_POST["estado"])) {
          $estado = $_POST["estado"];
          $frase = getSentence($estado);
      }
  }


  // Creamos el array con todas las emociones
  $emociones = getEmotions();

  if (!isset($emociones)) {
      $error = "No se ha podido abrir el fichero";
  }
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio 1</title>
    </head>


    <?php if (isset($error)) : ?>
          <h1> Error: No se ha podido abrir el fichero </h1>

      <?php elseif (!isset($frase) || $frase == false) : ?>
          <form action="" method="post">
              <select name="estado">
                  <?php foreach ($emociones as $emocion): ?>
                      <option value=<?= $emocion ?>><?= $emocion ?></option>
                  <?php endforeach; ?>
              </select>
              <input type="submit" value="¡Enviar!">
          </form>
      <?php else : ?>
          <h1><?= $frase ?></h1>
    <?php endif; ?>

</html>