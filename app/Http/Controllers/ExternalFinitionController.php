<?php

namespace App\Http\Controllers;

use App\Models\Action;
use Illuminate\Http\Request;
use App\Models\ExternalFinition;
use App\Http\Controllers\LogController;

class ExternalFinitionController extends Controller
{
    private $table = "external_finitions";
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
        $externalFinitions = ExternalFinition::all();

        return $externalFinitions;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $externalFinition = ExternalFinition::create([
            'label' => $request->label,
            'description' => $request->description,
            'reference' => $request->reference
        ]);

        $this->log->store([
            "user_id" => $request->user_id,
            "action_id" => Action::where(['label' => 'Create'])->first()->id,
            "name" => "Creation",
            "description" => "Creation d'une finition externe",
            "table" => $this->table,
        ]);
            
        return $externalFinition;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ExternalFinition  $externalFinition
     * @return \Illuminate\Http\Response
     */
    public function show(ExternalFinition $externalFinition)
    {
        return $externalFinition;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ExternalFinition  $externalFinition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ExternalFinition $externalFinition)
    {
        $externalFinition->label = $request->label;
        $externalFinition->description = $request->description;
        $externalFinition->reference = $request->reference;
        $externalFinition->save();

        $this->log->store([
            "user_id" => $request->user_id,
            "action_id" => Action::where(['label' => 'Update'])->first()->id,
            "name" => "Mise à jour",
            "description" => "Mise à jour d'une finition externe",
            "table" => $this->table,
        ]);

        return $externalFinition;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ExternalFinition  $externalFinition
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, ExternalFinition $externalFinition)
    {
        $externalFinition->delete();

        $this->log->store([
            "user_id" => $request->user_id,
            "action_id" => Action::where(['label' => 'Delete'])->first()->id,
            "name" => "Suppression",
            "description" => "Suppression d'une finition externe",
            "table" => $this->table,
        ]);

        return response()->json([
                "message" => "External finition successfully deleted"
            ], 
            200);
    }
}
