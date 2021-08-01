<?php

namespace App\Http\Controllers;
use App\Models\Pedidos;
use Illuminate\Http\Request;

class PedidosController extends Controller
{
    //

    public function list(){
        $objects = Pedidos::all();
        return response()->json($objects);
    }

    public function get($id){
        $object = Pedidos::find($id);
        return response()->json($object);
    }

    public function create(Request $request){
     
        $object = new Pedidos();

        $object->order = $request->order;
        $object->total = $request->total;
        $object->id_cliente = $request->id_cliente;
        $object->id_provider = $request->id_provider;
        $object->type = $request->type;
        $object->id_endereco = $request->id_endereco;
        $object->observacao1 = $request->observacao1;
        $object->observacao2 = $request->observacao2;
        $object->status = $request->status;
        $object->frete_valor = $request->frete_valor;
        $object->frete = $request->frete;
        $object->link = $request->link;
        
        $object->save();

        return response()->json("Product Successfully Created!");

    }

    public function update(Request $request, $id){

        $object = Pedidos::find($id);

        $object->order = $request->order;
        $object->total = $request->total;
        $object->id_cliente = $request->id_cliente;
        $object->id_provider = $request->id_provider;
        $object->type = $request->type;
        $object->id_endereco = $request->id_endereco;
        $object->observacao1 = $request->observacao1;
        $object->observacao2 = $request->observacao2;
        $object->status = $request->status;
        $object->frete_valor = $request->frete_valor;
        $object->frete = $request->frete;
        $object->link = $request->link;
        ///
        ///

        $object->save();

        return response()->json($object);
    }

    public function delete($id){
        $object = Pedidos::find($id);
        $object->delete();

        return response()->json('Product sucessfully deleted!');
    }

}
