<?php

namespace App\Http\Controllers;

use App\Models\Action;
use App\Models\Insulator;
use Illuminate\Http\Request;
use App\Http\Controllers\LogController;

class InsulatorController extends Controller
{
    private $table = "insulators";
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
        $insulators = Insulator::all();

        return $insulators;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $insulator = Insulator::create([
            'label' => $request->label,
            'description' => $request->description,
            'reference' => $request->reference
        ]);

        $this->log->store([
            "user_id" => $request->user_id,
            "action_id" => Action::where(['label' => 'Create'])->first()->id,
            "name" => "Creation",
            "description" => "Creation d'un isolant",
            "table" => $this->table,
        ]);
            
        return $insulator;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Insulator  $insulator
     * @return \Illuminate\Http\Response
     */
    public function show(Insulator $insulator)
    {
        return $insulator;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Insulator  $insulator
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Insulator $insulator)
    {
        $insulator->label = $request->label;
        $insulator->description = $request->description;
        $insulator->reference = $request->reference;
        $insulator->save();

        $this->log->store([
            "user_id" => $request->user_id,
            "action_id" => Action::where(['label' => 'Update'])->first()->id,
            "name" => "Mise à jour",
            "description" => "Mise à jour d'un isolant",
            "table" => $this->table,
        ]);

        return $insulator;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Insulator  $insulator
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Insulator $insulator)
    {
        $insulator->delete();

        $this->log->store([
            "user_id" => $request->user_id,
            "action_id" => Action::where(['label' => 'Delete'])->first()->id,
            "name" => "Suppression",
            "description" => "Suppression d'un isolant",
            "table" => $this->table,
        ]);

        return response()->json([
                "message" => "Insulator successfully deleted"
            ], 
            200);
    }
}
