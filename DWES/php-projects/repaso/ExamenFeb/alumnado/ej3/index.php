<?php
  /*
    DNI:
    NOMBRE y APELLIDOS:
   */

  require_once "conf.php";

  session_start();

  if (!isset($_SESSION["peticiones"])) {
      $_SESSION["peticiones"] = array();
  }

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (isset($_POST["texto"]) && is_string($_POST["texto"])) {
          array_push($_SESSION["peticiones"], ["texto" => $_POST["texto"], "recuento" => contarPalabras($_POST["texto"])]);
          print_r($_SESSION);
      } elseif ($_POST["reiniciar"]) {
          $result = $_SESSION["peticiones"];
          session_destroy();
      }
  }

  /**
   *
   * @param type $text
   */
  function contarPalabras($text) {
      $recuento = ["articulos" => 0, "determinantes" => 0, "nexos" => 0, "preposiciones" => 0];
      $formatText = preg_split('/[\s,.?¿\"\'!:;]+/', $text);

      foreach ($formatText as $word) {
          foreach (PALABRAS as $tipo => $palabras) {
              if (in_array(strtolower($word), $palabras)) {
                  $recuento[$tipo]++;
              }
          }
      }

      return $recuento;
  }
?>
<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio 3</title>
    </head>

    <body>
        <form action="" method="post">
            Introduce tu texto:<br><textarea name="texto" cols="30" rows="10"></textarea><BR>
            <input type="submit" value="¡Contar!">
        </form>
        <br><br>
        <form action="" method="post">
            <input type="hidden" name="reiniciar" value="si">
            <input type="submit" value="¡Reiniciar Recuento!">
        </form>
        <br><br>
        <H2>Recuento </H2>
        <p>... salida de la aplicación ...</p>

        <?php if (isset($result)): ?>
              <table>
                  <thead>
                      <tr>
                          <th>Peticion</th>
                          <th>Texto</th>
                          <th>Recuento</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php for ($i = 0; $i < count($result); $i++): ?>
                          <tr>
                              <td><?php echo $i + 1; ?></td>
                              <td><?php echo $result[$i]["texto"]; ?></td>
                              <td>
                                  <?php foreach ($result[$i]["recuento"] as $tipo => $value): ?>
                                      <?php echo $tipo . ":" . $value . "<br>"; ?>
                                  <?php endforeach; ?>
                              </td>
                          </tr>
                      <?php endfor; ?>
                  </tbody>
              </table>
          <?php endif; ?>
    </body>
</html>