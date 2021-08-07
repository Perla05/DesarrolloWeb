<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLibrosRequest;
use App\Http\Requests\UpdateLibrosRequest;
use App\Models\Libros;
use Illuminate\Http\Request;

class LibrosController extends Controller
{
   //GET Listar registro

    public function index(Request $request)
    {
        if($request->has('txtBuscar'))
        {
            $libros = Libros::where('nombre', 'like','%' . $request->txtBuscar . '%')
                ->get();
        }
        else
        {
            $libros = Libros::all();
        }

        return $libros;
    }

    //POST Insertar datos
    public function store(CreateLibrosRequest $request)
    {
        $input = $request->all();
        Libros::create($input);
        return response()->json([
            'res' => true,
            'message' => 'Registro creado correctamente'
        ], 200);
    }

    //GET Retorna un solo registro
    public function show(Libros $libros)
    {
        return $libros;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //PUT Actualizar registros
    public function update(UpdateLibrosRequest $request, Libros $libros)
    {
        $input = $request->all();
        $libros->update($input);
        return response()->json([
            'res' => true,
            'message' => 'Registro actualizado correctamente'
        ], 200);
    }

    //Eliminar Registros
    public function destroy($id)
    {
        Libros::destroy($id);
        return response()->json([
            'res' => true,
            'message' => 'Registro eliminado correctamente'
        ], 200);
    }
}
