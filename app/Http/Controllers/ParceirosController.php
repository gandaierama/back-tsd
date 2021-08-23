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

    public function listView(){
        $objects = Parceiros::all();
        return view('parceiros', compact('objects'));
        
    }

    public function get($id){
        $object = Parceiros::find($id);
        return response()->json($object);
    }

    public function create(Request $request){
     
        $object = new Parceiros();

        $object->nome     = $request->nome;
        $object->email     = $request->email;
        $object->cpf     = $request->cpf;
        $object->cnpj     = $request->cnpj;
        $object->cnh     = $request->cnh;
        $object->banco     = $request->banco;
        $object->agencia     = $request->agencia;
        $object->conta     = $request->conta;
        $object->endereco     = $request->endereco;
        $object->cep     = $request->cep;
        $object->numero     = $request->numero;
        $object->complemento     = $request->complemento;
        $object->bairro     = $request->bairro;
        $object->nascimento     = $request->nascimento;
        $object->pix     = $request->pix;
        
        $object->telefone1     = $request->telefone1;
        $object->telefone2     = $request->telefone2;
        $object->telefone3     = $request->telefone3;
        
   

        
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
