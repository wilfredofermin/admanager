<?php

namespace App\Http\Controllers;

use App\Puestos;
use App\Departamentos;

use Illuminate\Http\Request;

class SolicitudControllers extends Controller
{
    //
    public function store(){

         $this->validate($request, [
            'nombre' => 'required|max:150',
            'cedula' =>  'required|max:11|min:11|numeric',
            'departamento_id' => 'required|exists:departamentos,id',
            'puesto_id' => 'required|exists:puestos,id',
            'localidad_id' => 'required|exists:localidads,id',
            
        ]);
        
    }

      public function getDepartamentos(Request $request)
    {
        if ($request->ajax()) {
            $departamentos = Departamento::all();
            return response()->json($departamentos);
        }
    }

      public function getPuestos(Request $request)
    {
        if ($request->ajax()) {
            $puestos = Puesto::where('departamento_id', $request->departamento_id)->get();
            foreach ($puestos as $puesto) {
                $puestosArray[$puesto->id] = $puesto->name;
            }
            return response()->json($puetosArray);
        }
    }
}
