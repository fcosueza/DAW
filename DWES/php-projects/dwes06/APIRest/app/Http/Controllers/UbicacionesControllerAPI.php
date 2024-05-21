<?php

  namespace App\Http\Controllers;

  use Illuminate\Http\Request;
  use App\Models\Ubicacion;
  use App\Models\Taller;

  class UbicacionesControllerAPI extends Controller {

      /**
       * Método listar
       *
       * Método que realiza una petición al modelo ubicación, obteniendo todas
       * las ubicaciones disponibles y generando un array de respuesta con
       * todas ellas, incluyendo solo el id, nombre, ubicación y días en los
       * que se celebra el taller.
       *
       * @return type Archivo Json con las ubicaciones
       */
      public function listar() {
          $ubicaciones = Ubicacion::all();
          $payLoad = array();

          // Seleccionamos los valores que queremos mostrar  de cada ubicacion
          foreach ($ubicaciones as $ubicacion) {
              $nuevaUbicacion = array();

              $nuevaUbicacion["id"] = $ubicacion["id"];
              $nuevaUbicacion["nombre"] = $ubicacion["nombre"];
              $nuevaUbicacion["ubicacion"] = $ubicacion["descripcion"];
              $nuevaUbicacion["dias"] = $ubicacion["dias"];

              // Añadimos la ubicacion al payload
              array_push($payLoad, $nuevaUbicacion);
          }

          // Enviamos la respuesta procesada
          return response()->json($payLoad, 200);
      }

      public function taller(int $idUbicacion) {
          $talleres = null;
          $payload = array();

          // Si no existe el ID, devolvemos un mensaje de error con el códugo 404
          if (is_null($talleres)) {
              return response()->json(["Error:" => "La ubicación indicada no existe", 404);
          }

          // Comprobamos si hay talleres o no asociados a la ubicacion y creamos la respuesta
          if (count($talleres == 0)) {
              $response = response()->json($payload, 200);
          } else {
              foreach ($talleres as $taller) {
                  $nuevoTaller = array();

                  $nuevoTaller["id"] = $taller["id"];
                  $nuevoTaller["nombre"] = $taller["nombre"];
                  $nuevoTaller["ubicacion"] = $taller["descripcion"];
                  $nuevoTaller["dia_semana"] = $taller["dia_semana"];
                  $nuevoTaller["hora_inicio"] = $taller["hora_inicio"];
                  $nuevoTaller["hora_fin"] = $taller["hora_fin"];
                  $nuevoTaller["cupo_maximo"] = $taller["cupo_maximo"];

                  // Añadimos la ubicacion al payload
                  array_push($payload, $nuevoTaller);
              }

              $response = response()->json($payload, 200);
          }
          $response = response()->json("La ubicación indicada no existe", 404);

          return $response;
      }
  }
  