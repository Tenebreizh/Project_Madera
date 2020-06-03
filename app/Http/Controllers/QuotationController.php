<?php

namespace App\Http\Controllers;

use App\User;
use App\Client;
use App\Models\Action;
use App\Models\Quotation;
use Illuminate\Http\Request;
use App\Http\Controllers\LogController;

class QuotationController extends Controller
{
    private $table = "quotations";
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
        $quotations = Quotation::all();

        return $quotations;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $quotation = Quotation::create([
            'project_id' => $request->project_id,
            'quotation_number' => "",
            'active' => $request->active,
        ]);

        $this->log->store([
            "user_id" => $request->user_id,
            "action_id" => Action::where(['label' => 'Create'])->first()->id,
            "name" => "Creation",
            "description" => "Creation d'un devis",
            "table" => $this->table,
        ]);

        return $quotation;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function show(Quotation $quotation)
    {
        return $quotation;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quotation $quotation)
    {
        $quotation->project_id = $request->project_id;
        $quotation->quotation_number = $request->quotation_number;
        $quotation->active = $request->active;
        $quotation->save();

        $this->log->store([
            "user_id" => $request->user_id,
            "action_id" => Action::where(['label' => 'Update'])->first()->id,
            "name" => "Mise à jour",
            "description" => "Mise à jour d'un devis",
            "table" => $this->table,
        ]);

        return $quotation;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Quotation $quotation)
    {
        $quotation->delete();

        $this->log->store([
            "user_id" => $request->user_id,
            "action_id" => Action::where(['label' => 'Delete'])->first()->id,
            "name" => "Suppression",
            "description" => "Suppression d'un devis",
            "table" => $this->table,
        ]);

        return response()->json([
            "message" => "Quotation successfully deleted"
        ], 200);
    }

    public function userQuotation(User $user)
    {
        $projects = $user->projects;

        $quotations = [];

        foreach ($projects as $project) {
            $quotations[$project->name] = $project->quotations;
        }

        return $quotations;
    }

    public function clientQuotation(Client $client)
    {
        $projects = $client->projects;

        $quotations = [];

        foreach ($projects as $project) {
            $quotations[$project->name] = $project->quotations;
        }

        return $quotations;
    }

    /**
     * Get the project quotations specified resource from storage.
     *
     * @param  \App\Models\Quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function quotationLines(Quotation $quotation)
    {
        $quotationLines = $quotation->quotationLines;

        return $quotationLines;
    }

}
