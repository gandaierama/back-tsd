<?php
namespace App\Http\Controllers;
use App\Models\Usuarios;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    //

    public function list(){
        $objects = Usuarios::all();
        return response()->json($objects);
    }

    public function get($id){
        $object = Usuarios::find($id);
        return response()->json($object);
    }

    public function create(Request $request){
     
        $object = new Usuarios();

        $object->nome     = $request->nome;
    	$object->email     = $request->email;
        $object->senha     = $request->senha;
        $object->telefone     = $request->telefone;
        $object->id_grupo     = $request->id_grupo;
        $object->status     = $request->status;
        ///

    	///
        
        $object->save();

        return response()->json(["response"=>"Success"]);

    }

    public function update(Request $request, $id){

        $object = Usuarios::find($id);

        $object->nome     = $request->nome;
        $object->email     = $request->email;
        $object->senha     = $request->senha;
        $object->telefone     = $request->telefone;
        $object->id_grupo     = $request->id_grupo;
        $object->status     = $request->status;
        ///

        ///

        $object->save();

        return response()->json($object);
    }

    public function delete($id){
        $object = Usuarios::find($id);
        $object->delete();

        return response()->json(["response"=>"Success"]);
    }

}
