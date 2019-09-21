<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::all();

        return $clients;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $client = Client::create([
            'city_id' => $request->city_id,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'street' => $request->street,
            'street_number' => $request->street_number,
            'zipcode' => $request->zipcode,
            'email' => $request->email,
            'phone' => $request->phone
        ]);

        return $client;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        return $client;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $client->city_id = $request->city_id;
        $client->firstname = $request->firstname;
        $client->lastname = $request->lastname;
        $client->street = $request->street;
        $client->street_number = $request->street_number;
        $client->zipcode = $request->zipcode;
        $client->email = $request->email;
        $client->phone = $request->phone;
        $client->save();

        return $client;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->delete();

        return response()->json([
            "message" => "Client successfully deleted"
        ], 200);
    }
}
