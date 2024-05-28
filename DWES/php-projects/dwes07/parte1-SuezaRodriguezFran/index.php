<?php
  require 'vendor/autoload.php';
  require 'funciones_acceso_servicio_web.php';

  if (file_exists(DATOS)) $datos = unserialize(file_get_contents(DATOS));
  else $datos = [];

  if (isset($_FILES['fichero_usuario'])) {
      if ($_FILES['fichero_usuario']['error'] == UPLOAD_ERR_OK) {

          if (count($datos) > 5) {
              echo 'Ya se han subido 5 archivos. Debe eliminar alguno.';
          } else {
              $hash256 = hash_file('sha256', $_FILES['fichero_usuario']['tmp_name']);
              if (in_array($hash256, array_column($datos, 'HASH256'))) {
                  echo "<H2>Ya está el archivo subido.</H2>";
              } else {
                  $newtmpname = CARPETA_SUBIDAS . DIRECTORY_SEPARATOR . uniqid() . '-' . basename($_FILES['fichero_usuario']['tmp_name']);

                  $resultado = move_uploaded_file($_FILES['fichero_usuario']['tmp_name'], $newtmpname);
                  if ($resultado) {

                      $datos_archivo = $_FILES['fichero_usuario'];
                      $datos_archivo['tmp_name'] = $newtmpname;
                      $datos_archivo['HASH256'] = $hash256;
                      $datos_archivo['estado'] = 'no_enviado_a_virus_total';
                      $datos[] = $datos_archivo;
                  }
              }
          }
      } else { // $_FILES['fichero_usuario']['error']!=UPLOAD_ERR_OK
          echo 'Se ha producido un error al subir el archivo. Es posible qeu sea más grande que el tamaño máximo permitido';
      }
  }

  if (isset($_POST['delete'])) {
      if (($pos = array_search($_POST['delete'], array_column($datos, 'HASH256'))) !== false) {
          unlink($datos[$pos]['tmp_name']);
          unset($datos[$pos]);

          $datos = array_values($datos);
      }
  }

  if (isset($_POST['subirarchivo'])) {
      if (($pos = array_search($_POST['subirarchivo'], array_column($datos, 'HASH256'))) !== false) {
          if ($datos[$pos]['estado'] === 'no_enviado_a_virus_total') {

              $result = enviarArchivoAVerificar($datos[$pos]["tmp_name"], $datos[$pos]["type"]);

              if ($result["status"] == 200) {
                  $datos[$pos]["estado"] = "ya_enviado_a_virus_total";
                  $datos[$pos]["id_analisis"] = $result["data"]["id"];
                  echo "<H1>El archivo se ha subido correctamente</H1>";
              } else {
                  echo "<H1>Ha ocurrido un error al subir el archivo</H1>";
                  echo "<h3>Error: " . $result["data"]["code"] . " Mensaje: " . $result["data"]["message"] . "</h3>";
              }
          } else {
              echo "El archivo ya ha sido enviado para su análisis.";
          }
      } else {
          echo "El archivo no existe";
      }
  }

  if (isset($_POST['resultadosEscaneo'])) {
      if (($pos = array_search($_POST['resultadosEscaneo'], array_column($datos, 'HASH256'))) !== false) {
          if ($datos[$pos]['estado'] === 'ya_enviado_a_virus_total') {

              $resultadoAnalisis = obtenerEstadoVerificacion($datos[$pos]["HASH256"]);

              /*
               * El resultado se va a mostrar debajo del formulario y la tabla de archivos
               * para que quede "algo más estético, y no perdamos de vista, o por lo menos no tanto
               * los controles, ya que la tabla es muy larga.
               */
          } else {
              echo "El archivo NO ha sido enviado para su análisis o NO ha empezado a ser procesado.";
          }
      } else {
          echo "El archivo no existe";
      }
  }

  include('mostrar_archivos.php');
  file_put_contents(DATOS, serialize($datos));
?>

<form enctype="multipart/form-data" action="" method="POST">
    <input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
    Envia el fichero para analizar: <input name="fichero_usuario" type="file" />
    <BR>
    <input type="submit" value="Enviar fichero" />
</form>


<!-- Tabla para mostrar los resultados del analisis, si se ha completado -->
<?php if (isset($resultadoAnalisis)) : ?>
      <h3>INFORME DE ANALISIS</h3>
      <table border='1'>
          <tr>
              <th>Motor</th>
              <th>Método</th>
              <th>Resultado</th>
              <th>Detalle</th>
          </tr>
          <?php foreach ($resultadoAnalisis["last_analysis_results"] as $motor => $analisis) : ?>
              <tr>
                  <td><?= $motor ?></td>
                  <td><?= $analisis["method"] ?></td>
                  <td><?= $analisis["category"] ?></td>
                  <td><?= $analisis["result"] ?></td>
              </tr>
          <?php endforeach; ?>
      </table>

  <?php endif; ?>