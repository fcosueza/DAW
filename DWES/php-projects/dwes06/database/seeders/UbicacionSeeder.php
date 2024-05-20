<?php

namespace Database\Seeders;

use App\Models\Ubicacion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UbicacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Ubicacion::where('nombre','Biblioteca Municipal Distrito 4')->count()==0)
        {
            $u= new Ubicacion;
            $u->nombre='Biblioteca Municipal Distrito 4';
            $u->descripcion='Biblioteca Municipal del distrito 4. 6ª Avenida';
            $u->dias='L,M,X';
            $u->save();
        }
    }
}
