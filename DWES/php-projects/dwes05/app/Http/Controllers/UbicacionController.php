<?php

  namespace App\Http\Controllers;

  use App\Models\Ubicacion;
  use Illuminate\Http\Request;

  class UbicacionController extends Controller {

      /**
       * Display a listing of the resource.
       */
      public function index() {
          $ubicaciones = Ubicacion::all();

          return view('ubicaciones', ['ubicaciones' => $ubicaciones]);
      }

      /**
       * Show the form for creating a new resource.
       */
      public function create() {
          return view('ubicaciones-create');
      }

      /**
       * Store a newly created resource in storage.
       */
      public function store(Request $request) {
          $datosValidados = $request->validate([
              'nombre' => 'required|min:4|max:50',
              'descripcion' => 'required',
              'dias' => 'required',
              'dias.*' => ['required', 'distinct', 'in:L,M,X,J,V,S,D']
          ]);

          if (Ubicacion::where('nombre', $datosValidados['nombre'])->count() == 0) {
              $u = new Ubicacion;
              $u->nombre = $datosValidados['nombre'];
              $u->descripcion = $datosValidados['descripcion'];
              $u->dias = implode(',', $datosValidados['dias']);
              $u->save();
          }

          return redirect('ubicaciones');
      }

      /**
       * Display the specified resource.
       */
      public function show(Ubicacion $ubicacion) {
          //
      }

      /**
       * Show the form for editing the specified resource.
       */
      public function edit(Ubicacion $ubicacion) {
          //
      }

      /**
       * Update the specified resource in storage.
       */
      public function update(Request $request, Ubicacion $ubicacion) {
          //
      }

      /**
       * Remove the specified resource from storage.
       */
      public function destroy(Ubicacion $ubicacion) {
          //
      }
  }
