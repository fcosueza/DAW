<?php

  namespace App\Http\Controllers;

  use Illuminate\Http\Request;
  use App\Models\Ubicacion;
  use App\Models\Taller;
  use Validator;

  class TalleresControllerAPI extends Controller {

      /**
       * Método store
       *
       * Método que recibe el id de una ubicación y una petición con los datos
       * de un nuevo taller. Comprueba que los datos son correctos, enviando
       * diferentes respuesta y códigos HTTP. Si los datos son correctos, crea
       * el nuevo taller y devuelve una respuesta en formato Json con los datos
       * del taller creado.
       *
       * @param int $idUbicacion Entero con el ID de la ubicación
       * @param Request $request Objeto de tipo request con todos los datos del nuevo taller
       *
       * @return type Respuesta HTTP con un archivo Json con diferentes datos y códigos HTTP
       */
      public function store(int $idUbicacion, Request $request) {
          // Si el ID de la ubicación no existe, mandamos un error y el código 404
          if (count(Ubicacion::where("id", $idUbicacion)->get()) == 0) {
              return response()->json(["error" => "La ubicación indicada no existe"], 404);
          }

          // Extraemos los días en los que se puede usar dicha ubicación
          $diasPosibles = Ubicacion::where("id", $idUbicacion)->get("dias")[0]->dias;

          // Utilizamos la clase Vatidator, para evitar la redicción automática de validate()
          $validador = Validator::make($request->all(), [
                      'nombre' => 'required|string|min:4|max:50',
                      'descripcion' => 'required|string|min:4|max:200',
                      'dia_semana' => 'required|string|in:' . $diasPosibles . '',
                      'hora_inicio' => 'required|date_format:H:i',
                      'hora_fin' => 'required|date_format:H:i|after:hora_inicio',
                      'cupo_maximo' => 'required|integer|min:5|max:30'
          ]);

          // Si se han producido errores en la validación se devuelven los errores, junto con el código 422
          if ($validador->fails()) {
              return response()->json(["errores" => $validador->messages()], 422);
          }

          // Si los datos son correctos, ya podemos extraerlos con seguridad y añadir la ubicación
          $datos = request()->all();
          $datos["ubicacion_id"] = $idUbicacion;

          // Creamos el Taller
          $resultado = Taller::create($datos);

          // Enviamos una respuesta con el Json resultado de la creación
          return response()->json(["resultado" => "ok", "datos:" => $resultado], 200);
      }

      /**
       * Display the specified resource.
       */
      public function show(string $id) {
          //
      }

      /**
       * Show the form for editing the specified resource.
       */
      public function edit(string $id) {
          //
      }

      /**
       * Update the specified resource in storage.
       */
      public function cambiarUbicacion(Request $request, string $id) {
          $taller = Taller::find($id);

          // Comprobamos que el taller exista
          if (!isset($taller)) {
              return response()->json(["error" => "El taller indicado no existe"], 404);
          }

          // Comprobamos que los datos esten en formato JSON
          if (str_contains($request->header('Content'), 'application/json') != 0) {
              return response()->json(["error" => "El formato de la consulta no esta en formato JSON."], 422);
          }

          // Comprobamos que el ID de la ubicación están incluídos en el json
          if (!isset($request->nueva_ubicacion)) {
              return response()->json(["error" => "El documento recibido no contiene los datos esperados."], 422);
          } else {
              $ubicacion = Ubicacion::find($request->nueva_ubicacion);
          }

          // Comprobamos que la ubicación con ese ID existe
          if (!isset($ubicacion)) {
              return response()->json(["error" => "La ubicación con ese ID no existe."], 422);
          }

          // Comprobamos que la ubicación este disponible el día del taller
          if (!str_contains($ubicacion->dias, $taller->dia_semana)) {
              return response()->json(["error" => "La ubicación no está disponible el día del taller."], 409);
          }

          // Ya que hemos realizado todas las comprobaciones, associamos el taller con su nueva ubicacion
          $taller->ubicacion()->associate($ubicacion->id);
          $taller->save();

          return response()->json(["OK" => "El taller se ha modificado correctamente."], 200);
      }

      /**
       * Método destroy
       *
       * Metódo que recibe el ID de un taller como parametro y lo elimina
       * de la base de datos si existe un Taller con dicho ID, sino envía una
       * respuesta con el código HTTP 404.
       *
       * @param string $id Entero con el ID del Taller
       *
       * @return type Respuesta en formato JSON con información sobre la operación de borrado
       */
      public function destroy(int $id) {
          $taller = Taller::find($id);

          // Comprobamos que el taller existe
          if (!isset($taller)) {
              return response()->json(["error" => "El taller indicado no existe"], 404);
          }

          $taller->delete();

          // Envíamos la respuesta
          return response()->json(["OK" => "El taller se ha eliminado correctamente."], 200);
      }
  }
