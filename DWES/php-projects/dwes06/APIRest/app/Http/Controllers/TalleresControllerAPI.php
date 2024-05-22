<?php

  namespace App\Http\Controllers;

  use Illuminate\Http\Request;
  use App\Models\Ubicacion;
  use App\Models\Taller;

  class TalleresControllerAPI extends Controller {

      /**
       * Display a listing of the resource.
       */
      public function index() {
          //
      }

      /**
       * Show the form for creating a new resource.
       */
      public function create() {
          //
      }

      /**
       * Store a newly created resource in storage.
       */
      public function store(int $idUbicacion, Request $request) {
          // Si el ID de la ubicación no existe, mandamos un error y el código 404
          if (count(Ubicacion::where("id", $idUbicacion)->get()) == 0) {
              return response()->json(["error" => "La ubicación indicada no existe"], 404);
          }

          // Extraemos los días en los que se puede usar dicha ubicación
          $diasPosibles = Ubicacion::where("id", $idUbicacion)->get("dias");

          // Validamos todos los datos
          $datoValidados = $request->validate([
              'nombre' => 'required|string|min:4|max:50',
              'descripcion' => 'required|string|min:4|max:200',
              'dia_semana' => 'required|string|in:' . join(",", $diasPosibles) . '',
              'hora_inicio' => 'required|date_format:h:i',
              'hora_fin' => 'required|date_format:h:i|after:hora_inicio',
              'cupo_máximo' => 'required|number|min:5|max:30'
          ]);

          // Si se han producido errores en la validación se devuelven, junto con el código 422
          if ($datoValidados->fail()) {
              return response->json(["errores" => $datoValidados], 422);
          }

          // Si no hay errores, creamos el taller
          $resultado = Taller::create($datoValidados);

          return response->json(["resultado:" => "ok", "datos:" => $resultado], 200);
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
