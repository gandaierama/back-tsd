<?php

namespace App\Http\Controllers;
use App\Models\Parceiros;
use Illuminate\Http\Request;

class ParceirosController extends Controller
{
    //

    public function list(){
        $objects = Parceiros::all();
        return response()->json($objects);
    }

    public function get($id){
        $object = Parceiros::find($id);
        return response()->json($object);
    }

    public function create(Request $request){
     
        $object = new Parceiros();

        $object->name     = $request->name;

        
        $object->save();

        return response()->json("Product Successfully Created!");

    }

    public function update(Request $request, $id){

        $object = Parceiros::find($id);

        $object->name = $request->name;
        ///
        ///

        $object->save();

        return response()->json($object);
    }

    public function delete($id){
        $object = Parceiros::find($id);
        $object->delete();

        return response()->json('Product sucessfully deleted!');
    }

}
