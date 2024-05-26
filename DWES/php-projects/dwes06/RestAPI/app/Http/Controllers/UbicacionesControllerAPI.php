<?php

  namespace App\Http\Controllers;

  use Illuminate\Http\Request;
  use App\Models\Ubicacion;
  use App\Models\Taller;

  class UbicacionesControllerAPI extends Controller {

      /**
       * Método listar
       *
       * Método que realiza una consulta usando el modelo Ubicacion para obtener
       * todas las ubicaciones. En la propia consulta se especifican los campos
       * que queremos obtener, de forma que solo hay que pasar este resultado como
       * respuesta.
       *
       * @return type Archivo Json con las ubicaciones
       */
      public function listar() {
          // Recuperamos todas las ubicaciones, pero solo las columnas que nos interesan
          $ubicaciones = Ubicacion::all("id", "nombre", "descripcion", "dias");

          // Enviamos la respuesta con las ubicaciones y el código 200
          return response()->json($ubicaciones, 200);
      }

      /**
       * Método Taller
       *
       * Método que realizar una consulta para obtener todos los talleres que se
       * imparten en una ubicación determinada. En primer lugar comprobamos en la
       * tabla ubicaciones que existe el ID introducido. Si no existe, se responde
       * con un mensaje de error y el código 404.
       *
       * Si la ubicación, existe, se realiza a consulta especificando los atributos que
       * queremos obtener y devolviendo la respuesta. En caso de que no existan talleres
       * el método get() devuelve un array vacío, por lo que no es necesario devolver 2 respuestas
       * diferentes para los casos en los que haya o no talleres.
       *
       * @param int $idUbicacion Entero con el ID de la ubicación donde queremos buscar los talleres
       * @return type Archivo JSON con los talleres que se han encontrado
       */
      public function taller(int $idUbicacion) {
          // Si el ID de la ubicación no existe, mandamos un error y el código 404
          if (count(Ubicacion::where("id", $idUbicacion)->get()) == 0) {
              return response()->json(["error" => "La ubicación indicada no existe"], 404);
          }

          // Realizamos la consulta indicando que atributos queremos obtener de cada taller
          $talleres = Taller::where("ubicacion_id", $idUbicacion)->
                  get(["id", "nombre", "descripcion", "dia_semana", "hora_inicio", "hora_fin", "cupo_maximo", "ubicacion_id"]);

          // Devolvemos los talleres encontrados, si los hay
          return response()->json($talleres, 200);
      }
  }
