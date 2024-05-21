<?php

  namespace App\Http\Controllers;

  use Illuminate\Http\Request;
  use App\Models\Ubicacion;

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
  }
