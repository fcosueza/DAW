<?php
  /* Requiere de la existencia de $archivo (nombre del archivo con el fragmento mostrado)
   * o $longitud (longitud de la cadena de carácteres mostrada),
   * sin no existen, no se muestra nada en el footer. */
?>
<footer style="text-align: left">

    <?php
      if (isset($archivo)) {
          echo "Fecha y hora del documento: ";
          echo date('d/m/Y h:m', filemtime($archivo));
      } elseif (isset($longitud)) {
          echo "Longitud del documento: $longitud carácteres";
      }

      print "<br>";

      /*
       * Para mostrar las páginas se va a usar $lista_actualizada, ya que si
       * se usa $_COOKIE no muestra la lista actulizada hasta que se cambia
       * de enlace, y no se consigue el efecto que se muestra en el video.
       *
       * No se si es la forma correcta de hacerlo, o si había que hacerlo
       * haciendo uso de $_COOKIE, pero si es así, la verdad que me vendría
       * bien saber como hacerlo, ya que no he encontrado esa información en ningún
       * video de explicación ni los apuntes.
       */

      if (isset($lista_actualizada)) {

          print "<h3>Páginas Visitadas</h3>";
          foreach ($lista_actualizada as $elemento => $seccion) {
              $link = urlencode($seccion['link']);
              $nombre = $seccion['nombre'];
              $fecha = $seccion['hora'];

              print "<a href='?ver=$link'>$nombre ($fecha)</a>";
          }
      }
    ?>
    <BR>
    <BR>
</footer>