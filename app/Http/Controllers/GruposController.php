<?php

namespace App\Http\Controllers;
use App\Models\Grupos;
use Illuminate\Http\Request;

class GruposController extends Controller
{
    //

    public function list(){
        $objects = Grupos::all();
        return response()->json($objects);
    }

    public function get($id){
        $object = Grupos::find($id);
        return response()->json($object);
    }

    public function create(Request $request){
     
        $object = new Grupos();

        $object->titulo = $request->titulo;
        $object->permissao = $request->permissao;
        $object->status = $request->status;

        
        $object->save();

        return response()->json("Product Successfully Created!");

    }

    public function update(Request $request, $id){

        $object = Grupos::find($id);

        $object->titulo = $request->titulo;
        $object->permissao = $request->permissao;
        $object->status = $request->status;


        $object->save();

        return response()->json($object);
    }

    public function delete($id){
        $object = Grupos::find($id);
        $object->delete();

        return response()->json('Product sucessfully deleted!');
    }

}
