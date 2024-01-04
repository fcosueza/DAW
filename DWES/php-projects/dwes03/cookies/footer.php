<?php
  /* Requiere de la existencia de $archivo (nombre del archivo con el fragmento mostrado)
   * o $longitud (longitud de la cadena de carácteres mostrada),
   * sin no existen, no se muestra nada en el footer. */
?>
<footer>

    <?php
      if (isset($archivo)) {
          echo "Fecha y hora del documento: ";
          echo date('d/m/Y h:m', filemtime($archivo));
      } elseif (isset($longitud)) {
          echo "Longitud del documento: $longitud carácteres";
      }

      //TODO: muestra la lista de secciones visitadas
    ?>
    <BR>
    <BR>
</footer>