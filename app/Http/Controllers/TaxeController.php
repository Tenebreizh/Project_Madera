<?php

namespace App\Http\Controllers;

use App\Models\Taxe;
use App\Models\Action;
use Illuminate\Http\Request;
use App\Http\Controllers\LogController;

class TaxeController extends Controller
{
    private $table = "taxes";
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
        $taxes = Taxe::all();

        return $taxes;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $taxe = Taxe::create([
            'name' => $request->name,
            'description' => $request->description,
            'rate' => $request->rate,
        ]);

        $this->log->store([
            "user_id" => $request->user_id,
            "action_id" => Action::where(['label' => 'Create'])->first()->id,
            "name" => "Creation",
            "description" => "Creation d'une taxe",
            "table" => $this->table,
        ]);
        
        return $taxe;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Taxe  $taxe
     * @return \Illuminate\Http\Response
     */
    public function show(Taxe $taxe)
    {
        return $taxe;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Taxe  $taxe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Taxe $taxe)
    {
        $taxe->name = $request->name;
        $taxe->description = $request->description;
        $taxe->rate = $request->rate;
        $taxe->save();

        $this->log->store([
            "user_id" => $request->user_id,
            "action_id" => Action::where(['label' => 'Update'])->first()->id,
            "name" => "Mise à jour",
            "description" => "Mise à jour d'une taxe",
            "table" => $this->table,
        ]);

        return $taxe;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Taxe  $taxe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Taxe $taxe)
    {
        $taxe->delete();

        $this->log->store([
            "user_id" => $request->user_id,
            "action_id" => Action::where(['label' => 'Delete'])->first()->id,
            "name" => "Suppression",
            "description" => "Suppression d'une taxe",
            "table" => $this->table,
        ]);

        return response()->json([
            "message" => "Taxe successfully deleted"
        ], 200);
    }
}
