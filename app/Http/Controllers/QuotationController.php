<?php

namespace App\Http\Controllers;

use App\Models\Quotation;
use App\User;
use App\Client;
use Illuminate\Http\Request;

class QuotationController extends Controller
{
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

        return $quotation;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quotation $quotation)
    {
        $quotation->delete();

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
