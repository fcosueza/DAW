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
              return response()->json(["errores:" => $validador->messages()], 422);
          }

          // Si los datos son correctos, ya podemso extraerlos con seguridad y añadir la ubicación
          $datos = request()->all();
          $datos["ubicacion_id"] = $idUbicacion;

          // Creamos el Taller
          $resultado = Taller::create($datos);

          // Enviamos una respuesta con el Json resultado de la creación
          return response()->json(["resultado:" => "ok", "datos:" => $resultado], 200);
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
      public function update(Request $request, string $id) {
          //
      }

      /**
       * Remove the specified resource from storage.
       */
      public function destroy(string $id) {
          //
      }
  }
