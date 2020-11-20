<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Client;
use App\Address;
use Tests\TestCase;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $clients = Client::all();
        return response()->json($clients);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $clients = new Client();
       $clients->nome = $request->nome;
       $clients->razaoSocial = $request->razaoSocial;
       $clients->cnpj = $request->cnpj;

       return response()->json($clients, 201);
        
    }
        

    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $client = DB::table('clients')->find($id);

        return response()->json($client);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $client = Client::find($id);

        if(!$client) {
            return response()->json([
                'message' => 'Record not found',
            ], 404);
        }
        $client->nome = $request->nome;
        $client->razaoSocial = $request->razaoSocial;
        $client->cnpj = $request->cnpj;

        
        $client->save();

        return response()->json($client);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Client::find($id);
        $address = Address::where('idClient', $id);

        if(!$client || !$address){
            return response()->json([
                'message' => 'Record not found'
            ], 404);
        }
        $address->delete();
        $client->delete();
        
    }
}
