<?php

namespace App\Http\Controllers;

//use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Persona;

class personaController extends Controller
{
    public function listar(){
        $persona = Persona::where('activo', 1)->get();
        if($persona->isEmpty()){
            return response()->json(['mensaje'=>'No hay personas'],400);
        }
        return response()->json($persona,200);
    }

    public function obtener($id){
        $persona = Persona::find($id);
        if(!$persona){
            return response()->json([
                'mmensaje'=>'Persona no encontrada'
            ], 400);
        }

        return response()->json([$persona],200);

    }

    public function crear(Request $request){
        $validator = Validator::make($request->all(),[
            'nombre'=> 'required',
            'apellidos'=> 'required',
            'activo' => 'required'
        ]);
        if($validator->fails()){
            return response()->json([
                'Mensaje'=>'Error en la validacion',
                'errors'=> $validator->errors()
            ],400);
        }
        $persona = Persona::create([
            'nombre'=>$request->nombre,
            'apellidos'=>$request->apellidos,
            'activo'=> 1
        ]);
        if(!$persona){
            return response()->json([
                'Mensaje'=>'Error en la validacion'
            ],500);
        }
        return response()->json([
            $persona,201
        ]);
    }

    public function actualizar(Request $request, $id){
        $persona = Persona::find($id);
        if(!$persona){
            return response()->json([
                'mensaje'=>'Persona no encontrada'
            ], 400);
        }
        $validator = Validator::make($request->all(),[
            'nombre'=> 'required',
            'apellidos'=> 'required'
        ]);
        if($validator->fails()){
            return response()->json([
                'Mensaje'=>'Error en la validacion',
                'errors'=> $validator->errors()
            ],400);
        }
        $persona->nombre = $request->nombre;
        $persona->apellidos = $request->apellidos;
        $persona->save();
        return response()->json(['mensaje'=>'Se ha actualizado correctamente',
            $persona,200
        ]);

    }

    public function eliminar($id){
        $persona = Persona::find($id);
        if(!$persona){
            return response()->json([
                'mensaje'=>'Persona no encontrada'
            ], 400);
        }
        $persona ->activo = 0;
        $persona -> save();
        //$persona->delete();
        return response()->json(['mensaje'=>'Se ha eliminado corectamente'],200);
    }

    public function restaurar($id){
        $persona = Persona::find($id);
        if(!$persona){
            return response()->json([
                'mensaje'=>'Persona no encontrada'
            ], 400);
        }
        $persona ->activo = 1;
        $persona -> save();
        //$persona->delete();
        return response()->json(['mensaje'=>'Se ha reataurado corectamente'],200);
    }
}
