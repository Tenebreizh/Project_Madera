<?php

namespace App\Http\Controllers;

use App\Models\Action;
use App\Models\Covering;
use Illuminate\Http\Request;
use App\Http\Controllers\LogController;

class CoveringController extends Controller
{
    private $table = "coverings";
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
        $coverings = Covering::all();

        return $coverings;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $covering = Covering::create([
            'label' => $request->label,
            'description' => $request->description,
            'reference' => $request->reference
        ]);

        $this->log->store([
            "user_id" => $request->user_id,
            "action_id" => Action::where(['label' => 'Create'])->first()->id,
            "name" => "Creation",
            "description" => "Creation d'une couverture",
            "table" => $this->table,
        ]);
            
        return $covering;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Covering  $covering
     * @return \Illuminate\Http\Response
     */
    public function show(Covering $covering)
    {
        return $covering;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Covering  $covering
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Covering $covering)
    {
        $covering->label = $request->label;
        $covering->description = $request->description;
        $covering->reference = $request->reference;
        $covering->save();

        $this->log->store([
            "user_id" => $request->user_id,
            "action_id" => Action::where(['label' => 'Update'])->first()->id,
            "name" => "Mise à jour",
            "description" => "Mise à jour d'une couverture",
            "table" => $this->table,
        ]);

        return $covering;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Covering  $covering
     * @return \Illuminate\Http\Response
     */
    public function destroy(request $request,   Covering $covering)
    {
        $covering->delete();

        $this->log->store([
            "user_id" => $request->user_id,
            "action_id" => Action::where(['label' => 'Delete'])->first()->id,
            "name" => "Suppression",
            "description" => "Suppression d'une couverture",
            "table" => $this->table,
        ]);

        return response()->json([
                "message" => "Covering successfully deleted"
            ], 
            200);
    }
}
