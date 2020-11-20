<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Address;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $addresses = Address::where('idClient', $id)->get();

        return response()->json($addresses);
    }

    public function store(Request $request, $id)
    {
        
        $addresses = new Address();

        $addresses->logradouro = $request->logradouro;
        $addresses->bairro =  $request->bairro;
        $addresses->numero =  $request->numero;
        $addresses->cep =  $request->cep;
        $addresses->idClient = $id;
         
        $addresses->save();

        return response()->json($addresses, 201);
 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $idAddress)
    {
        $address = Address::where('idClient', $id)->where('id', $idAddress)->get();

        return response()->json($address);
    }

    public function update(Request $request, $id, $idAddress)
    {
        $address = Address::where('idClient', $id)->where('id', $idAddress)->first();

        if(!$address) {
            return response()->json([
                "message" => "Record not found"
            ], 404);
        }

        $address->logradouro = $request->logradouro;
        $address->bairro =  $request->bairro;
        $address->numero =  $request->numero;
        $address->cep =  $request->cep;

        $address->save();

        return response()->json($address);

        
    }

    public function destroy($id, $idAddress)
    {
        $address = Address::where('idClient', $id)->where('id', $idAddress)->first();

        if(!$address) {
            return response()->json([
                "message" => "Record not found"
            ], 404);
        }

        
        $address->delete();

    }
}
