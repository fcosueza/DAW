<?php

  namespace App\Http\Controllers;

  use Illuminate\Http\Request;
  use App\Models\Cancion;

  class CancionController extends Controller {

      /**
       * Display a listing of all songs
       */
      public function index() {
          return Cancion::all();
      }

      /**
       * Show the form for creating a new resource.
       */
      public function create() {

      }

      /**
       * Store a new song
       */
      public function store(Request $request) {
          $cancion = Cancion::create($request->all());

          return response()->json($cancion, 201);
      }

      /**
       * Display the specified song
       */
      public function show(string $id) {
          return Cancion::find($id);
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
          $cancion = Cancion::findOrFail($id);
          $cancion->update($request->all());

          return response()->json($cancion, 201);
      }

      /**
       * Remove the specified resource from storage.
       */
      public function destroy(string $id) {
          Cancion::findOrFail($id)->delete();

          return response()->json("Canción eliminada correctamente.", 201);
      }
  }
  