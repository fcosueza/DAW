<?php

namespace App\Http\Controllers;

use App\Models\Ubicacion;
use Illuminate\Http\Request;

class UbicacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ubicaciones=Ubicacion::all();
        return view('ubicaciones',['ubicaciones'=>$ubicaciones]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ubicaciones.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datosvalidados=$request->validate([
            'nombre'=>'required|min:4|max:50',
            'descripcion'=>'required',
            'dias'=>['required','array'],
            'dias.*'=>['required','distinct','in:L,M,X,J,V,S,D']
        ]);

        $datosvalidados['dias']=join(',',$datosvalidados['dias']??[]);

        Ubicacion::create($datosvalidados);

        return redirect('ubicaciones');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ubicacion $ubicacion)
    {
        return view('ubicaciones/detalleubicacion',['ubicacion'=>$ubicacion]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ubicacion $ubicacion)
    {
        return view('ubicaciones/edit',['ubicacion'=>$ubicacion]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ubicacion $ubicacion)
    {
        $datosvalidados=$request->validate([
            'nombre'=>'required|min:4|max:50',
            'descripcion'=>'required',
            'dias.*'=>['required','distinct','in:L,M,X,J,V,S,D']
        ]);

        $ubicacion->nombre=$datosvalidados['nombre'];
        $ubicacion->descripcion=$datosvalidados['descripcion'];
        $ubicacion->dias=join(',',$datosvalidados['dias']??[]);
        $ubicacion->save();

        return redirect('ubicaciones');
    }

     /**
     * Muestra un formulario para confirmar la eliminación.
     * -->Se añade este controlador
     */
    public function destroyconfirm(Ubicacion $ubicacion)
    {
        return view('ubicaciones.destroyconfirm',['ubicacion'=>$ubicacion->id]);
    }

    /**
     * Remove the specified resource from storage.
     * -->Se añade Request $request
     */
    public function destroy(Ubicacion $ubicacion,Request $request)
    {
        $datosvalidados=$request->validate([
            'confirmar'=>'required|in:si,no'
        ]);

        if ($datosvalidados['confirmar']==='si') {
            //Borramos primero los talleres que puediera tener esta ubicación.
            $ubicacion->talleres()->delete();
            //Borramos la ubicación
            $ubicacion->delete();
        }
        return redirect('ubicaciones');
    }
}

