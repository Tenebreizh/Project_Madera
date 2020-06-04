<?php

namespace App\Http\Controllers;

use App\Models\Action;
use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\LogController;

class ClientController extends Controller
{
    private $table = "clients";
    private $log;

    public function __construct(LogController $log)
    {
        $this->log = $log;
    }

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
            'city' => $request->city,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'street' => $request->street,
            'street_number' => $request->street_number,
            'zipcode' => $request->zipcode,
            'email' => $request->email,
            'phone' => $request->phone
        ]);

        $this->log->store([
            "user_id" => $request->user_id,
            "action_id" => Action::where(['label' => 'Create'])->first()->id,
            "name" => "Creation",
            "description" => "Creation d'un client",
            "table" => $this->table,
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
        $client->city = $request->city;
        $client->firstname = $request->firstname;
        $client->lastname = $request->lastname;
        $client->street = $request->street;
        $client->street_number = $request->street_number;
        $client->zipcode = $request->zipcode;
        $client->email = $request->email;
        $client->phone = $request->phone;
        $client->save();

        $this->log->store([
            "user_id" => $request->user_id,
            "action_id" => Action::where(['label' => 'Update'])->first()->id,
            "name" => "Mise à jour",
            "description" => "Mise à jour d'un client",
            "table" => $this->table,
        ]);

        return $client;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Client $client)
    {
        $client->delete();

        $this->log->store([
            "user_id" => $request->user_id,
            "action_id" => Action::where(['label' => 'Delete'])->first()->id,
            "name" => "Suppression",
            "description" => "Suppression d'un client",
            "table" => $this->table,
        ]);

        return response()->json([
            "message" => "Client successfully deleted"
        ], 200);
    }

    public function quotations(Client $client)
    {
        $projects = $client->projects;

        $quotations = [];

        foreach ($projects as $project) {
            if (count($project->quotations)) {
                $quotations[] = $project->quotations[0];
            }
        }

        return $quotations;
    }
}
